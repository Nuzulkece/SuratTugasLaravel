<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class STPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai = Pegawai::all();

        return view('pegawai.index')
        ->with('pegawai', $pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pegawai = Pegawai::all();

        return view('pegawai.create')
        ->with('pegawai', $pegawai);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'pegawai'=> 'required',
        ]);

        $pegawai = new Pegawai;
        $pegawai->pegawai = $request->pegawai;

        $pegawai->save();

        return redirect()->route('st_pegawai.index')->withSuccess('Pegawai Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pegawai = Pegawai::find($id);

        return view('pegawai.edit')
        ->with('pegawai', $pegawai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pegawai = Pegawai::find($id);

        $this->validate($request, [
            'pegawai'=> 'required',
        ]);

        $pegawai->pegawai = $request->pegawai;
        $pegawai->save();

        return redirect()->route('st_pegawai.index')->withInfo('Pegawai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $pegawai = Pegawai::find($id);
         $pegawai->delete();

        return redirect()->route('st_pegawai.index')->withDanger('Pegawai Berhasil Dihapus');
    }
}
