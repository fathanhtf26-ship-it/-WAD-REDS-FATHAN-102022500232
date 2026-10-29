<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $query = DosenModel::query();

        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->where(function ($q) use ($cari) {
                $q->where('nama_dosen', 'like', "%{$cari}%")
                  ->orWhere('nidn', 'like', "%{$cari}%");
            });
        }

        $dosens = $query->orderBy('id', 'asc')->get();

        return view('dosen.modul_dosen', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.tambah_dosen');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nidn' => 'required|string|max:50',
            'jabatan_fungsional' => 'required|string|max:255',
            'kepakaran_riset' => 'required|string|max:255',
        ]);

        DosenModel::create($data);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function show(DosenModel $dosen)
    {
        return view('dosen_show', compact('dosen'));
    }

    public function edit(DosenModel $dosen)
    {
        return view('dosen.edit_dosen', compact('dosen'));
    }

    public function update(Request $request, DosenModel $dosen)
    {
        $data = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nidn' => 'required|string|max:50',
            'jabatan_fungsional' => 'required|string|max:255',
            'kepakaran_riset' => 'required|string|max:255',
        ]);

        $dosen->update($data);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(DosenModel $dosen)
    {
        $dosen->delete();

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}
