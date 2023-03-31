<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
	use HasFactory;

	protected $with = ['movie', 'author'];

	public function movie()
	{
		return $this->belongsTo(Movie::class);
	}

	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
