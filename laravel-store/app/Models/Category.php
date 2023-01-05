<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable=['category_id','blogpost_id'];
    use HasFactory;

	public function blogpost(  ) {
		return $this->belongsToMany(BlogPost::class,'blogpost_category','category_id','blogpost_id');
	}
}
