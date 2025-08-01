<?php

namespace App\Http\Controllers;

use App\Models\PackageCategory;
use Illuminate\Http\Request;

class PackageCategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = PackageCategory::orderBy('id', 'desc')->get();
        return view('admin.package_categories.index', compact('categories'));
    }


    // Show create form
    public function create()
    {
        return view('admin.package_categories.create');
    }

    // Store category
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        PackageCategory::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('package-categories.index')->with('success', 'Category created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $category = PackageCategory::findOrFail($id);
        return view('admin.package_categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = PackageCategory::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('package-categories.index')->with('success', 'Category updated successfully.');
    }

    // Soft delete category
    public function destroy($id)
    {
        $category = PackageCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('package-categories.index')->with('success', 'Category deleted (soft) successfully.');
    }

    // Show soft-deleted categories
    public function trashed()
    {
        $categories = PackageCategory::onlyTrashed()->get();
        return view('admin.package_categories.trashed', compact('categories'));
    }

    // Restore soft-deleted category
    public function restore($id)
    {
        $category = PackageCategory::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('package-categories.index')->with('success', 'Category restored successfully.');
    }

    // Permanently delete
    public function forceDelete($id)
    {
        $category = PackageCategory::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        return redirect()->route('package-categories.trashed')->with('success', 'Category permanently deleted.');
    }
}
