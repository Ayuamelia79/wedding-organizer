@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-pink-50 to-purple-50 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('pengantin.paket.index') }}" class="inline-flex items-center text-purple-600 hover:text-purple-700 mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
            <h1 class="text-3xl font-bold text-gray-900">{{ $paket->nama_paket }}</h1>
            <p class="mt-2 text-gray-600">Detail paket dan langkah pemesanan.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 md:p-8">
                <div class="flex flex-col md:flex-row gap-6">
                    @if($paket->foto)
                        <img src="{{ $paket->foto_url }}" alt="Foto Paket" class="h-48 w-48 rounded-lg object-cover">
                    @endif
                    <div class="flex-1">
                        <p class="text-gray-700">{{ $paket->deskripsi }}</p>
                        <p class="mt-4 text-xl font-semibold text-purple-600">Harga: {{ $paket->formatted_harga }}</p>

                        <div class="mt-6 flex gap-3">
                            <a href="{{ route('pengantin.pemesanan.create', ['paket_id' => $paket->id]) }}" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all shadow-lg">
                                Pesan Paket Ini
                            </a>
                            <a href="{{ route('pengantin.paket.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition-all">
                                Lihat Paket Lain
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Tambahan</h3>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        <li>Tim kami akan menghubungi Anda setelah pemesanan untuk konfirmasi detail.</li>
                        <li>Pastikan tanggal acara tersedia. Jika tidak, kami akan menawarkan jadwal alternatif.</li>
                        <li>Harga dapat berubah sesuai kebutuhan khusus di lapangan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
