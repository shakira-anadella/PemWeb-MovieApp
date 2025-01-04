@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between px-20 mb-8">
        <div class="flex items-center py-4 md:py-8 flex-wrap">
            <button type="button"
                class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                All Movie
            </button>
        </div>

        <div class="flex items-center py-4 md:py-8 flex-wrap">
            <a href="{{ route('movie.create') }}"
                class="text-white border border-blue-600 bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                Create Movie
            </a>
        </div>
    </div>

    <!-- Movie List Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-20">
        @forelse ($movies as $movie)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden dark:bg-gray-800">
            <a href="#">
                <img class="w-full h-64 object-cover" src="{{ $movie->poster }}" alt="{{ $movie->title }}">
            </a>
            <div class="p-4">
                <div class="flex justify-between mb-3">
                    <span class="bg-gray-200 text-gray-800 text-xs font-medium px-3 py-1 rounded-full">{{ $movie->year }}</span>
                    <span class="bg-{{ $movie->available ? 'green' : 'red' }}-200 text-{{ $movie->available ? 'green' : 'red' }}-800 text-xs font-medium px-3 py-1 rounded-full">
                        {{ $movie->available ? 'Available' : 'Unavailable' }}
                    </span>
                </div>
                <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $movie->title }}</h5>
                <p class="text-sm text-gray-700 dark:text-gray-400 mb-4">{{ Str::limit($movie->synopsis, 120) }}</p>
                <div class="flex justify-end space-x-2">
                    <a href="{{ route('movie.edit', $movie->id) }}"
                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2">
                        Edit
                    </a>
                    <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2"
                            onclick="return confirm('Are you sure you want to delete this movie?');">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <p class="text-gray-500 text-lg dark:text-gray-400">No movies found. Add some to get started!</p>
            <a href="{{ route('movies.create') }}"
                class="mt-4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Add a Movie
            </a>
        </div>
        @endforelse
    </div>
</section>

<!-- Success Message -->
@if (session('success'))
<div id="alert-3"
    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mx-20" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-3 text-sm font-medium">
      {{ session('success') }}
    </div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
      data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
</div>
@endif
@endsection
