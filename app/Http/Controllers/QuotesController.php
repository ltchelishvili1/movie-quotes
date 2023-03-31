<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class QuotesController extends Controller
{
	public function index(Quote $quote)
	{
		$randomquote = $quote->get()->random();
		return view('quotes.index', [
			'quote' => $randomquote,
		]);
	}
}
