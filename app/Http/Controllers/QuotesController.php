<?php

namespace App\Http\Controllers;

class QuotesController extends Controller
{
	public function index()
	{
		return view('quotes.index');
	}
}
