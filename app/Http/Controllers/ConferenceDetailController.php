<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Models\SubpageBanner;
use App\Models\ConferenceDetail;

class ConferenceDetailController extends Controller
{

    public function create()
    {
        $conferences = Conference::all();
        return view('conference_details.create', compact('conferences'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'conference_id' => 'required|integer',
            'title'         => 'required|string',
            'pdfs.*'        => 'nullable|file|mimes:pdf',
            'video_links'   => 'array',
            'video_links.*' => 'nullable|url',
        ]);

        $pdfPaths = [];

        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $pdf) {

                $filename = time() . '_' . uniqid() . '.' . $pdf->getClientOriginalExtension();

                // Move file to public/conference_pdfs
                $pdf->move('conference_pdfs', $filename);

                // Save path in JSON
                $pdfPaths[] = 'conference_pdfs/' . $filename;
            }
        }

        $detail = ConferenceDetail::create([
            'conference_id' => $request->conference_id,
            'title'         => $request->title,
            'pdfs'          => $pdfPaths,                 // store as JSON
            'video_links'   => $request->video_links ?? [] // store as JSON
        ]);

        return back()->with('success', 'Conference detail created successfully.');
    }

    // public function showConfDetail($slug)
    // {
    //     $conference = Conference::where('slug', $slug)->firstOrFail();

    //     // Fetch details for this conference
    //     $details = ConferenceDetail::where('conference_id', $conference->id)->get();

    //       $page = SubpageBanner::where('id', 27)->first();

    //     return view('show-page', compact('conference', 'details', 'page'));
    // }

    public function showConfDetail($slug)
    {
        $conference = Conference::where('slug', $slug)->firstOrFail();

        // Fetch all details
        $details = ConferenceDetail::where('conference_id', $conference->id)->get();

        // Collect all PDFs from all details
        $allPdfs = [];
        foreach ($details as $detail) {
            if (!empty($detail->pdfs)) {
                foreach ($detail->pdfs as $pdf) {
                    $allPdfs[] = $pdf;
                }
            }
        }

        // Collect all video links from all details
        $allVideos = [];
        foreach ($details as $detail) {
            if (!empty($detail->video_links)) {
                foreach ($detail->video_links as $link) {
                    $allVideos[] = $link;
                }
            }
        }

        $page = SubpageBanner::where('id', 27)->first();
        return view('show-page', compact('conference', 'details', 'allPdfs', 'allVideos', 'page'));
    }
}
