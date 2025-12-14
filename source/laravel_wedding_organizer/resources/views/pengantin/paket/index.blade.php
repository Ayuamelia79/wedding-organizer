@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-pink-50 to-purple-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Paket Tersedia</h1>
                <p class="mt-2 text-gray-600">Pilih paket yang sesuai lalu buat pemesanan.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($pakets as $paket)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($paket->foto)
                    <img src="{{ $paket->foto_url }}" alt="{{ $paket->nama_paket }}" class="h-40 w-full object-cover">
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900">{{ $paket->nama_paket }}</h3>
                    <p class="mt-2 text-gray-600 line-clamp-3">{{ $paket->deskripsi }}</p>
                    <p class="mt-4 text-lg font-semibold text-purple-600">{{ $paket->formatted_harga }}</p>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('pengantin.paket.show', $paket) }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">Detail</a>
                        <a href="{{ route('pengantin.pemesanan.create', ['paket_id' => $paket->id]) }}" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg hover:from-purple-700 hover:to-pink-700 transition">Pesan Paket</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3">
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <h3 class="text-lg font-medium text-gray-900">Belum ada paket tersedia</h3>
                    <p class="mt-2 text-gray-600">Silakan kembali lagi nanti.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
