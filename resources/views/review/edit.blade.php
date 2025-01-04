@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <!-- Edit Review Form -->
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Edit Review</h2>

        <!-- Form -->
        <form action="{{ route('review.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Review Text -->
            <div class="mb-6">
                <label for="review" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Review</label>
                <textarea id="review" name="review" rows="4" class="w-full p-3 border border-gray-300 rounded-lg dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                    placeholder="Write your review here...">{{ old('review', $review->review) }}</textarea>
                @error('review')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Rating -->
            <div class="mb-6">
                <label for="rating" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Rating</label>
                <input type="number" id="rating" name="rating" min="1" max="5" value="{{ old('rating', $review->rating) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                @error('rating')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2">
                    Update Review
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
