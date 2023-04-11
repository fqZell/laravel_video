<?php

namespace App\Http\Controllers;

use App\Models\video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(Request $request)
    {
        $videos = video::query()->where('is_published', '=', true)->get();

        $count = count($videos);

        $videos = Video::query();

        if ($request->has('query')) {
            $query = $request->get('query');
            $videos = $videos->where('title', 'LIKE', "%$query%");
        }

        $videos = $videos->paginate(3)->withQueryString();

        return view('home', compact('videos'));
    }

    public function signUp()
    {
        return view('signUp');
    }

    public function signIn()
    {
        return view('signIn');
    }

    public function create()
    {
        return view('create');
    }

    public function single()
    {
        return view('single');
    }
}
