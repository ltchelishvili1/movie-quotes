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
		$validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		Quote::create($validated);
		return redirect()->back();
	}

	public function Update(UpdateQuoteRequest $request, Movie $movie, Quote $quote): RedirectResponse
	{
		$validated = $request->validated();
		$validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		$quote->update($validated);

		return redirect(route('adminpanel'));
	}

	public function destroy(Movie $movie, Quote $quote): RedirectResponse
	{
		$quote->delete();
		return back();
	}
}
