<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUsMaster;
use App\Models\ContactSubmission;

class ContactUsMasterController extends Controller
{
    public function index()
    {
        $contacts = ContactUsMaster::orderBy('id', 'desc')->get();
        return view('contactUs-master.index', compact("contacts"));
    }

    public function create()
    {
        return view('contactUs-master.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'nullable|string',
            'emails' => 'nullable|array',
            'emails.*' => 'email',
            'phones' => 'nullable|array',
            'phones.*' => 'string',
            'whatsapp_no' => 'nullable|string',
            'map_link' => 'nullable|string',
        ]);

        $mapLink = $request->map_link;

        // ✅ If admin pasted iframe, extract src
        if ($mapLink && str_contains($mapLink, '<iframe')) {
            preg_match('/src="([^"]+)"/', $mapLink, $matches);
            $mapLink = $matches[1] ?? null;
        }

        ContactUsMaster::create([
            'address' => $request->address,
            'emails' => $request->emails,
            'phones' => $request->phones,
            'whatsapp_no' => $request->whatsapp_no,
            'map_link' => $mapLink, // ✅ clean embed URL
        ]);

        return redirect()
            ->route('contactUs-master.index')
            ->with('success', 'Contact details saved successfully');
    }

    public function edit($id)
    {
        $contact = ContactUsMaster::findOrFail($id);
        return view('contactUs-master.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'nullable|string',
            'emails' => 'nullable|array',
            'emails.*' => 'email',
            'phones' => 'nullable|array',
            'phones.*' => 'string',
            'whatsapp_no' => 'nullable|string',
            'map_link' => 'nullable|string',
        ]);

        $contact = ContactUsMaster::findOrFail($id);

        // Handle iframe or plain embed link
        $mapLink = $request->map_link;
        if ($mapLink && str_contains($mapLink, '<iframe')) {
            preg_match('/src="([^"]+)"/', $mapLink, $matches);
            $mapLink = $matches[1] ?? null;
        }

        $contact->update([
            'address' => $request->address,
            'emails' => $request->emails ? array_values(array_filter($request->emails)) : null,
            'phones' => $request->phones ? array_values(array_filter($request->phones)) : null,
            'whatsapp_no' => $request->whatsapp_no,
            'map_link' => $mapLink,
        ]);

        return redirect()->route('contactUs-master.index')
            ->with('success', 'Contact updated successfully');
    }


    public function destroy($id)
    {
        $contact = ContactUsMaster::findOrFail($id);

        $contact->delete();
        return redirect()->route('contactUs-master.index')
            ->with('success', 'Contact Deleted successfully');
    }


    public function submitContactForm(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'message' => 'required|string',
        ]);

        // Save to database
        ContactSubmission::create($request->only('name', 'email', 'website', 'message'));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
