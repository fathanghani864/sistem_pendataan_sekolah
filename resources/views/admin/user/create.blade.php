<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah User
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        <form action="{{ route('user.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Nama Admin</label>
                <input type="text" name="name" class="w-full p-2 border rounded"
                       value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="font-semibold">Password</label>
                    <input type="password" name="password" class="w-full p-2 border rounded">
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="font-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
                </div>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                + Tambah Data
            </button>

        </form>

    </div>

</x-app-layout>
