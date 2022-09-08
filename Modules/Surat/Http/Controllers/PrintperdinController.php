<?php

namespace Modules\Surat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Entities\Datapegawai;
use Modules\Surat\Entities\Suratperdin;
use Illuminate\Contracts\Support\Renderable;

class PrintperdinController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('surat::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('surat::buatsurat.suratperdin.create', [
            'datapegawais' => Datapegawai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_suratperdin' => 'required',
            'no_suratperdin' => 'required',
            'dasar' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'pengikut1' => '',
            'pengikut2' => '',
            'pengikut3' => '',
            'pengikut4' => '',
            'pengikut5' => '',
            'untuk' => 'required',
            'waktu' => 'required',
            'pengesahan' => 'required',
            'dokumen' => '',
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dok_suratperdin');
        }

        Suratperdin::create($validatedData);

        return redirect('/surat/suratperdin')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('surat::buatsurat.suratperdin.print', [
            'suratperdin' => Suratperdin::select()->where('id', $id)->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('surat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
