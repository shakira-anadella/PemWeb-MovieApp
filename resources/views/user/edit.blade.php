@extends('Layouts.index')

@section('content')
<section class="container mx-auto my-10">
    <h1 class="text-2xl font-semibold mb-5">Edit Pengguna</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm" required>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="role_id" class="block text-sm font-medium">Peran</label>
            <select name="role_id" id="role_id" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="avatar" class="block text-sm font-medium">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm">
        </div>

        <div>
            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-5 py-2.5">Perbarui</button>
        </div>
    </form>
</section>
@endsection