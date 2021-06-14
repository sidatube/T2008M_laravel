<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function all(){
        //
        $categories=DB::table("categories")->get();
        return view("categories.cate",[
            "categories"=>$categories
        ]);
    }
    public function new(){
        return view("categories.form");
    }
    public function save(Request $request){
//        $data= $request->all();
//        dd($data);
        $n = $request->get("name");
        $now = Carbon::now();
        DB::table("categories")->insert([
           "name"=>$n,
            "created_at"=>$now,
            "updated_at"=>$now
        ]);
        return redirect()->to("categories");
    }
    public function edit(Request $request,$id){

        $cat = DB::table("categories")->where("id",$id)->first();// tra ve null neu ko co
        if($cat == null) return redirect()->to("categories");
        return view("categories.edit",[
            "cat"=>$cat
        ]);
    }
    public  function update(Request $request,$id){
        $cat = DB::table("categories")->where("id",$id)->first();
        if ($cat==null )return redirect()->to("categories");
        DB::table("categories")->where("id",$id)->update([
           "name"=>$request->get("name"),
            "updated_at"=>Carbon::now()
        ]);
        return redirect()->to("categories");
    }
}
