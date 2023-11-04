<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Plan;

class ImageController extends Controller
{

    public function store(Request $request, Plan $plan)
    {
         // ディレクトリ名
         $dir = 'plans';

         // アップロードされたファイル名を取得
         $file_name = $request->file('image')->getClientOriginalName();
 
         // 取得したファイル名で保存
         $request->file('image')->storeAs('public/'. $dir, $file_name);
 
         // ファイル情報をDBに保存
         $image = new Image();
         $image->image = $file_name;
         $image->path = '/' . $dir . '/' . $file_name;
         $image->plan_id = $plan->id;
         $image->save();

        return redirect()->route('plan.index')->with('message', '写真の保存が完了しました');
    }

}
