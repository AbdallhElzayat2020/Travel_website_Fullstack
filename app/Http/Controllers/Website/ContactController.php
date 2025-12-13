<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $page = Page::getBySlug('contact-us');
        $metaTitle = $page && $page->meta_title ? $page->meta_title : 'Contact Us';

        return view('frontend.pages.contact-us', compact('page', 'metaTitle'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
