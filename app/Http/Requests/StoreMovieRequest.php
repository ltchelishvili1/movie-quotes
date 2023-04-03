<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'name_en' => 'required|min:3|max:255',
			'name_ka' => 'required|min:3|max:255',
			'name'    => [
				'en' => 'required|min:3|max:255',
				'ka' => 'required|min:3|max:255',
			],
			'user_id' => 'required',
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
}
