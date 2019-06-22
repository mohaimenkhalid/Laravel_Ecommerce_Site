<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Category extends Model
{
    public function parent()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products(){

    	return $this->hasmany(Product::class);
    }

    public static function parentorNotCategory($parent_id, $child_id)
    {
    	$categories = Category::where('id', $child_id)->where('id', $parent_id)->get();

    	if (!is_null($categories)) {
    		return true;
    	}else{

    		return false;
    	}
    }



}
