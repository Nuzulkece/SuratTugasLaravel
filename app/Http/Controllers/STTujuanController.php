<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tujuan;

class STTujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tujuan = Tujuan::all();

        return view('tujuan.index')
        ->with('tujuan', $tujuan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tujuan = Tujuan::all();

        return view('tujuan.create')
        ->with('tujuan', $tujuan);
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
            'tujuan'=> 'required',
        ]);

        $tujuan = new Tujuan;
        $tujuan->tujuan = $request->tujuan;

        $tujuan->save();

        return redirect()->route('st_tujuan.index')->withSuccess('Tujuan Berhasil Ditambahkan');
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
        $tujuan = Tujuan::find($id);

        return view('tujuan.edit')
        ->with('tujuan', $tujuan);
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
        $tujuan = Tujuan::find($id);

        $this->validate($request, [
            'tujuan'=> 'required',
        ]);

        $tujuan->tujuan = $request->tujuan;
        $tujuan->save();

        return redirect()->route('st_tujuan.index')->withInfo('Tujuan Berhasil Diubah');
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
         $tujuan = Tujuan::find($id);
         $tujuan->delete();

        return redirect()->route('st_tujuan.index')->withDanger('Tujuan Berhasil Dihapus');
    }
}
