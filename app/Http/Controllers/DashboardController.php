<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surattugas;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $surattugas = Surattugas::all();

        return view('surattugas.index')
        ->with('surattugas', $surattugas);
    }
}
