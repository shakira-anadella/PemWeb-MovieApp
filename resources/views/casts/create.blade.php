@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <!-- Form Header -->
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Add New Cast</h2>

        <!-- Form -->
        <form action="{{ route('casts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                    placeholder="Enter name" required>
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Age Field -->
            <div class="mb-6">
                <label for="age" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                    placeholder="Enter age" required>
                @error('age')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Biodata Field -->
            <div class="mb-6">
                <label for="biodata" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Biodata</label>
                <textarea id="biodata" name="biodata" rows="4"
                    class="w-full p-3 border border-gray-300 rounded-lg dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                    placeholder="Write biodata here..." required>{{ old('biodata') }}</textarea>
                @error('biodata')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Avatar Upload -->
            <div class="mb-6">
                <label for="avatar" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Avatar</label>
                <input type="file" id="avatar" name="avatar"
                    class="w-full p-2 border border-gray-300 rounded-lg dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                    required>
                @error('avatar')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2">
                    Save Cast
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
