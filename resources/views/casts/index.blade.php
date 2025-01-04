@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between px-20 mb-8">
        <div class="flex items-center py-4 md:py-8 flex-wrap">
            <button type="button"
                class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                All Casts
            </button>
        </div>

        <div class="flex items-center py-4 md:py-8 flex-wrap">
            <a href="{{ route('casts.create') }}"
                class="text-white border border-blue-600 bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                Create Casts
            </a>
        </div>
    </div>

    <!-- Cast List Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-20">
        @foreach ($casts as $cast)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden dark:bg-gray-800">
            <div class="p-4">
                <img src="{{ asset('storage/' . $cast->avatar) }}" alt="{{ $cast->name }}" class="w-full h-64 object-cover mb-4">
                <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $cast->name }}</h5>
                <p class="text-sm text-gray-700 dark:text-gray-400 mb-4">{{ $cast->biodata }}</p>
                <span class="text-gray-600">Age: {{ $cast->age }}</span>
                <div class="flex justify-end mt-4 space-x-2">
                    <a href="{{ route('casts.edit', $cast->id) }}"
                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2">
                        Edit
                    </a>
                    <form action="{{ route('casts.destroy', $cast->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2"
                            onclick="return confirm('Are you sure you want to delete this cast?');">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- No Casts Found -->
    @if ($casts->isEmpty())
    <div class="col-span-full text-center py-16">
        <p class="text-gray-500 text-lg dark:text-gray-400">No casts found. Add some to get started!</p>
        <a href="{{ route('casts.create') }}"
            class="mt-4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Add a Cast
        </a>
    </div>
    @endif
</section>
@endsection
