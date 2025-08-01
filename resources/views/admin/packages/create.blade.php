@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Create New Package</h2>

    <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Basic Info -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <strong>Basic Package Information</strong>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Package Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter package name" >
                         @error('name')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Package Category</label>
                        <select name="category_id" class="form-control" >
                            <option value="" disabled selected>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                         @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="example-slug" >
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Nights</label>
                        <input type="number" name="nights" class="form-control" >
                        @error('nights')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Price (INR)</label>
                        <input type="text" name="price" class="form-control" >
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Rating</label>
                        <input type="number" name="rating" class="form-control" step="0.1" placeholder="Optional">
                        @error('rating')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="3"></textarea>
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Full Description</label>
                        <textarea name="full_description" class="form-control" rows="3"></textarea>
                        @error('full_description')
                            <small class="text-danger">{{ $message }}</small>
                         @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Main Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hotel Info -->
        <div class="card mb-4 shadow-sm">          
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <strong>Hotel Details</strong>
                <button type="button" class="btn btn-sm btn-light" id="add-hotel">
                    <i class="bi bi-plus-circle"></i> Add More
                </button>
            </div>
            <div class="card-body" id="hotel-section">
                <div class="row g-3 hotel-group border p-3 rounded">
                    <div class="col-md-4">
                        <input type="text" name="hotels[0][city]" class="form-control" placeholder="City">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="hotels[0][hotel_name]" class="form-control" placeholder="Hotel Name">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="hotels[0][address]" class="form-control" placeholder="Address">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="hotels[0][distance_from_haram]" class="form-control" placeholder="Distance from Haram">
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="hotels[0][image]" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Includes -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <strong>What's Included</strong>
                <button type="button" class="btn btn-sm btn-light" id="add-include">
                    <i class="bi bi-plus-circle"></i> Add More
                </button>
            </div>
            <div class="card-body" id="include-section">
                <div class="row g-3 include-group border p-3 rounded">
                    <div class="col-md-4">
                        <input type="text" name="includes[0][icon_class]" class="form-control" placeholder="Icon Class (e.g., fa fa-check)">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="includes[0][title]" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="includes[0][description]" class="form-control" placeholder="Description">
                    </div>
                </div>
            </div>
        </div>

        <!-- Itinerary -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <strong>Itinerary Plan</strong>
                <button type="button" class="btn btn-sm btn-light" id="add-itinerary">
                    <i class="bi bi-plus-circle"></i> Add More
                </button>
            </div>
            <div class="card-body" id="itinerary-section">
                <div class="row g-3 itinerary-group border p-3 rounded">
                    <div class="col-md-2">
                        <input type="number" name="itinerary[0][day_number]" class="form-control" placeholder="Day #">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="itinerary[0][title]" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-md-6">
                        <textarea name="itinerary[0][description]" class="form-control" rows="2" placeholder="Description"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQs -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <strong>Frequently Asked Questions</strong>
                <button type="button" class="btn btn-sm btn-light" id="add-faq">
                    <i class="bi bi-plus-circle"></i> Add More
                </button>
            </div>
            <div class="card-body" id="faq-section">
                <div class="row g-3 faq-group border p-3 rounded">
                    <div class="col-md-6">
                        <input type="text" name="faqs[0][question]" class="form-control" placeholder="Question">
                    </div>
                    <div class="col-md-6">
                        <textarea name="faqs[0][answer]" class="form-control" rows="2" placeholder="Answer"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary px-5">
                <i class="bi bi-save"></i> Save Package
            </button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
let hotelIndex = 1, includeIndex = 1, itineraryIndex = 1, faqIndex = 1;

// Remove group functionality
document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('remove-group')) {
        e.target.closest('.row').remove();
    }
});

// Reusable Remove Button
function createRemoveBtn() {
    return `<div class="col-12 text-end">
        <button type="button" class="btn btn-danger btn-sm remove-group">Remove</button>
    </div>`;
}

// Hotel Add More
function hotelGroupHTML(i) {
    return `<div class="row g-3 hotel-group border p-3 rounded mb-3">
        <div class="col-md-4">
            <input type="text" name="hotels[${i}][city]" class="form-control" placeholder="City">
        </div>
        <div class="col-md-4">
            <input type="text" name="hotels[${i}][hotel_name]" class="form-control" placeholder="Hotel Name">
        </div>
        <div class="col-md-4">
            <input type="text" name="hotels[${i}][address]" class="form-control" placeholder="Address">
        </div>
        <div class="col-md-6">
            <input type="text" name="hotels[${i}][distance_from_haram]" class="form-control" placeholder="Distance from Haram">
        </div>
        <div class="col-md-6">
            <input type="file" name="hotels[${i}][image]" class="form-control">
        </div>
        ${createRemoveBtn()}
    </div>`;
}

// Includes Add More
function includeGroupHTML(i) {
    return `<div class="row g-3 include-group border p-3 rounded mb-3">
        <div class="col-md-4">
            <input type="text" name="includes[${i}][icon_class]" class="form-control" placeholder="Icon Class (e.g., fa fa-check)">
        </div>
        <div class="col-md-4">
            <input type="text" name="includes[${i}][title]" class="form-control" placeholder="Title">
        </div>
        <div class="col-md-4">
            <input type="text" name="includes[${i}][description]" class="form-control" placeholder="Description">
        </div>
        ${createRemoveBtn()}
    </div>`;
}

// Itinerary Add More
function itineraryGroupHTML(i) {
    return `<div class="row g-3 itinerary-group border p-3 rounded mb-3">
        <div class="col-md-2">
            <input type="number" name="itinerary[${i}][day_number]" class="form-control" placeholder="Day #">
        </div>
        <div class="col-md-4">
            <input type="text" name="itinerary[${i}][title]" class="form-control" placeholder="Title">
        </div>
        <div class="col-md-6">
            <textarea name="itinerary[${i}][description]" class="form-control" rows="2" placeholder="Description"></textarea>
        </div>
        ${createRemoveBtn()}
    </div>`;
}

// FAQ Add More
function faqGroupHTML(i) {
    return `<div class="row g-3 faq-group border p-3 rounded mb-3">
        <div class="col-md-6">
            <input type="text" name="faqs[${i}][question]" class="form-control" placeholder="Question">
        </div>
        <div class="col-md-6">
            <textarea name="faqs[${i}][answer]" class="form-control" rows="2" placeholder="Answer"></textarea>
        </div>
        ${createRemoveBtn()}
    </div>`;
}

// Add Event Listeners
document.getElementById('add-hotel').addEventListener('click', function () {
    document.getElementById('hotel-section').insertAdjacentHTML('beforeend', hotelGroupHTML(hotelIndex++));
});
document.getElementById('add-include').addEventListener('click', function () {
    document.getElementById('include-section').insertAdjacentHTML('beforeend', includeGroupHTML(includeIndex++));
});
document.getElementById('add-itinerary').addEventListener('click', function () {
    document.getElementById('itinerary-section').insertAdjacentHTML('beforeend', itineraryGroupHTML(itineraryIndex++));
});
document.getElementById('add-faq').addEventListener('click', function () {
    document.getElementById('faq-section').insertAdjacentHTML('beforeend', faqGroupHTML(faqIndex++));
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function slugify(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/&/g, '-and-')
                .replace(/[\s\W-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function () {
                slugInput.value = slugify(this.value);
            });
        }
    });
</script>



@endpush
