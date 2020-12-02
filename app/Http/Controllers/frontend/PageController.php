<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Product;
use App\Model\ProductDetail;
use App\Model\AttributeProduct;
class PageController extends Controller
{
	private $module = "frontend.home";

	public function index()
	{
		$product = Product::orderBy('created_at','desc')
							->with(['ProductDetails'])
							->take(10)
							->get();
		$attribute = AttributeProduct::all(['image','product_detail_id']);
		return view($this->module.'.index',compact('product','attribute'));
	}

	public function detailProduct(Request $request)
	{
		if($request->ajax())
		{
			try{
				$productDetail = ProductDetail::findOrFail($request->id);
				$attribute = $productDetail->AttributeProducts()->get();
				$product = $productDetail->Products()->get('product_name');
				return view($this->module.'.modal_product',compact('productDetail','attribute','product'));
			}catch(Exception $e){

			}
			
		}
	}

	public function changeColorProduct(Request $request)
	{
		if($request->ajax())
		{
			try{
				$attribute = AttributeProduct::findOrFail($request->id);
				return response()->json(['data'=>$attribute],200);
			}catch(Exception $e){

			}
		}
	}
}