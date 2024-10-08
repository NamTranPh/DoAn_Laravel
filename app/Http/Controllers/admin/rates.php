<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\review;
use App\Models\feedback;
use App\Models\addprod;


class rates extends Controller
{
    public function review(){
        $review = DB::table('rates')
        ->join('images', 'images.product_id', '=', 'rates.product_id')
        ->select('rates.*','images.*', 'rates.id as review_id')
        ->get();
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_review', ['user'=>$adminUser], compact('review'));
    }

    public function feedback(){
        $feedback = DB::table('feedback')
        ->join('users', 'users.id', '=', 'feedback.user_id')
        ->select('feedback.*', 'users.*', 'feedback.id as fb_id')
        ->get();
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_feedback', ['user'=>$adminUser], compact('feedback'));
    }

    public function deleteFB($id){
        $dlt = feedback::find($id);
        $dlt -> delete();
        return redirect()->action([rates::class, 'feedback'])->with('success', 'Xóa dữ liệu thành công');
    }

    public function deleteRV($id){
        $dlt = review::find($id);
        $dlt -> delete();
        return redirect()->action([rates::class, 'review'])->with('success', 'Xóa dữ liệu thành công');
    }
}
