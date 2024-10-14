<?php

namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies', compact('movies'));
    }

    public function book(Movie $movie)
    {
        return view('form-ticket', compact('movie'));
    }

    public function tickets(Movie $movie)
    {
        $tickets = $movie->tickets;
        return view('list-tickets', compact('tickets'));
    }
}
