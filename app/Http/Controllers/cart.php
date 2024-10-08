<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addprod;

class cart extends Controller
{
    public function index(){
        return view('cart');
    }

    public function add(Request $request, addprod $product){
        $quantity = $request->input('quantity');
        $cart = session('cart');

        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity'] += $quantity;
            
        }
        else{
            $cart[$product->id] = [
                'product_id' => $product->id,
                'image' => $product->image->img1,
                'name' => $product->name,
                'quantity' => $quantity,
                'price'=> $product->price,
            ];
        }
        session()->put('cart', $cart);
        $this->totalPrice();
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
    }

    public function update(Request $request, $product_id){
        $action = $request->input('action'); // Lấy giá trị action từ form

        $cart = session('cart');

        if ($action === 'add') {
            $cart[$product_id]['quantity'] += 1; // Tăng số lượng lên 1
        } elseif ($action === 'drop' && $cart[$product_id]['quantity'] > 1) {
            $cart[$product_id]['quantity'] -= 1; // Giảm số lượng đi 1 (đồng thời kiểm tra số lượng tối thiểu là 1)
        }

        session()->put('cart', $cart);
        $this->totalPrice();

        return redirect()->back()->with('success', 'Cập nhật số lượng sản phẩm thành công!');
    }

    public function delete($product_id){
        session()->pull('cart.'.$product_id);
        $this->totalPrice();
        return back()->with('success', 'Xóa sản phẩm khỏi giỏ hành thành công!');
    }

    protected function totalPrice(){
        $total_price = 0;
        foreach(session('cart') as $item){
            $total_price += $item['quantity'] * $item['price'];
        }
        session()->put('total_price', $total_price);
    }
}
