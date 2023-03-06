<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Protype;


class MyController extends Controller
{
    // function productdetail($id)
    // {
    //     $allProducts = Product::all();
    //     $protype = Protype::find($id);
    //     return view('productDetaill', [
    //         'allProducts' => $allProducts,
    //         'protype' =>  $protype
    //     ]);
    // }
    function index($page = "index"){
        $allProtypes = Protype::all();
        $allProducts = Product::all();
        $allManufactures = Manufacture::all();
        // $pagination = Product::orderBy('feature','desc')->simplePaginate(6);
        $pagination = Product::simplePaginate(6);

        // $paginationProduct = Product::simplePaginate(4);
        return view($page, [
            'allProtypes' => $allProtypes,
            'allProducts' => $allProducts,
            'allManufactures' => $allManufactures,
            'pagination' => $pagination,

            // 'paginationProduct' => $paginationProduct
        ]);
    }
    
    function productsearch(Request $request)
    {
        $productsearch = Product::where('name', 'LIKE', '%'.$request->keyword.'%')->get();
        $allProtypes = Protype::all();
        $allProducts = Product::all();
         return view('productsearch', [
             'productsearch' => $productsearch,
             'allProtype' => $allProtypes,
             'allProducts' => $allProducts
         ]);
    }
    function productsearchajax($keyword){
        $productsearch = Product::where('name', 'LIKE', '%'.$keyword.'%')->Limit(4)->get();
        return $productsearch;
    }
    function productdetails(Request $request){
        $product_Id = Product::where('id',$request->product_id)->get();
        foreach ($product_Id as $key => $value) {
            $type_id = $value->type_id;
        }
        $productRelated = Product::where('type_id',$type_id)->take(4)->get();
        $allProducts = Product::all();
        $allComment = Comment::all();
        return view('productDetail', [
            'product_Id' => $product_Id,
            'productRelated' => $productRelated,
            'products' => $allProducts,
            'allComment' => $allComment,
        ]);
    }
    // function addtoCart($id){
    //     $getProductbyId = Product::find($id);
    //     $allProtypes = Protype::all();
    //     return view('shoping-cart',['addtocard' => $getProductbyId,
    //     'allProtype' => $allProtypes]);
    // }
    function addtoCart(Request $request){
        $product_Id = Product::where('id',$request->product_id)->get();
        $allProtypes = Protype::all();
        return view('shoping-cart',['addtocard' => $product_Id,
        'allProtype' => $allProtypes]);
        }
    }
