@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Add New Movie</h2>

        <!-- Form Section -->
        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Field -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" id="title" name="title" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Synopsis Field -->
            <div class="mb-4">
                <label for="synopsis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Synopsis</label>
                <textarea id="synopsis" name="synopsis" rows="4" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                @error('synopsis')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Year Field -->
            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Year</label>
                <input type="number" id="year" name="year" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('year')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Genre Field -->
            <div class="mb-4">
                <label for="genre_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Genre</label>
                <select id="genre_id" name="genre_id" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Available Field -->
            <div class="mb-4">
                <label for="available" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Available</label>
                <select id="available" name="available" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                @error('available')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Poster Field -->
            <div class="mb-4">
                <label for="poster" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Poster</label>
                <input type="file" id="poster" name="poster" accept="image/*"
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('poster')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cast Field -->
            <div class="mb-4">
                <label for="casts" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cast</label>
                <select id="casts" name="casts[]" multiple
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($casts as $cast)
                        <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                    @endforeach
                </select>
                @error('casts')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Add Movie
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
