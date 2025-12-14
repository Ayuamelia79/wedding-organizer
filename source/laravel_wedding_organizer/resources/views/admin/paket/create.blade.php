@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('admin.paket.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Paket
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Tambah Paket Baru</h1>
            <p class="mt-2 text-gray-600">Lengkapi detail paket wedding organizer.</p>
        </div>

        <!-- Error Alert -->
        @if ($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan:</h3>
                    <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_paket" class="block text-sm font-medium text-gray-700 mb-2">Nama Paket <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_paket" id="nama_paket" value="{{ old('nama_paket') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="harga" id="harga" value="{{ old('harga') }}" min="0" step="1" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mt-6">
                    <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Foto (opsional)</label>
                    <input type="file" name="foto" id="foto" accept="image/*" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    <p class="mt-2 text-xs text-gray-500">Format: jpeg, png, gif. Maksimal 2MB.</p>
                </div>

                <div class="flex gap-4 pt-6 border-t border-gray-200 mt-8">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all shadow-lg">
                        Simpan Paket
                    </button>
                    <a href="{{ route('admin.paket.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-all">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
