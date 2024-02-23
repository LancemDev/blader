<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4|max:102400',
        ]);

        $request->file('video')->store('videos');

        return back()
            ->with('success', 'Video uploaded successfully.');
    }
}
