<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    public function index()
    {
        $apitmdb = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzNGZiNTg0YjAwNzIxMDBjYWY2ZTkyMzgzMjM2ODI1OSIsInN1YiI6IjYzN2Y2Nzc4ODViMTA1MDBkZjY1ODI3YyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.YfsQFplb_3UECChuo6iB2lI-V911jgpGARklDnR4Mww';

        $tmdbPopuler = Http::withToken($apitmdb)
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];
        $listGenre = Http::withToken($apitmdb)
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        $genre = collect($listGenre)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('index', [
            'tmdbPopuler' => $tmdbPopuler,
            'genre' => $genre
        ]);
    }
}