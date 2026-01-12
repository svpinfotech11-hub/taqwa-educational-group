<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        $events = Event::with('details')->latest()->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'desc'       => 'nullable|string',
            'event_date' => 'nullable|date',
            'links.*'    => 'nullable|url',
        ]);

        $event = Event::create([
            'name'       => $request->name,
            'desc'       => $request->desc,
            'event_date' => $request->event_date,
        ]);

        $images = $request->file('images', []);
        $videos = $request->file('videos', []);
        $links  = $request->links ?? [];

        $count = max(count($images), count($videos), count($links));

        for ($i = 0; $i < $count; $i++) {

            $imageName = null;
            $videoName = null;

            if (isset($images[$i])) {
                $imageName = time() . '_' . $images[$i]->getClientOriginalName();
                $images[$i]->move('events/images', $imageName);
            }

            if (isset($videos[$i])) {
                $videoName = time() . '_' . $videos[$i]->getClientOriginalName();
                $videos[$i]->move('events/videos', $videoName);
            }

            if (!$imageName && !$videoName && empty($links[$i])) {
                continue;
            }

            EventDetail::create([
                'event_id' => $event->id,
                'image'    => $imageName,
                'video'    => $videoName,
                'link'     => $links[$i] ?? null,
            ]);
        }

        return redirect()->route('events.index')
            ->with('success', 'Event added successfully.');
    }

    public function edit($id)
    {
        $event = Event::with('details')->findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'desc'       => 'nullable|string',
            'event_date' => 'nullable|date',
            'links.*'    => 'nullable|url',
        ]);

        $event = Event::findOrFail($id);

        $event->update([
            'name'       => $request->name,
            'desc'       => $request->desc,
            'event_date' => $request->event_date,
        ]);

        $submittedIds = $request->detail_ids ?? [];
        $existingIds  = $event->details()->pluck('id')->toArray();
        $deleteIds    = array_diff($existingIds, $submittedIds);

        if (!empty($deleteIds)) {
            EventDetail::whereIn('id', $deleteIds)->delete();
        }

        $images    = $request->file('images', []);
        $videos    = $request->file('videos', []);
        $links     = $request->links ?? [];
        $detailIds = $request->detail_ids ?? [];

        $count = max(
            count($images),
            count($videos),
            count($links),
            count($detailIds)
        );

        for ($i = 0; $i < $count; $i++) {

            $detail = isset($detailIds[$i])
                ? EventDetail::find($detailIds[$i])
                : new EventDetail();

            $detail->event_id = $event->id;

            if (isset($images[$i])) {
                $imageName = time() . '_' . $images[$i]->getClientOriginalName();
                $images[$i]->move('events/images', $imageName);
                $detail->image = $imageName;
            }

            if (isset($videos[$i])) {
                $videoName = time() . '_' . $videos[$i]->getClientOriginalName();
                $videos[$i]->move('events/videos', $videoName);
                $detail->video = $videoName;
            }

            if (!empty($links[$i])) {
                $detail->link = $links[$i];
            }

            if (
                empty($detail->image) &&
                empty($detail->video) &&
                empty($detail->link)
            ) {
                continue;
            }

            $detail->save();
        }

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $record = Event::find($id);
        $record->delete();
        return back()->with('sucess', 'Event Deleted SucessFully!');
    }
}
