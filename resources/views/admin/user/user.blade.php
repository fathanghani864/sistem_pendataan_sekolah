<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-800 leading-tight">
            User / Admin
        </h2>
    </x-slot>

    <div class="py-4 md:py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- FLASH SUCCESS --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- SEARCH + BUTTON TAMBAH --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">

                <form method="GET" action="{{ route('user.index') }}" class="w-full sm:w-auto flex gap-2">
                    <div class="relative w-full sm:w-72">
                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            class="w-full px-3 py-2 pl-9 border rounded-lg text-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Cari data..."
                        >
                        <span class="absolute inset-y-0 left-2 flex items-center text-gray-400 text-xs">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </form>

            <a href="{{ route('user.create') }}"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm text-center w-full sm:w-auto">
                    + Tambah Data
                </a>
            </div>

            {{-- CARD UTAMA --}}
            <div class="bg-white shadow rounded-lg p-4 md:p-6">

                {{-- DESKTOP / TABLET: TABLE --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full border text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3 border text-left">No</th>
                                <th class="p-3 border text-left">Nama</th>
                                <th class="p-3 border text-left">Email</th>
                                <th class="p-3 border text-left">Password (Terenkripsi)</th>
                                <th class="p-3 border text-left">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-b">
                                    <td class="p-3 border">{{ $loop->iteration }}</td>
                                    <td class="p-3 border">{{ $user->name }}</td>
                                    <td class="p-3 border">{{ $user->email }}</td>
                                    <td class="p-3 border">
                                        {{ substr($user->password, 0, 25) }}...
                                    </td>
                                    <td class="p-3 border">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="{{ route('user.edit', $user->id) }}" 
                                                class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs">
                                                Edit
                                            </a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                {{-- MOBILE: CARD PER USER --}}
                <div class="md:hidden space-y-3 mt-2">
                    @forelse($users as $user)
                        <div class="border border-gray-200 rounded-lg p-3 shadow-sm">

                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs text-gray-400">#{{ $loop->iteration }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-600">
                                    User
                                </span>
                            </div>

                            <div class="font-semibold text-gray-900 text-sm">
                                {{ $user->name }}
                            </div>

                            <div class="text-xs text-gray-600 mt-1">
                                <span class="font-semibold">Email:</span>
                                {{ $user->email }}
                            </div>

                            <div class="text-xs text-gray-600 mt-1">
                                <span class="font-semibold">Password (hash):</span>
                                {{ substr($user->password, 0, 25) }}...
                            </div>

                            <div class="mt-3 flex flex-wrap gap-2">
                                <a href="{{ route('user.edit', $user->id) }}" 
                                    class="flex-1 min-w-[80px] text-center px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs">
                                    Edit
                                </a>

                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus?')"
                                    class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="w-full text-center px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs">
                                        Delete
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <p class="text-center text-gray-500 text-sm py-4">
                            Tidak ada data user.
                        </p>
                    @endforelse
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
