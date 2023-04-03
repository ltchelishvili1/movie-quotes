<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'title_en' => 'required|min:3|max:255',
			'title_ka' => 'required|min:3|max:255',
			'user_id'  => 'required',
			'movie_id' => 'required',
			'title'    => 'required',
		];
	}

	public function prepareForValidation()
	{
		$this->merge([
			'title' => [
				'en' => $this->title_en,
				'ka' => $this->title_ka,
			],
			'user_id'  => auth()->id(),
			'movie_id' => request()->movie->id,
		]);
	}
}
