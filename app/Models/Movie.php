<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	use HasFactory;

	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function quote()
	{
		return $this->hasMany(Quote::class);
	}
}
