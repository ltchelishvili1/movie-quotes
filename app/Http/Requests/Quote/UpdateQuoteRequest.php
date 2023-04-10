<?php

namespace App\Http\Requests\Quote;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'title_en'    => 'required|min:3|max:255',
			'title_ka'    => 'required|min:3|max:255',
			'title'       => 'required',
			'user_id'     => 'required',
			'movie_id'    => 'required',
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

	public function messages()
	{
		return [
			'title_en.min'      => __('validation.min'),
			'title_ka.min'      => __('validation.min'),
			'title_en.max'      => __('validation.max'),
			'title_ka.max'      => __('validation.max'),
			'title_en.required' => __('validation.field_validation'),
			'title_ka.required' => __('validation.field_validation'),
			'user_id.required'  => __('validation.field_validation'),
			'movie_id.required' => __('validation.field_validation'),
			'title.required'    => __('validation.field_validation'),
		];
	}
}
