<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhyChooseUs;

class WhyChooseUsController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $items = WhyChooseUs::withTrashed()->get(); // Include soft deleted items
        return view('admin.why.index', compact('items'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.why.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('icon')) {
            $fileName = time() . '.' . $request->icon->extension();
            // $request->icon->move(public_path('uploads/why_choose_us'), $fileName);
            $path = $request->file('icon')->store('why_choose_us', 'public');
            $data['icon'] = 'storage/' . $path;
        }

        WhyChooseUs::create($data);
        return redirect()->route('admin.why.index')->with('success', 'Item created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $why = WhyChooseUs::withTrashed()->findOrFail($id);
        return view('admin.why.edit', compact('why'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $item = WhyChooseUs::withTrashed()->findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('icon')) {
            $fileName = time() . '.' . $request->icon->extension();
              $path = $request->file('icon')->store('why_choose_us', 'public');
            $data['icon'] = 'storage/' . $path;
        }

        $item->update($data);
        return redirect()->route('admin.why.index')->with('success', 'Item updated successfully.');
    }

    // Soft delete the specified resource.
    public function destroy($id)
    {
        $item = WhyChooseUs::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.why_choose_us.index')->with('success', 'Item deleted successfully.');
    }

    // Restore a soft-deleted resource.
    public function restore($id)
    {
        $item = WhyChooseUs::withTrashed()->findOrFail($id);
        $item->restore();
        return redirect()->route('admin.why_choose_us.index')->with('success', 'Item restored successfully.');
    }
}
