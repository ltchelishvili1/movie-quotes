<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function create(): View
	{
		return view('sessions.create');
	}

	public function store(): RedirectResponse
	{
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);

		if (!auth()->attempt($attributes))
		{
			throw ValidationException::withMessages([
				'email' => 'Your provided credential could not be verified.',
			]);
		}

		session()->regenerate();

		return redirect('/');
	}

public function destroy(): RedirectResponse
{
	auth()->logout();

	return redirect('/');
}
}
