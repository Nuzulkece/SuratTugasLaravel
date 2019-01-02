<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surattugas;
use App\Pegawai;
use App\Tujuan;
use Barryvdh\DomPDF\Facade as PDF;

class STSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $surattugas = Surattugas::all();
        $pegawai = Pegawai::all();
        $tujuan = Tujuan::all();

        return view('surattugas.index')
        ->with('surattugas', $surattugas)
        ->with('pegawai', $pegawai)
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
        $surattugas = Surattugas::all();
        $pegawai = Pegawai::all();
        $tujuan = Tujuan::all();

        return view('surattugas.create')
        ->with('surattugas', $surattugas)
        ->with('pegawai', $pegawai)
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
        
        $this->validate($request, [
            'tujuan_id'=> 'required',
            'pegawai_id'=> 'required',
            'kegiatan'=> 'required',
            'tanggal_tugas'=> 'required',
            'tanggal_akhir'=> 'required'
        ]);

        $totalsurat = count(Surattugas::all());
        $suratterakhir = Surattugas::orderBy('created_at', 'DESC')->first(); 
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        
        $surattugas = new Surattugas;


        if($suratterakhir == null){
            $hasil = "1";
        }else{
            $nomor = $suratterakhir->nomor_surat;
            $pisah = explode('/', $nomor);

            if ((int)$pisah[0] > 0 && $pisah[3] != date('Y')) {
               $hasil = "1";
            }else{
                $hasil = (int)$pisah[0]+1;    
            }
        }

        $datano = sprintf("%04s", $hasil);
        $nomor_surat=$datano."/SRU.ST/".$bulanRomawi[date('n')]."/".date('Y');

        $surattugas->nomor_surat = $nomor_surat;
        $surattugas->jabatan = $request->jabatan;
        $surattugas->nomor_polisi = $request->nomor_polisi;
        $surattugas->kegiatan = $request->kegiatan;
        $surattugas->tanggal_tugas = $request->tanggal_tugas;
        $surattugas->tanggal_akhir = $request->tanggal_akhir;
        $surattugas->status_ttd = $request->status_ttd;

        $surattugas->save();

        $surattugas->pegawais()->attach($request->pegawai_id);
        $surattugas->tujuans()->attach($request->tujuan_id);
        
        
        //return response()->json($request->tujuan_id);
        
        return redirect()->route('st_surat.index')->withSuccess('Surat Tugas Berhasil Dibuat');

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
        $surattugas = Surattugas::find($id);
        $pegawai = Pegawai::all();
        $tujuan = Tujuan::all();

        return view('surattugas.edit')
        ->with('surattugas', $surattugas)
        ->with('pegawai', $pegawai)
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
        $surattugas = Surattugas::find($id);

        $this->validate($request, [
            'kegiatan'=> 'required',
            'tanggal_tugas'=> 'required',
        ]);

        $surattugas->jabatan = $request->jabatan;
        $surattugas->nomor_polisi = $request->nomor_polisi;
        $surattugas->kegiatan = $request->kegiatan;
        $surattugas->tanggal_tugas = $request->tanggal_tugas;
        $surattugas->tanggal_akhir = $request->tanggal_akhir;
        $surattugas->status_ttd = $request->status_ttd;

        $surattugas->save();        
        
        //return response()->json($request->tujuan_id);
        
        return redirect()->route('st_surat.index')->withSuccess('Surat Tugas Berhasil Diubah');
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
        $surattugas = Surattugas::find($id);
        $surattugas->delete();

        return redirect()->route('st_surat.index')->withDanger('Surat Tugas Berhasil Dihapus');
    }

    public function cetakPDF($id)
    {
        $surattugas = SuratTugas::find($id);

        $jumtujuan = $surattugas->tujuans->count();
        $jumpegawai = $surattugas->pegawais->count();

        //return response()->json($jumlahtujuan);

        if($jumtujuan == 1 && $surattugas->status_ttd == 1 && $jumpegawai <= 6){
            $pdf = PDF::loadView('surattugas.pdf1', compact('surattugas', $surattugas));
        }elseif ($jumtujuan == 2 && $surattugas->status_ttd == 1 && $jumpegawai <= 6) {
            $pdf = PDF::loadView('surattugas.pdf2', compact('surattugas', $surattugas));
        }elseif ($jumtujuan == 3 && $surattugas->status_ttd == 1 && $jumpegawai <= 4) {
            $pdf = PDF::loadView('surattugas.pdf3', compact('surattugas', $surattugas));
        }else{
            $pdf = PDF::loadView('surattugas.pdf', compact('surattugas', $surattugas));
        }

        return $pdf->stream($surattugas->nomor_surat.'.pdf');

    }
}
