<?php

	class Brand extends Eloquent{
		protected $fillable = ['name'];

		public function categories(){
			return $this->belongsToMany('Category', 'category_brand');
		}
	}

 ?>