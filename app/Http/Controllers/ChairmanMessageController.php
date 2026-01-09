<?php

namespace App\Http\Controllers;

use App\Models\ChairmanMessage;
use Illuminate\Http\Request;

class ChairmanMessageController extends Controller
{
    public function index()
    {
        $messages = ChairmanMessage::latest()->paginate(10);
        return view('chairman-messages.index', compact('messages'));
    }

    public function create()
    {
        return view('chairman-messages.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'image' => 'nullable|image|max:2048',
    //         'description' => 'nullable|string',
    //     ]);

    //     $data = $request->all();

    //     if ($request->hasFile('image')) {
    //         $imageName = time() . '_' . $request->image->getClientOriginalName();
    //         $request->image->move('chairman_images', $imageName);
    //         $data['image'] = $imageName;
    //     }

    //     ChairmanMessage::create($data);

    //     return redirect()->route('chairman-messages.index')->with('success', 'Message added successfully.');
    // }

  
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png',
        'descriptions.*' => 'nullable|string',
    ]);

    $message = ChairmanMessage::create([
        'title' => $request->title,
    ]);

    if ($request->has('descriptions')) {
        foreach ($request->descriptions as $key => $desc) {

            $imageName = null;

            if (isset($request->images[$key])) {
                $image = $request->images[$key];
                $imageName = time().'_'.$key.'.'.$image->extension();
                $image->move('chairman_images', $imageName);
            }

            $message->items()->create([
                'image' => $imageName,
                'description' => $desc,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Chairman message created successfully');
    }

  
    public function edit($id)
    {
        $message = ChairmanMessage::findOrFail($id);
        return view('chairman-messages.edit', compact('message'));
    }

    // public function update(Request $request, $id)
    // {
    //     $message = ChairmanMessage::findOrFail($id);

    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'image' => 'nullable|image|max:2048',
    //         'description' => 'nullable|string',
    //     ]);

    //     $data = $request->all();

    //     if ($request->hasFile('image')) {
    //         if ($message->image && file_exists('chairman_images/' . $message->image)) {
    //             unlink('chairman_images/' . $message->image);
    //         }
    //         $imageName = time() . '_' . $request->image->getClientOriginalName();
    //         $request->image->move('chairman_images', $imageName);
    //         $data['image'] = $imageName;
    //     }

    //     $message->update($data);

    //     return redirect()->route('chairman-messages.index')->with('success', 'Message updated successfully.');
    // }



    public function update(Request $request, $id)
    {
        $message = ChairmanMessage::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png',
            'descriptions.*' => 'nullable|string',
        ]);

        $message->update([
            'title' => $request->title,
        ]);

        $existingIds = $message->items()->pluck('id')->toArray();
        $submittedIds = array_filter($request->item_ids ?? []);

        // 🗑 Delete only removed items
        $deleteIds = array_diff($existingIds, $submittedIds);
        $message->items()->whereIn('id', $deleteIds)->delete();

        foreach ($request->descriptions as $key => $desc) {

            $itemId = $request->item_ids[$key] ?? null;

            // Existing item
            if ($itemId) {
                $item = $message->items()->find($itemId);
                if (!$item) continue;

                // If new image uploaded → replace
                if (isset($request->images[$key])) {
                    $image = $request->images[$key];
                    $imageName = time().'_'.$key.'.'.$image->extension();
                    $image->move('chairman_images', $imageName);
                    $item->image = $imageName;
                }

                $item->description = $desc;
                $item->save();
            }
            // New item
            else {
                $imageName = null;
                if (isset($request->images[$key])) {
                    $image = $request->images[$key];
                    $imageName = time().'_'.$key.'.'.$image->extension();
                    $image->move('chairman_images', $imageName);
                }

                $message->items()->create([
                    'image' => $imageName,
                    'description' => $desc,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Chairman message updated successfully');
    }


    public function destroy($id)
    {
        $message = ChairmanMessage::findOrFail($id);

        if ($message->image && file_exists('chairman_images/' . $message->image)) {
            unlink('chairman_images/' . $message->image);
        }

        $message->delete();

        return redirect()->route('chairman-messages.index')->with('success', 'Message deleted successfully.');
    }
}
