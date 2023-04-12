<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\StoreQuoteRequest;
use App\Http\Requests\Quote\UpdateQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminQuoteController extends Controller
{
	public function index(): View
	{
		return view('admin.quotes.index', [
			'quotes'   => Quote::all(),
		]);
	}

	public function create(): View
	{
		return view('admin.quotes.create', [
			'movies' => Movie::all(),
		]);
	}

	public function store(StoreQuoteRequest $request): RedirectResponse
	{
		$validated = $request->validated();
		if (request()->file('thumbnail') != null)
		{
			$validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		Quote::create($validated);
		return redirect(route('adminpanel'));
	}

	public function edit(Movie $movie, Quote $quote): View
	{
		return view('admin.quotes.edit', ['quote' => $quote, 'movies' => Movie::all()]);
	}

	public function Update(UpdateQuoteRequest $request, Quote $quote): RedirectResponse
	{
		$validated = $request->validated();
		if (request()->file('thumbnail') != null)
		{
			$validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		$quote->update($validated);

		return redirect(route('adminpanel'));
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();
		return back();
	}
}
