<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
	protected $fillable=['user_id','title','description','slug_fa','view'];
    use HasFactory;

	public static function get_date( $blog_post ) {
		$gdate=$blog_post->created_at->format('Y-m-d');
		$jalalidate=\Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($gdate));
		$jalalidate=\Morilog\Jalali\CalendarUtils::convertNumbers($jalalidate);
		return $jalalidate;
	}

	public function user(  ) {
		return $this->belongsTo(User::class);
	}

	public function category(  ) {
		return $this->belongsToMany(Category::class,'blogpost_category','blogpost_id');
	}
}
