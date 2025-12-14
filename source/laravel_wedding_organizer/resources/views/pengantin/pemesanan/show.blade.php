@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-pink-50 to-purple-50 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('pengantin.pemesanan.index') }}" class="inline-flex items-center text-purple-600 hover:text-purple-700 mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Detail Pemesanan #{{ $pemesanan->id }}</h1>
            <p class="mt-2 text-gray-600">Rincian lengkap pemesanan paket yang Anda pilih.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Informasi Paket -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">{{ $pemesanan->paket->nama_paket }}</h2>
                        <p class="mt-1 text-sm text-gray-600">Harga: <span class="font-bold text-purple-600">{{ $pemesanan->paket->formatted_harga }}</span></p>
                    </div>
                    <span class="px-4 py-2 rounded-full text-sm font-semibold 
                        @class([
                            'bg-yellow-100 text-yellow-800' => $pemesanan->status === 'pending',
                            'bg-green-100 text-green-800' => $pemesanan->status === 'confirmed',
                            'bg-red-100 text-red-800' => $pemesanan->status === 'cancelled',
                            'bg-blue-100 text-blue-800' => $pemesanan->status === 'completed',
                            'bg-gray-100 text-gray-800' => !in_array($pemesanan->status, ['pending','confirmed','cancelled','completed'])
                        ])">
                        Status: {{ $pemesanan->getStatusLabel() }}
                    </span>
                </div>

                <div class="space-y-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Tanggal Acara</p>
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($pemesanan->tanggal_acara)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Lokasi Acara</p>
                        <p class="text-sm text-gray-600">{{ $pemesanan->lokasi_acara }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Jumlah Tamu</p>
                        <p class="text-sm text-gray-600">{{ $pemesanan->jumlah_tamu }} orang</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Catatan</p>
                        <p class="text-sm text-gray-600">{{ $pemesanan->catatan ?? '-' }}</p>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    @if($pemesanan->isPending())
                    <form action="{{ route('pengantin.pemesanan.destroy', $pemesanan) }}" method="POST" onsubmit="return confirm('Batalkan pemesanan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Batalkan Pemesanan
                        </button>
                    </form>
                    @endif

                    <a href="https://wa.me/6281234567890?text=Halo Admin, saya ingin bertanya tentang pemesanan #{{ $pemesanan->id }}" 
                       target="_blank" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Hubungi Admin via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Info Pemesan -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pemesan</h3>
                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex justify-between">
                        <span>Nama</span>
                        <span class="font-medium">{{ $pemesanan->nama_pemesan }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Email</span>
                        <span class="font-medium">{{ $pemesanan->user->email ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>No. HP</span>
                        <span class="font-medium">{{ $pemesanan->nomor_hp }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Dibuat</span>
                        <span class="font-medium">{{ $pemesanan->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>

                <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <p class="text-sm text-blue-700">
                        <strong>Catatan:</strong> Tim kami akan menghubungi Anda untuk konfirmasi lebih lanjut. Simpan nomor WhatsApp aktif.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
