<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;


use Validator;


class DefaultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSupplier(Request $request){
        $r_brand_id = $request->brand_id;
        //dd($r_brand_id);
        $allSupplier = Product::with('prd_supplier')->select('supplier_id')->where('brand_id',$r_brand_id)->groupBy('supplier_id')->get();
        //dd($allSupplier);
        return response()->json($allSupplier);
    }


    public function getCategory(Request $request)
    {
        $r_supplier_id = $request->supplier_id;
        $allCategory = Product::with('category')->select('category_id')->where('supplier_id',$r_supplier_id)->groupBy('category_id')->get();
        return response()->json($allCategory);
    }

    public function categoryForInvoice(Request $request)
    {
        $r_brand_id = $request->brand_id;
        $allCategory = Product::with('category')->select('category_id')->where('brand_id',$r_brand_id)->groupBy('category_id')->get();
        //dd($allCategory);

        return response()->json($allCategory);
    }

    public function getSubCategory(Request $request){
        $r_category_id = $request->category_id;
        $allSubCategory = Product::with(['product_sub_category'])->select('sub_category_id')->where('category_id',$r_category_id)->groupBy('sub_category_id')->get();
        //dd($allSubCategory->toArray());
        return response()->json($allSubCategory);
    }

    public function getProducts(Request $request){
        $r_sub_category_id = $request->sub_category_id;
        $allProducts = Product::where('sub_category_id',$r_sub_category_id)->get();
        //dd($allProducts);
        return response()->json($allProducts);


    }




//    public function getSubCategory(Request $request){
//        if(empty($request->cat_id)){
//            return response()->json(['status' => false , 'message' => 'Category ID Not found', 'data' => [] ]);
//        }
//        $data = SubCategory::select('id','name')->where('category_id',$request->cat_id)->get();
//        if(count($data)){
//            return response()->json(['status' => true , 'message' => 'Sub Category found', 'data' => $data]);
//        }else{
//            return response()->json(['status' => false , 'message' => 'Sub Category Not found', 'data' => [] ]);
//        }
//    }

}
