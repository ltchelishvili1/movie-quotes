<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class QuotesController extends Controller
{
	public function index(Movie $movie)
	{
		$randomMovie = $movie->get()->random();
		return view('quotes.index', [
			'movie' => $randomMovie,
			'quote' => $randomMovie->quote->random(),
		]);
	}
}
