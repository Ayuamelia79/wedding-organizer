<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengantin - Wedding Organizer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-rose-50 via-pink-50 to-fuchsia-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg border-b-4 border-pink-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-rose-400 to-pink-600 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-rose-500 to-pink-600 bg-clip-text text-transparent">Wedding Organizer</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex items-center space-x-2 bg-pink-50 px-4 py-2 rounded-full">
                        <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('pengantin.logout') }}">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200 shadow-md hover:shadow-lg">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-rose-400 via-pink-500 to-fuchsia-500 rounded-2xl shadow-2xl p-8 mb-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Selamat Datang! 🎉</h2>
                    <p class="text-lg opacity-90">Hai <span class="font-semibold">{{ auth()->user()->name }}</span>, mulai rencanakan pernikahan impian Anda bersama kami.</p>
                </div>
                <div class="hidden md:block">
                    <svg class="w-32 h-32 opacity-30" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-pink-400">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-pink-100 rounded-lg p-3">
                        <svg class="h-8 w-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500 font-medium">Paket Tersedia</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Paket::count() }}</p>
                        <div class="mt-3">
                            <a href="{{ route('pengantin.paket.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg text-sm font-semibold hover:from-purple-700 hover:to-pink-700 transition">
                                Lihat Paket
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-purple-400">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-100 rounded-lg p-3">
                        <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500 font-medium">Pemesanan Saya</p>
                        <p class="text-2xl font-bold text-gray-900">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-purple-400">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-rose-100 rounded-lg p-3">
                        <svg class="h-8 w-8 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500 font-medium">Event Mendatang</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Pemesanan::where('user_id', auth()->id())->count() }}</p>
                        <div class="mt-3 flex gap-2">
                            <a href="{{ route('pengantin.pemesanan.index') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg text-sm font-semibold hover:bg-purple-700 transition">Lihat Pemesanan</a>
                            <a href="{{ route('pengantin.pemesanan.create') }}" class="inline-flex items-center px-4 py-2 bg-pink-600 text-white rounded-lg text-sm font-semibold hover:bg-pink-700 transition">Buat Pemesanan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Actions -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Aksi Cepat
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="#" class="group bg-gradient-to-br from-pink-50 to-rose-50 hover:from-pink-100 hover:to-rose-100 p-6 rounded-xl border-2 border-pink-200 hover:border-pink-300 transition duration-200">
                            <div class="flex items-center">
                                <div class="bg-pink-500 group-hover:bg-pink-600 rounded-lg p-3 transition duration-200">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-gray-800">Lihat Paket</p>
                                    <p class="text-sm text-gray-600">Pilih paket pernikahan</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="group bg-gradient-to-br from-purple-50 to-fuchsia-50 hover:from-purple-100 hover:to-fuchsia-100 p-6 rounded-xl border-2 border-purple-200 hover:border-purple-300 transition duration-200">
                            <div class="flex items-center">
                                <div class="bg-purple-500 group-hover:bg-purple-600 rounded-lg p-3 transition duration-200">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-gray-800">Pemesanan Saya</p>
                                    <p class="text-sm text-gray-600">Lihat status pemesanan</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="group bg-gradient-to-br from-rose-50 to-pink-50 hover:from-rose-100 hover:to-pink-100 p-6 rounded-xl border-2 border-rose-200 hover:border-rose-300 transition duration-200">
                            <div class="flex items-center">
                                <div class="bg-rose-500 group-hover:bg-rose-600 rounded-lg p-3 transition duration-200">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-gray-800">Pembayaran</p>
                                    <p class="text-sm text-gray-600">Kelola pembayaran</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="group bg-gradient-to-br from-indigo-50 to-blue-50 hover:from-indigo-100 hover:to-blue-100 p-6 rounded-xl border-2 border-indigo-200 hover:border-indigo-300 transition duration-200">
                            <div class="flex items-center">
                                <div class="bg-indigo-500 group-hover:bg-indigo-600 rounded-lg p-3 transition duration-200">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-gray-800">Profil Saya</p>
                                    <p class="text-sm text-gray-600">Edit profil akun</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Aktivitas Terbaru
                    </h3>
                    <div class="text-center py-8">
                        <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-gray-500">Belum ada aktivitas.</p>
                        <p class="text-sm text-gray-400 mt-2">Mulai dengan melihat paket yang tersedia!</p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Info -->
            <div class="space-y-6">
                <!-- Profile Card -->
                <div class="bg-gradient-to-br from-pink-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full mb-4">
                            <svg class="w-10 h-10 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-1">{{ auth()->user()->name }}</h3>
                        <p class="text-sm opacity-90 mb-4">{{ auth()->user()->email }}</p>
                        <a href="#" class="inline-block bg-white text-pink-600 font-semibold px-4 py-2 rounded-lg hover:bg-pink-50 transition duration-200">
                            Edit Profil
                        </a>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Tips Pernikahan
                    </h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-pink-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Rencanakan 6-12 bulan sebelumnya</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-pink-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Tentukan budget sejak awal</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-pink-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Pilih vendor terpercaya</span>
                        </li>
                    </ul>
                </div>

                <!-- Help Card -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl shadow-lg p-6 border-2 border-blue-200">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">Butuh Bantuan?</h3>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Tim kami siap membantu Anda merencanakan pernikahan impian.</p>
                    <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition duration-200">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
