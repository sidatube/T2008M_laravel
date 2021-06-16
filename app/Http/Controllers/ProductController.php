<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    public function all(){
//        $products= DB::table("products")->get();
//        $products = Product::leftJoin("categories","categories.id","=","products.category_id")
//            ->select("products.*","categories.name as category_name")->get();
        $products=Product::with("Category")->with("Brand")->get();

        return view("products.products",[
           "products"=>$products,

        ]);
    }
    public function new(){
//        $categories=DB::table("categories")->get();
        $categories = Category::all();
        $brands=Brand::all();
        return view("products.formPro",[
            "categories"=>$categories,
            "brands"=>$brands
        ]);
    }
    public function save(Request $request){
//        $data=$request->all();
//        dd($data);
//        $now = Carbon::now();
//        DB::table("products")->insert([
//           "name"=>$request->get("name"),
//           "image"=>$request->get("image"),
//           "description"=>$request->get("description"),
//           "price"=>$request->get("price"),
//           "qty"=>$request->get("qty"),
//           "category_id"=>$request->get("category_id"),
//            "created_at"=>$now,
//            "updated_at"=>$now
//        ]);
        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "price"=>"required|min:0",
            "qty"=>"required|min:0",
            "category_id"=>"required|numeric|min:1",
            "brand_id"=>"required|numeric|min:1",
        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm",
            "description.required"=>"Vui lòng nhập mô tả",
            "price.required"=>"Vui lòng nhập giá sản phẩm",
            "qty.required"=>"Vui lòng nhập sô lượng",
            "category_id.min"=>"Vui lòng chọn danh mục",
            "brand_id.min"=>"Vui lòng chọn danh mục",
        ]);
        try {
            Product::create([
                "name"=>$request->get("name"),
                "image"=>$request->get("image"),
                "description"=>$request->get("description"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "brand_id"=>$request->get("brand_id"),
            ]);
        }catch (\Exception $e){
            abort(40);
        }

        return redirect()->to("/products");
    }
    public  function edit(Request $request,$id){
//        $categories=DB::table("categories")->get();
//        $product=DB::table("products")->where("id",$id)->first();
        $categories=Category::all();
        $product=Product::findOrFail($id);
        $brands=Brand::all();
        if ($product==null) return redirect()->to("/products");
        return view("products.editPro",[
            "product"=>$product,
            "categories"=>$categories,
            "brands"=>$brands
        ]);
    }
    public  function update(Request $request,$id){
//        $product=DB::table("products")->where("id",$id)->first();
//        if ($product==null) return redirect()->to("/products");
//        DB::table("products")->where("id",$id)->update([
//            "name"=>$request->get("name"),
//            "image"=>$request->get("image"),
//            "description"=>$request->get("description"),
//            "price"=>$request->get("price"),
//            "qty"=>$request->get("qty"),
//            "category_id"=>$request->get("category_id"),
//            "updated_at"=>Carbon::now()
//        ]);
        $product=Product::findOrFail($id);
        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "price"=>"required|min:0",
            "qty"=>"required|min:0",

        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm",
            "description.required"=>"Vui lòng nhập mô tả",
            "price.required"=>"Vui lòng nhập giá sản phẩm",
            "qty.required"=>"Vui lòng nhập sô lượng",

        ]);
        if ($product==null) return redirect()->to("/products");
        $product->update([
            "name"=>$request->get("name"),
            "image"=>$request->get("image"),
            "description"=>$request->get("description"),
            "price"=>$request->get("price"),
            "qty"=>$request->get("qty"),
            "category_id"=>$request->get("category_id"),
            "brand_id"=>$request->get("brand_id"),
        ]);
        return redirect()->to("/products");
    }
    public function delete($id){
        DB::table("products")->where("id",$id)->delete();
        return redirect()->to("/products");

    }
    //
}
