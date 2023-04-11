<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoStoreRequest;
use App\Http\Requests\VideoUpdateRequest;
use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function single(video $video)
    {
        $video->update([
            'view_count' => $video->view_count + 1
        ]);

        return view('single', compact('video'));
    }

//    public function like(Video $video)
//    {
//        auth()->user()->like($video);
//        return back();
//    }

    public function delete(video $video)
    {
        $video->delete();

        return redirect()->route('home');
    }

    public function store(VideoStoreRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('poster')) {
            $validated['poster'] = $request->file('poster')->store('public/images');
        }

        if ($request->file('video_path')) {
            $validated['video_path'] = $request->file('video_path')->store('public/videos');
        }

        $validated['author_id'] = Auth::user()->getAuthIdentifier();

        $video = video::query()->create($validated);

        return redirect()->route('home');
    }

    public function update(video $video, VideoUpdateRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('poster')) {
            $validated['poster'] = $request->file('poster')->store('public/images');
        }

        if ($request->file('video_path')) {
            $validated['video_path'] = $request->file('video_path')->store('public/videos');
        }

        $video->update($validated);

        return redirect()->route('home');
    }

    public function updateForm(video $video)
    {
        return view('upDate', compact('video'));
    }
}
