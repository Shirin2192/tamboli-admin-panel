<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $banners = Banner::orderBy('id', 'desc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create() {
        return view('admin.banners.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'place' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:100',
            'button_link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('banners', 'public');
        }

        Banner::create($validatedData);
        return redirect()->route('banners.index')->with('success', 'Banner added successfully.');
    }
    public function edit(Banner $banner) {
        return view('admin.banners.edit', compact('banner'));
    }
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'place' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:100',
            'button_link' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($validatedData);

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
    }
    public function destroy(Banner $banner) {
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted.');
    }
}
