<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;

class AdminQuoteController extends Controller
{
	public function index(Movie $movie)
	{
		return view('admin.quotes.index', [
			'quotes'   => $movie->quotes,
			'movie_id' => $movie->id,
		]);
	}

	public function create(Movie $movie)
	{
		return view('admin.quotes.create', [
			'movie' => $movie,
		]);
	}

	public function store(UpdateQuoteRequest $request, Movie $movie)
	{
		$path = request()->file('thumbnail')->store('thumbnails');
		$validated = $request->validated();
		$attributes['title'] = ['en' => $validated['title_en'], 'ka' => $validated['title_ka']];
		$attributes['user_id'] = auth()->id();
		$attributes['movie_id'] = $movie->id;
		$attributes['thumbnail'] = $path;
		Quote::create($attributes);
		return redirect()->back();
	}
}
