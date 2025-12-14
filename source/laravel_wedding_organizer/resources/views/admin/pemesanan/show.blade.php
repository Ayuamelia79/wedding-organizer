@extends('layouts.app')

@section('title', 'Detail Pemesanan')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Pemesanan</h1>
            <p class="text-sm text-gray-600">#{{ $pemesanan->id }} • Dibuat {{ $pemesanan->created_at->format('d M Y H:i') }}</p>
        </div>
        <a href="{{ route('admin.pemesanan.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-200">Kembali</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pemesan</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Nama Pemesan</p>
                        <p class="text-base font-medium text-gray-900">{{ $pemesanan->nama_pemesan }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nomor HP</p>
                        <p class="text-base font-medium text-gray-900">{{ $pemesanan->nomor_hp }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">User</p>
                        <p class="text-base font-medium text-gray-900">{{ optional($pemesanan->user)->name }} (ID: {{ $pemesanan->user_id }})</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Acara</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Acara</p>
                        <p class="text-base font-medium text-gray-900">{{ \Illuminate\Support\Carbon::parse($pemesanan->tanggal_acara)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Lokasi Acara</p>
                        <p class="text-base font-medium text-gray-900">{{ $pemesanan->lokasi_acara }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jumlah Tamu</p>
                        <p class="text-base font-medium text-gray-900">{{ number_format($pemesanan->jumlah_tamu) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Catatan</p>
                        <p class="text-base font-medium text-gray-900">{{ $pemesanan->catatan ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Paket</h2>
                @if($pemesanan->paket)
                <div class="flex items-start gap-4">
                    @if($pemesanan->paket->foto_url)
                        <img src="{{ $pemesanan->paket->foto_url }}" alt="Foto Paket" class="w-24 h-24 object-cover rounded-lg border" />
                    @endif
                    <div>
                        <p class="text-base font-semibold text-gray-900">{{ $pemesanan->paket->nama }}</p>
                        <p class="text-sm text-gray-600">Harga: {{ $pemesanan->paket->formatted_harga }}</p>
                        <p class="text-sm text-gray-600 mt-1">Deskripsi: {{ $pemesanan->paket->deskripsi }}</p>
                    </div>
                </div>
                @else
                    <p class="text-sm text-gray-600">Paket tidak ditemukan.</p>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Status Pemesanan</h2>
                <div class="flex items-center gap-2 mb-4">
                    @php
                        $status = $pemesanan->status;
                        $badge = match($status) {
                            'pending' => 'bg-yellow-100 text-yellow-800',
                            'confirmed' => 'bg-green-100 text-green-800',
                            'cancelled' => 'bg-red-100 text-red-800',
                            'completed' => 'bg-blue-100 text-blue-800',
                            default => 'bg-gray-100 text-gray-800'
                        };
                    @endphp
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $badge }}">{{ strtoupper($status) }}</span>
                </div>
                @if(method_exists($pemesanan, 'statusOptions'))
                <form method="POST" action="{{ route('admin.pemesanan.update', $pemesanan) }}" class="space-y-3">
                    @csrf
                    @method('PUT')
                    <label class="block text-sm font-medium text-gray-700">Ubah Status</label>
                    <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        @foreach($pemesanan->statusOptions() as $value => $label)
                            <option value="{{ $value }}" @selected($pemesanan->status === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-pink-600 text-white rounded-lg text-sm font-semibold hover:bg-pink-700">Simpan</button>
                </form>
                @endif
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Aksi</h2>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('admin.pemesanan.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-200">Kembali ke daftar</a>
                    <form method="POST" action="{{ route('admin.pemesanan.destroy', $pemesanan) }}" onsubmit="return confirm('Hapus pemesanan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-semibold hover:bg-red-700">Hapus Pemesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
