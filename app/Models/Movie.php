<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['name'];

	protected $guarded = ['id'];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function quotes(): HasMany
	{
		return $this->hasMany(Quote::class);
	}
}
