<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\addimg;
use App\Models\addprod;
use App\Models\review;
use App\Models\User;
use App\Models\category;
use App\Models\feedback;



class allproduct extends Controller
{
    public function product(Request $request){
        // Kiểm tra xem tham số category có tồn tại trong request không
        $categoryId = $request->query('category');
        
        // Lấy thông tin sản phẩm và hình ảnh
        $data = DB::table('products')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->select('products.*','images.*', 'products.name as prod_name')
            ->get();

        // Lấy thông tin của category nếu tồn tại
        $category = null;
        if ($categoryId) {
            $category = category::find($categoryId);
        }
        
        // Lấy danh sách sản phẩm theo category nếu tồn tại
        $product = null;
        if ($categoryId) {
            $product = addprod::where('category_id', $categoryId)->get();
        }

        $search = $request->input('search');

        $data = DB::table('products')
        ->join('images', 'images.product_id', '=', 'products.id')
        ->select('products.*','images.*', 'products.name as prod_name')
            ->where('name' , 'LIKE' , "%{$search}%")
            ->orWhere('price' , 'LIKE' , "%{$search}%")
            ->get();
        return view('/allproduct', compact('data', 'category', 'product'));
    }
    
    public function show(Request $request){
        $id = $request->id;
        $product = addprod::where('id', '=', $id)->select('*')->first();

        $image = addimg::where('product_id', '=', $id)->first();

        $prod = DB::table('products')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->select('products.*','images.*', 'products.name as prod_name', 'images.id as img_id')
            ->get();

        $comments = DB::table('products')
            ->join('rates', 'rates.product_id', '=', 'products.id')
            ->where('products.id', '=', $id) // Thêm điều kiện chỉ lấy đánh giá của sản phẩm hiện tại
            ->select('rates.*')
            ->get();
    
        return view('/proddetail', compact('product', 'image', 'prod', 'comments'));
    }

    public function addreview(Request $request)
    {
        $review = new review();
        $user = auth()->user();
        if($user){
            $review->product_id = $request->id;
            $review->user_id = $user->id;
            $review->description = $request->message;
            $review->name = $user->name;               
            $review->save();
        }    

        return redirect()->back()->with('success', 'Bình luận đã được thêm thành công.');
    }
    
    public function addfeedback(Request $request){
        $feedback = new feedback();
        $feedback->user_id = Auth::id();
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return redirect()->back()->with('success', 'Gửi phản hồi thành công!');
    }
    
    public function related(){
        $prod = DB::table('products')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->select('products.*','images.*', 'products.name as prod_name')
            ->get();
        return view('/homepage', compact('prod'));
    }

    public function vlogin(){
        return view('/login');
    }
    public function userlogin(Request $request){
        $messages = [
            'username.required' => 'vui lòng nhập tài khoản',
            'password.required' => 'vui lòng nhập mật khẩu',
        ];

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], $messages);
        $credentialsWithRole = array_merge($credentials);

        if(Auth::attempt($credentialsWithRole)){
            if($request->session()->has('redirect_back')){
                $redirectRoute = $request->session()->get('redirect_back');
                $request->session()->forget('redirect_back');
                return redirect($redirectRoute)->with('success', 'Đăng nhập thành công');
            }
        }else{
            return back()->withErrors([
                'username' => 'thông tin đăng nhập không chính xác',
            ])->withInput($request->only('username'));
        }
        return redirect('/homepage');
    }

    public function vregister(){
        return view('/register');
    }
    public function userregister(Request $request){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'fullname.required' => 'vui lòng nhập đầy đủ t',
            'password.required' => 'vui lòng nhập mật khẩu',
            'username.required' => 'vui lòng nhập tài khoản',
            'email.required' => 'vui lòng nhập email',
            'email.email' => 'đây không phải email đúng',
            'email.unique' => 'email đã được đăng ký',
            'phone.required' => 'vui lòng nhập số điện thoại',
            'password.min' => 'mật khẩu quá ngắn',
            'password.confirmed' => 'mật khẩu không trùng khớp',
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('/profile-user')->with('success', 'đăng ký thành công');
    }

    public function userlogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/homepage');
    }

    public function profile(){
        $user = User::where('id', Auth::user()->id)->first();
        $data = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('images', 'images.product_id', '=', 'order_details.product_id')
            ->select('order_details.*','images.*','orders.*', 'order_details.id as detail_id', 'order_details.name as detailname', 'order_details.total_price as prodprice')
            ->where('users.id', Auth::user()->id)
            ->get();
        return view('/profile_user', compact('user', 'data'));
    }

    public function vchange(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('/change_info', compact('user'));
    }

    public function updateinfo(Request $request){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'fullname.required' => 'vui lòng nhập đầy đủ tên',
            'password.required' => 'vui lòng nhập mật khẩu',
            'username.required' => 'vui lòng nhập tài khoản',
            'email.required' => 'vui lòng nhập email',
            'email.email' => 'đây không phải email đúng',
            'email.unique' => 'email đã được đăng ký',
            'phone.required' => 'vui lòng nhập số điện thoại',
            'password.min' => 'mật khẩu quá ngắn',
            'password.confirmed' => 'mật khẩu không trùng khớp',
        ]);

        $user = User::find(Auth::user()->id);

        $user->name = $request->fullname;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('/profile-user');
    }

   
}
