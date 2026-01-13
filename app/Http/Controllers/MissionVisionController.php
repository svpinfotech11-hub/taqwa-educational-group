<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MissionVision;
use App\Models\MissionVisionMedia;
use App\Http\Controllers\Controller;

class MissionVisionController extends Controller
{
    public function index()
    {
        $sections = MissionVision::all();
        return view('mission-vision.index', compact('sections'));
    }


    public function show()
    {
        $sections = MissionVision::all();
        return view('mission-vision.index', compact('sections'));
    }

    public function create()
    {
        return view('mission-vision.create');
    }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'type' => 'required|in:mission,vision,objective',
    //         'title' => 'nullable|string|max:255',
    //         'description' => 'required|string',
    //     ]);

    //     MissionVision::create($request->all());

    //     return redirect()->route('mission-vision.index')->with('success', 'Section added successfully.');
    // }



    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:mission,vision,objective',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'videos.*' => 'nullable|mimes:mp4,mov,avi,webm|max:20000',
            'youtube_links.*' => 'nullable|url',
            'youtube_descriptions.*' => 'nullable|string|max:255',
        ]);
        

        $section = MissionVision::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        /** IMAGES → public/mission_vision/images */
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $destination = 'mission_vision/images';
                $image->move($destination, $filename);
                // $image->move('mission_vision/images', $filename);

                MissionVisionMedia::create([
                    'mission_vision_id' => $section->id,
                    'media_type' => 'image',
                    'media_path' => $destination . '/' . $filename, // Save folder + filename
                ]);
            }
        }

        /** VIDEOS → public/mission_vision/videos */
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $filename = Str::uuid() . '.' . $video->getClientOriginalExtension();
                $destination = 'mission_vision/videos';
                 $video->move($destination, $filename);
                // $video->move('mission_vision/videos', $filename);

                MissionVisionMedia::create([
                    'mission_vision_id' => $section->id,
                    'media_type' => 'video',
                    'media_path' => $destination . '/' . $filename, // Save folder + filename
                ]);
            }
        }

        /** YOUTUBE LINKS */
        if ($request->youtube_links) {
            foreach ($request->youtube_links as $index => $link) {
                if ($link) {
                    MissionVisionMedia::create([
                        'mission_vision_id' => $section->id,
                        'media_type' => 'youtube',
                        'media_path' => $link,
                        'description' => $request->youtube_descriptions[$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()
            ->route('mission-vision.index')
            ->with('success', 'Section added successfully.');
    }


    public function edit($id)
    {
        $section = MissionVision::with('media')->findOrFail($id);
        return view('mission-vision.edit', compact('section'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'type' => 'required|in:mission,vision,objective',
    //         'title' => 'nullable|string|max:255',
    //         'description' => 'required|string',
    //     ]);

    //     $section = MissionVision::findOrFail($id);
    //     $section->update($request->all());

    //     return redirect()->route('mission-vision.index')->with('success', 'Section updated successfully.');
    // }



    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:mission,vision,objective',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'videos.*' => 'nullable|mimes:mp4,mov,avi,webm|max:20000',
            'youtube_links.*' => 'nullable|url',
            'youtube_descriptions.*' => 'nullable|string|max:255',
        ]);

        $section = MissionVision::findOrFail($id);

        /** UPDATE MAIN SECTION */
        $section->update([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        /** ADD NEW IMAGES → public/mission_vision/images */
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $destination = 'mission_vision/images';
                $image->move($destination, $filename);

                MissionVisionMedia::create([
                    'mission_vision_id' => $section->id,
                    'media_type' => 'image',
                    'media_path' => $destination . '/' . $filename, // save folder + filename
                ]);
            }
        }

        /** ADD NEW VIDEOS → public/mission_vision/videos */
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $filename = Str::uuid() . '.' . $video->getClientOriginalExtension();
                $destination = 'mission_vision/videos';
                $video->move($destination, $filename);

                MissionVisionMedia::create([
                    'mission_vision_id' => $section->id,
                    'media_type' => 'video',
                    'media_path' => $destination . '/' . $filename, // save folder + filename
                ]);
            }
        }

        /** ADD NEW YOUTUBE LINKS */
        if ($request->youtube_links) {
            foreach ($request->youtube_links as $index => $link) {
                if ($link) {
                    MissionVisionMedia::create([
                        'mission_vision_id' => $section->id,
                        'media_type' => 'youtube',
                        'media_path' => $link,
                        'description' => $request->youtube_descriptions[$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()
            ->route('mission-vision.index')
            ->with('success', 'Section updated successfully.');
    }


   public function deleteMedia($id)
    {
        $media = MissionVisionMedia::findOrFail($id);

        // Delete physical file (except YouTube)
        if ($media->media_type !== 'youtube') {
            $filePath = public_path($media->media_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $media->delete();

        return response()->json([
            'success' => true,
            'message' => 'Media deleted successfully.'
        ]);
    }


    public function destroy($id)
    {
        $section = MissionVision::findOrFail($id);
        $section->delete();

        return redirect()->route('mission-vision.index')->with('success', 'Section deleted successfully.');
    }
}
