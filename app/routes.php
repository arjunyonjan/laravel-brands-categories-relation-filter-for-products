<?php

Route::get('/', function()
{

	$category = Category::find(2);
	$brand = Brand::create([
		'name'=> 'LG'
	]);
	$category->brands()->attach($brand);

});


/*Route::get('category/{id}', function($id){
	$category = Category::find($id);
	$products = Product::where(function($query) use($id){
		if(!empty(Input::get('brands'))){
			foreach(Input::get('brands') as $brand):
				$query->orWhere('brand_id','=',$brand)->whereCategoryId($id);
			endforeach;
		}

		//else just normal thing happens
	})->get();

	return View::make('category', with(['category' => $category, 'products' => $products]));
});
*/
Route::get('category/{slug}', function($slug){
	$category = Category::where('slug','=',$slug)->first();

	$products = Product::where(function($query) use($category, $slug){
		if(!empty(Input::get('brands'))){
			foreach(Input::get('brands') as $brand):
				$query->orWhere('brand_id','=',$brand)->whereCategoryId($category->id);
			endforeach;
		}
		//else just normal thing happens
	})->get();

	return View::make('category', with(['category' => $category, 'products' => $products]));
});


//db listener
/*DB::listen(function($sql){
	var_dump($sql);
});*/