@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between px-20 mb-8">
        <h1 class="text-2xl font-semibold text-white">Daftar Pengguna</h1>
        <a href="{{ route('users.create') }}" class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5">
            Add Users
        </a>
    </div>

    <!-- User List Section -->
    <div class="overflow-x-auto px-20">
        <table class="min-w-full bg-gray-900 text-white border border-gray-700 rounded-lg shadow-lg">
            <thead class="bg-blue-800">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-300 font-semibold">Nama</th>
                    <th class="px-6 py-3 text-left text-gray-300 font-semibold">Email</th>
                    <th class="px-6 py-3 text-left text-gray-300 font-semibold">Role</th>
                    <th class="px-6 py-3 text-left text-gray-300 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr class="border-t border-gray-700">
                    <td class="px-6 py-4 text-gray-100">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-gray-400">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $user->role->name }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}" class="text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg px-4 py-2">
                            Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg px-4 py-2" onclick="return confirm('Yakin ingin menghapus pengguna ini?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-400">Tidak ada pengguna ditemukan. Tambahkan pengguna untuk memulai!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
