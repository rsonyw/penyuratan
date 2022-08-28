<?php

namespace Modules\Surat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Entities\Suratmasuk;
use Modules\Surat\Entities\Surattgskk;
use Modules\Surat\Entities\Suratedaran;
use Modules\Surat\Entities\Suratkeluar;
use Modules\Surat\Entities\Suratlembur;
use Modules\Surat\Entities\Suratperdin;
use Illuminate\Contracts\Support\Renderable;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $jumlah_sk = Suratkeluar::all()->count();
        $jumlah_sm = Suratmasuk::all()->count();
        $jumlah_se = Suratedaran::all()->count();
        $jumlah_spd = Suratperdin::all()->count();
        $jumlah_stkk = Surattgskk::all()->count();
        $jumlah_spl = Suratlembur::all()->count();
        return view('surat::index')
            ->with('jumlah_sm', $jumlah_sm)
            ->with('jumlah_sk', $jumlah_sk)
            ->with('jumlah_se', $jumlah_se)
            ->with('jumlah_spd', $jumlah_spd)
            ->with('jumlah_stkk', $jumlah_stkk)
            ->with('jumlah_spl', $jumlah_spl);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('surat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
