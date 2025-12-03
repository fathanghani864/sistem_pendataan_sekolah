<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold">Nama Admin</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full p-2 border rounded">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="font-semibold">Password (opsional)</label>
                    <input type="password" name="password" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="font-semibold">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
                </div>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan Perubahan</button>

        </form>

    </div>

</x-app-layout>
