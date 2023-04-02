<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;

class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.movies.index', [
			'movies' => Movie::get()->where('user_id', auth()->id()),
		]);
	}

	public function edit(Movie $movie)
	{
		return view('admin.movies.edit', ['movie' => $movie]);
	}

	public function Update(UpdateMovieRequest $request, Movie $movie)
	{
		$validated = $request->validated();
		$translations = ['en' => $validated['name_en'], 'ka' => $validated['name_ka']];
		$movie->setTranslations('name', $translations);
		$movie->save();

		return redirect(route('adminpanel'));
	}
}
