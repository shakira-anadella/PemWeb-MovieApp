@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Edit Movie</h2>

        <form action="{{ route('movie.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ $movie->title }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-white">
            </div>

            <!-- Year Field -->
            <div class="mb-4">
                <label for="year" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Year</label>
                <input type="number" id="year" name="year" value="{{ $movie->year }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-white">
            </div>

            <!-- Synopsis Field -->
            <div class="mb-4">
                <label for="synopsis" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Synopsis</label>
                <textarea id="synopsis" name="synopsis" rows="4" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-white">{{ $movie->synopsis }}</textarea>
            </div>

            <!-- Poster Field -->
            <div class="mb-4">
                <label for="poster" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Poster URL</label>
                <input type="url" id="poster" name="poster" value="{{ $movie->poster }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-white">
            </div>

            <!-- Availability Field -->
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Availability</label>
                <select name="available" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-white">
                    <option value="1" {{ $movie->available ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ !$movie->available ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Update Movie
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
