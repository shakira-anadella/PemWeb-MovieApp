@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between px-20 mb-8">
        <div class="flex items-center py-4 md:py-8 flex-wrap">
            <button type="button"
                class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                All Reviews
            </button>
        </div>

        <div class="flex items-center py-4 md:py-8 flex-wrap">
            <a href="{{ route('review.create') }}"
                class="text-white border border-blue-600 bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                Create Review
            </a>
        </div>
    </div>

    <!-- Review List Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-20">
        @forelse ($reviews as $review)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden dark:bg-gray-800">
            <div class="p-4">
                <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $review->user->name }}</h5>
                <p class="text-sm text-gray-700 dark:text-gray-400 mb-4">{{ $review->review }}</p>
                <span class="text-yellow-500">Rating: {{ $review->rating }}/5</span>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <p class="text-gray-500 text-lg dark:text-gray-400">No reviews found. Add some to get started!</p>
            <a href="{{ route('review.create') }}"
                class="mt-4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Add a Review
            </a>
        </div>
        @endforelse
    </div>
</section>
@endsection
