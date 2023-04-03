<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminQuoteController extends Controller
{
	public function index(Movie $movie): View
	{
		return view('admin.quotes.index', [
			'quotes'   => $movie->quotes,
			'movie_id' => $movie->id,
		]);
	}

	public function create(Movie $movie): View
	{
		return view('admin.quotes.create', [
			'movie' => $movie,
		]);
	}

	public function edit(Movie $movie, Quote $quote): View
	{
		return view('admin.quotes.edit', ['movie' => $movie, 'quote' => $quote]);
	}

	public function store(StoreQuoteRequest $request, Movie $movie): RedirectResponse
	{
		$validated = $request->validated();
		$attributes['title'] = ['en' => $validated['title_en'], 'ka' => $validated['title_ka']];
		$attributes['user_id'] = auth()->id();
		$attributes['movie_id'] = $movie->id;
		$path = request()->file('thumbnail')->store('thumbnails');
		$attributes['thumbnail'] = $path;
		Quote::create($attributes);
		return redirect()->back();
		// aq vcade requestshi gadatana magrad thumbnails validated funqcia isev filead aketebs
	}

	public function Update(UpdateQuoteRequest $request, Movie $movie, Quote $quote): RedirectResponse
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

	public function destroy(Movie $movie, Quote $quote): RedirectResponse
	{
		$quote->delete();
		return back();
	}
}
