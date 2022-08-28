<?php

namespace Modules\Surat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Surat\Entities\Suratperdin;
use Illuminate\Contracts\Support\Renderable;

class SuratperdinController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('surat::buatsurat.suratperdin.index', [
            'suratperdins' => Suratperdin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('surat::buatsurat.suratperdin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_suratperdin' => 'required',
            'tgl_suratperdin' => 'required',
            'instansi' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
            'dokumen' => '',
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dok_suratperdin');
        }

        Suratperdin::create($validatedData);

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
        $suratperdin = Suratperdin::find($id);
        return view('surat::buatsurat.suratperdin.editarsip', compact('suratperdin'));
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
            'no_suratperdin' => 'required',
            'tgl_suratperdin' => 'required',
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
            $validatedData['dokumen'] = $request->file('dokumen')->store('dok_suratperdin');
        }
        $input = $validatedData;
        Suratperdin::where('id', $id)->update($input);

        return redirect('/surat/suratperdin')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
