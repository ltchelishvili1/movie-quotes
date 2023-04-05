<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules()
	{
		return [
			'email'    => 'required|email|max:255',
			'password' => 'required|min:8|max:255',
		];
	}

	public function messages()
	{
		return [
			'password.min'      => __('validation.min'),
			'password.max'      => __('validation.max'),
			'password.required' => __('validation.field_validation'),
			'email.email'       => __('validation.shouldbe_email'),
			'email.max'         => __('validation.max'),
			'email.required'    => __('validation.field_validation'),
		];
	}
}
