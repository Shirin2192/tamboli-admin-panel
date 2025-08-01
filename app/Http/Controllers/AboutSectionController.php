<?php

// app/Http/Controllers/AboutSectionController.php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // apply auth middleware to all routes
    }

    public function index()
    {
        $about = AboutSection::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        $about = AboutSection::firstOrFail();
        return view('admin.about.edit', compact('about'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'main_title' => 'required|string',
            'description' => 'required|string',
            'experience_years' => 'required|integer',
            'destinations' => 'required|integer',
            'pilgrims_served' => 'required|integer',
            'bottom_description' => 'required|string',
            'video_url' => 'nullable|url',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('about', 'public');
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('about', 'public');
        }

        AboutSection::create($data);
        return redirect()->route('about.index')->with('success', 'About section created successfully.');
    }

    public function edit()
    {
        $about = AboutSection::firstOrFail();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutSection::firstOrFail();

        $data = $request->validate([
            'main_title' => 'required|string',
            'description' => 'required|string',
            'experience_years' => 'required|integer',
            'destinations' => 'required|integer',
            'pilgrims_served' => 'required|integer',
            'bottom_description' => 'required|string',
            'video_url' => 'nullable|url',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('about', 'public');
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('about', 'public');
        }

        $about->update($data);

        return redirect()->route('about.index')->with('success', 'About section updated successfully.');
    }

    public function destroy($id)
    {
        $about = AboutSection::findOrFail($id);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'Deleted successfully.');
    }

    public function restore()
    {
        $about = AboutSection::withTrashed()->first();
        if ($about) {
            $about->restore();
            return redirect()->back()->with('success', 'About section restored.');
        }
        return redirect()->back()->with('error', 'No deleted section found.');
    }
}
