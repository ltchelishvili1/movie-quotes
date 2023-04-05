<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\View\View;

class QuoteController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		$quote = Quote::inRandomOrder()->first() ?? [];
		return view('quotes.index', [
			'quote' => $quote,
		]);
	}
}
