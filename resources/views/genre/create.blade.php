@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Create Genre</h2>

        <!-- Form Section -->
        <form action="{{ route('genre.store') }}" method="POST">
            @csrf

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Genre Name</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Create Genre
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
