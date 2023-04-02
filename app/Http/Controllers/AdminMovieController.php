<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovie;
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

	public function create()
	{
		return view('admin.movies.create');
	}

	public function store(CreateMovie $request)
	{
		$validated = $request->validated();
		$attributes['name'] = ['en' => $validated['name_en'], 'ka' => $validated['name_ka']];
		$attributes['user_id'] = auth()->id();
		Movie::create($attributes);
		return redirect(route('adminpanel'));
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

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return back();
	}
}
