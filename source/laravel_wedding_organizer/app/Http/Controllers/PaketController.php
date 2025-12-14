<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::withCount('pemesanans')->latest()->get();
        
        // Admin dan Pengantin melihat view yang berbeda
        if (Auth::user()->role === 'admin') {
            return view('admin.paket.index', compact('pakets'));
        } else {
            return view('pengantin.paket.index', compact('pakets'));
        }
    }

    public function create()
    {
        // Hanya admin yang bisa create
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk membuat paket.');
        }

        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        // Hanya admin yang bisa store
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk membuat paket.');
        }

        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('paket', 'public');
        }

        Paket::create($data);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function show(Paket $paket)
    {
        $paket->loadCount('pemesanans');
        
        if (Auth::user()->role === 'admin') {
            return view('admin.paket.show', compact('paket'));
        } else {
            return view('pengantin.paket.show', compact('paket'));
        }
    }

    public function edit(Paket $paket)
    {
        // Hanya admin yang bisa edit
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengedit paket.');
        }

        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        // Hanya admin yang bisa update
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate paket.');
        }

        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($paket->foto) {
                Storage::disk('public')->delete($paket->foto);
            }
            $data['foto'] = $request->file('foto')->store('paket', 'public');
        }

        $paket->update($data);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy(Paket $paket)
    {
        // Hanya admin yang bisa delete
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk menghapus paket.');
        }

        // Hapus foto jika ada
        if ($paket->foto) {
            Storage::disk('public')->delete($paket->foto);
        }

        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus!');
    }
}
