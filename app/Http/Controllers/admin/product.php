<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\addprod;
use App\Models\addimg;
use App\Models\category;
use App\Models\order;
use App\Models\detail;
use App\Models\User;
use App\Models\review;



class product extends Controller
{
    public function product(){
        $categoryCount = category::count();
        $productCount = addprod::sum('quantity');
        $cmtCount = review::count();
        $data = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->select('products.*','categories.*','images.*', 'products.name as prod_name', 'products.id as prod_id')
            ->get();
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_prod', ['user'=>$adminUser], compact('data', 'categoryCount', 'productCount', 'cmtCount'));
    }
    public function vaddprod(){
        $category = category::all();
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/addprod', ['user'=>$adminUser], compact('category'));
    }
    public function addprod(Request $request){
        $prod = new addprod;
        $prod->name = $request->name;
        $prod->category_id = $request->category_id;
        $prod->price = $request->price;
        $prod->quantity = $request->quantity;
        $prod->status = "1";
        $prod->description = $request->description;
         
        $prod->save();

        $img = new addimg;
        $img_link1 = $request->img1;
        $storePath1 = $img_link1->move('images/product', $img_link1->getClientOriginalName());
        $img->img1 = $storePath1;

        $img_link2 = $request->img2;
        $storePath2 = $img_link2->move('images/product', $img_link2->getClientOriginalName());
        $img->img2 = $storePath2;

        $img_link3 = $request->img3;
        $storePath3 = $img_link3->move('images/product', $img_link3->getClientOriginalName());
        $img->img3 = $storePath3;

        $img_link4 = $request->img4;
        $storePath4 = $img_link4->move('images/product', $img_link4->getClientOriginalName());
        $img->img4 = $storePath4;

        $img->product_id = $prod->id;
        $img->save();
        return redirect()->action([product::class, 'product']);
    }
    public function delete($id){
        $dlt = addprod::find($id);
        $dlt -> delete();
        return redirect()->action([product::class, 'product'])->with('success', 'Xóa dữ liệu thành công');
    }
    public function edit($id){
        $edit = addprod::findOrFail($id);
        $category = category::all();
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/editprod', ['user'=>$adminUser], compact('edit', 'category'));
    }
    public function update(Request $request, $id) {
        $edit = addprod::find($id);
    
        $edit->name = $request->name;
        $edit->price = $request->price;
        $edit->category_id = $request->category_id;
        $edit->quantity = $request->quantity;
        $edit->description = $request->description;
        $edit->save();

        $image = addimg::where('product_id', $id)->first();
        if ($image) {
            if ($request->img1) {
                $img1 = $request->img1;
                $storePath1 = $img1->move('images/product', $img1->getClientOriginalName());
                $image->img1 = $storePath1;
            }
            if ($request->img2) {
                $img2 = $request->img2;
                $storePath2 = $img2->move('images/product', $img2->getClientOriginalName());
                $image->img2 = $storePath2;
            }
            if ($request->img3) {
                $img3 = $request->img3;
                $storePath3 = $img3->move('images/product', $img3->getClientOriginalName());
                $image->img3 = $storePath3;
            }
            if ($request->img4) {
                $img4 = $request->img4;
                $storePath4 = $img4->move('images/product', $img4->getClientOriginalName());
                $image->img4 = $storePath4;
            }
            $image->save();
        }
        return redirect()->action([product::class, 'product']);
    }
    public function order(){
        $orderCount = order::count();
        $yes = order::where('status', 1)->count();
        $no = order::where('status', 0)->count();
        $order = DB::table('orders')->select('*');
        $order = $order -> get();

        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_order', ['user'=>$adminUser], compact('order', 'orderCount', 'yes', 'no'));
    }
    public function deleteOD($id){
        $dlt = order::find($id);
        $dlt -> delete();
        return redirect()->action([product::class, 'order'])->with('success', 'Xóa dữ liệu thành công');
    }

    public function detail($id){
        $order = order::find($id);

        $detail = detail::where('order_id', $id)->get();

        $data = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->join('images', 'images.product_id', '=', 'order_details.product_id')
            ->select('order_details.*','images.*', 'order_details.id as dt_id')
            ->where('order_details.order_id', $id) 
            ->get();
        
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_detail', ['user'=>$adminUser], compact('order', 'data', 'detail'));
    }

    public function browser($id){
        $orderCount = order::count();
        $yes = order::where('status', 1)->count();
        $no = order::where('status', 0)->count();

        $order = order::find($id);
        $order->status = '1';
        $order->save();
        return redirect()->action([product::class, 'order']);
    }

    public function dashboard(){
        $categoryCount = category::count();
        $productCount = addprod::sum('quantity');
        $userCount = User::count();
        $revenue = order::where('status', 1)->sum('total_price');

        $data = DB::table('order_details')
        ->select('order_details.*', 'order_details.name as detail_name', 'order_details.total_price as detail_price')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->where('orders.status', 1)
        ->get();    

        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_dashboard', ['user'=>$adminUser], compact('data', 'categoryCount', 'productCount', 'userCount', 'revenue'));
    }

    public function error(){
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/error', ['user'=>$adminUser]);
    }
}
