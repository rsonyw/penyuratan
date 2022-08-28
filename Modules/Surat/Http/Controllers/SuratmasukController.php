<?php

namespace Modules\Surat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Entities\Suratmasuk;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('surat::buatsurat.suratmasuk.index', [
            'suratmasuks' => Suratmasuk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('surat::buatsurat.suratmasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request->file('dokumen')->store('dok_suratmasuk');

        $validatedData = $request->validate([
            'no_suratmasuk' => 'required',
            'tgl_suratmasuk' => 'required',
            'instansi' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
            'dokumen' => '',
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dok_suratmasuk');
        }

        Suratmasuk::create($validatedData);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('surat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $suratmasuk = Suratmasuk::find($id);
        return view('surat::buatsurat.suratmasuk.edit', compact('suratmasuk'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'no_suratmasuk' => 'required',
            'tgl_suratmasuk' => 'required',
            'instansi' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
            'dokumen' => '',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dok_suratmasuk');
        }
        $input = $validatedData;
        Suratmasuk::where('id', $id)->update($input);

        return redirect('/surat/suratmasuk')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $suratmasuk = Suratmasuk::find($id);
        if ($suratmasuk->dokumen) {
            Storage::delete($suratmasuk->dokumen);
        }
        $suratmasuk->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus!');
    }
}
