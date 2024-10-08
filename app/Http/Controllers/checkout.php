<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\order;
use App\Models\detail;
use App\Models\addprod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class checkout extends Controller
{
    static $vnp_TmnCode = "W6YEW49O"; //Mã website tại VNPAY
    static $vnp_HashSecret = "WSBCHHFZBEGYEQNOQHVKLNCGZVHQTHMU"; //Chuỗi bí mật
    static $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    static $vnp_Returnurl = '/checkout/vnPayCheck';

    public function checkOut(Request $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::id();
        $data['total_price'] = session('total_price');
        $data['status'] = 0;
     
        $order = order::create($data);
        
        //Lấy URL thanh toán VNPay
        $vnPayData = [
            'vnp_TxnRef' => $order->id,
            'vnp_OrderInfo' => 'Thanh toán đơn hàng số ' .$order->id,
            'vnp_Amount' => $order->total_price,
        ];

        $data_url = $this->vnpay_create_payment($vnPayData);
        Redirect::to($data_url)->send();

    }

    protected function createOrderDetail($order_id){
        $carts = session('cart');
        
        foreach($carts as $item){
            $orderDetail = new detail();
            $orderDetail->order_id = $order_id;
            $orderDetail->product_id = $item['product_id'];
            $orderDetail->name = $item['name'];
            $orderDetail->price = $item['price'];
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->total_price = $item['price'] * $item['quantity'];
            $orderDetail->save();

            $product = addprod::find($item['product_id']);
            $product->quantity -= $item['quantity'];
            $product->save();
        }

        request()->session()->forget(['cart', 'total_price']);

    }

    public function vnPayCheck(Request $request){
        //Lấy data từ URL (VNPay gửi về qua $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán
        $order_id = $request->get('vnp_TxnRef'); // ID đơn  hàng

        // Kiểm tra mã phản hồi
        if($vnp_ResponseCode != null){
            //00: TH thành công
            if($vnp_ResponseCode == 00){
                $this->createOrderDetail($order_id);
                return redirect('/profile-user')->with('success','Đặt hàng thành công!');
            }
            else{
                $order = order::find($order_id);
                $order->delete();
                return redirect()->route('/payments')->with('error','Thanh toán không thành công!');
            }
            
        }
    }

    protected function vnpay_create_payment(array $data)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TxnRef = $data['vnp_TxnRef']; //Mã đơn hàng.
        $vnp_OrderInfo = $data['vnp_OrderInfo'];
        $vnp_OrderType = 200000; // Loại hàng hóa: Thời Trang 
        $vnp_Amount = $data['vnp_Amount'] * 100;
        $vnp_Locale = 'vn'; //Ngôn ngữ tiếng việt
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0", 
            "vnp_TmnCode" => self::$vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND", //Đơn vị tiền tệ (Phiên bản đang dùng chỉ hỗ trợ VND)
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => env('APP_URL') . self::$vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        //thêm 'vnp_BankCode'
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        //thêm 'vnp_SecureHash'
        $vnp_Url = self::$vnp_Url . "?" . $query;
        if (isset(self::$vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, self::$vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);

        //echo json_encode($returnData);

        return $returnData['data']; //chỉ lấy ra $vnp_Url thôi.
    }
}
