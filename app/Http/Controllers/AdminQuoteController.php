<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuote;
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

	public function edit(Movie $movie, Quote $quote)
	{
		return view('admin.quotes.edit', ['movie' => $movie, 'quote' => $quote]);
	}

	public function store(CreateQuote $request, Movie $movie)
	{
		$validated = $request->validated();
		$attributes['title'] = ['en' => $validated['title_en'], 'ka' => $validated['title_ka']];
		$attributes['user_id'] = auth()->id();
		$attributes['movie_id'] = $movie->id;
		if ($attributes['thumbnail'] ?? false)
		{
			$path = request()->file('thumbnail')->store('thumbnails');
			$attributes['thumbnail'] = $path;
		}
		Quote::create($attributes);
		return redirect()->back();
	}

	public function Update(UpdateQuoteRequest $request, Movie $movie, Quote $quote)
	{
		$validated = $request->validated();
		$attributes['title'] = ['en' => $validated['title_en'], 'ka' => $validated['title_ka']];
		if ($attributes['thumbnail'] ?? false)
		{
			$path = request()->file('thumbnail')->store('thumbnails');
			$attributes['thumbnail'] = $path;
		}

		$quote->update($attributes);

		return redirect(route('adminpanel'));
	}

	public function destroy(Movie $movie, Quote $quote)
	{
		$quote->delete();
		return back();
	}
}
