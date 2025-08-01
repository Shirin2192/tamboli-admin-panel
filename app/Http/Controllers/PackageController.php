<?php

namespace App\Http\Controllers;
use App\Models\PackageCategory;
use App\Models\Package;
use App\Models\Hotel;
use App\Models\IncludeItem;
use App\Models\Itinerary;
use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = PackageCategory::all(); // adjust if your model name is different
        return view('admin.packages.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate basic package info (removed slug from required validation)
        $validated = $request->validate([
            'name' => 'required|string',
            'nights' => 'required|integer',
            'price' => 'required|numeric',
            'rating' => 'nullable|numeric',
            'short_description' => 'required|nullable|string',
            'full_description' => 'required|nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Generate slug from name
        $slug = Str::slug($request->name);

        // Ensure uniqueness
        $count = Package::where('slug', 'like', "$slug%")->count();
        $validated['slug'] = $count ? "{$slug}-{$count}" : $slug;

        // Handle main image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }

        // Create package
        $package = Package::create($validated);

        // Save hotels
        foreach ($request->input('hotels', []) as $hotel) {
            $hotelData = [
                'package_id' => $package->id,
                'city' => $hotel['city'] ?? '',
                'hotel_name' => $hotel['hotel_name'] ?? '',
                'address' => $hotel['address'] ?? '',
                'distance_from_haram' => $hotel['distance_from_haram'] ?? '',
            ];

            if (isset($hotel['image']) && is_file($hotel['image'])) {
                $hotelData['image'] = $hotel['image']->store('hotels', 'public');
            }

            Hotel::create($hotelData);
        }

        // Save includes
        foreach ($request->input('includes', []) as $item) {
            IncludeItem::create([
                'package_id' => $package->id,
                'icon_class' => $item['icon_class'] ?? '',
                'title' => $item['title'] ?? '',
                'description' => $item['description'] ?? '',
            ]);
        }

        // Save itinerary
        foreach ($request->input('itinerary', []) as $day) {
            Itinerary::create([
                'package_id' => $package->id,
                'day_number' => $day['day_number'] ?? 0,
                'title' => $day['title'] ?? '',
                'description' => $day['description'] ?? '',
            ]);
        }

        // Save FAQs
        foreach ($request->input('faqs', []) as $faq) {
            Faq::create([
                'package_id' => $package->id,
                'question' => $faq['question'] ?? '',
                'answer' => $faq['answer'] ?? '',
            ]);
        }

        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'title' => 'required',
            'duration' => 'required',
            'makkah_hotel' => 'required',
            'madinah_hotel' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages', 'public');
        }

        $package->update($data);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return back()->with('success', 'Package soft deleted.');
    }

    public function trashed()
    {
        $packages = Package::onlyTrashed()->paginate(10);
        return view('packages.trashed', compact('packages'));
    }

    public function restore($id)
    {
        $package = Package::onlyTrashed()->findOrFail($id);
        $package->restore();
        return redirect()->route('packages.index')->with('success', 'Package restored.');
    }
}
