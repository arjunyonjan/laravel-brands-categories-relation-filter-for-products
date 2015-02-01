<?php

	class Category extends Eloquent{
		protected $fillable = ['name'];

		public function brands(){
			return $this->belongsToMany('Brand','category_brand');
		}
	}

 ?>