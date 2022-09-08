<?php

namespace Modules\Surat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Surat\Entities\Datapegawai;
use Illuminate\Contracts\Support\Renderable;

class DatapegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('surat::pegawai.index', [
            'datapegawais' => Datapegawai::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('surat::pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_masuk' => '',
            'tanggal_penetapan' => '',
            'nip' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'no_rek' => 'required',
            'saku' => 'required',
            'representatif' => '',
            'ttd' => '',
        ]);

        if ($request->file('ttd')) {
            $validatedData['ttd'] = $request->file('ttd')->store('dok_ttd');
        }

        Datapegawai::create($validatedData);
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
        $datapegawai = Datapegawai::find($id);
        return view('surat::pegawai.edit', compact('datapegawai'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_masuk' => '',
            'tanggal_penetapan' => '',
            'nip' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'no_rek' => 'required',
            'saku' => 'required',
            'representatif' => '',
            'ttd' => '',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('ttd')) {
            if ($request->oldttd) {
                Storage::delete($request->oldttd);
            }
            $validatedData['ttd'] = $request->file('ttd')->store('dok_ttd');
        }
        $input = $validatedData;
        Datapegawai::where('id', $id)->update($input);
        return redirect('/surat/datapegawai')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $datapegawai = Datapegawai::find($id);
        if ($datapegawai->dokumen) {
            Storage::delete($datapegawai->dokumen);
        }
        $datapegawai->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus!');
    }
}
