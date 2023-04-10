<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'name_en'    => 'required|min:3|max:255',
			'name_ka'    => 'required|min:3|max:255',
			'name'       => 'required',
			'user_id'    => 'required',
		];
	}

	public function prepareForValidation()
	{
		$this->merge([
			'name' => [
				'en' => $this->name_en,
				'ka' => $this->name_ka,
			],
			'user_id' => auth()->id(),
		]);
	}

	public function messages()
	{
		return [
			'name_en.min'      => __('validation.min'),
			'name_ka.min'      => __('validation.min'),
			'name_en.max'      => __('validation.max'),
			'name_ka.max'      => __('validation.max'),
			'name_en.required' => __('validation.field_validation'),
			'name_ka.required' => __('validation.field_validation'),
		];
	}
}
