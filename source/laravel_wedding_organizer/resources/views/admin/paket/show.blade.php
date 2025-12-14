@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('admin.paket.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Paket
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Detail Paket</h1>
            <p class="mt-2 text-gray-600">Informasi lengkap paket.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 md:p-8">
                <div class="flex items-start gap-6">
                    @if($paket->foto)
                        <img src="{{ $paket->foto_url }}" alt="Foto Paket" class="h-32 w-32 rounded-lg object-cover">
                    @endif
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900">{{ $paket->nama_paket }}</h2>
                        <p class="mt-2 text-gray-700">{{ $paket->deskripsi }}</p>
                        <p class="mt-4 text-lg font-semibold text-indigo-600">Harga: {{ $paket->formatted_harga }}</p>
                    </div>
                </div>

                <div class="mt-8 border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600">Total Pemesanan</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $paket->pemesanans_count ?? $paket->pemesanans()->count() }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600">Dibuat</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $paket->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600">Terakhir Diperbarui</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $paket->updated_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="{{ route('admin.paket.edit', $paket) }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">Edit Paket</a>
                    <form action="{{ route('admin.paket.destroy', $paket) }}" method="POST" onsubmit="return confirm('Hapus paket ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Hapus Paket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
