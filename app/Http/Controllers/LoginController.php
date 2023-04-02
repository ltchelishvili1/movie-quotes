<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function index(): View
	{
		return view('sessions.index');
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		if (!auth()->attempt($validated))
		{
			throw ValidationException::withMessages([
				'email' => 'Your provided credential could not be verified.',
			]);
		}

		session()->regenerate();

		return redirect(route('home'));
	}

public function logout(): RedirectResponse
{
	auth()->logout();

	return redirect(route('home'));
}
}
