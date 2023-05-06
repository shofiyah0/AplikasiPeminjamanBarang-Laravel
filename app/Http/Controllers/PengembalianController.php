<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Pengembalian;
use App\Models\Pinjam;
use Exception;
use PDF;

// package untuk datatables
use DataTables;
use Yajra\DataTables\Html\Button;

class PengembalianController extends Controller
{
    public function index(){

        $data = Pengembalian::with('pinjam')->get();
        $pinjam = Pinjam::with('pengembalian')->get();

        return view('pengembalian', compact('data', 'pinjam'));
    }

    public function tambahpengembalian(){
        return view('tambahpengembalian');
    }

    public function insertpengembalian(Request $request){
        
        $request->validate([
            'idPinjam' => 'required',
            'TanggalKembali' => 'required', 
            'WaktuPengembalian' => 'required',
            'StatusBarang' => 'required',
        ]);
        
        try{
            $data = new Pengembalian();
            $data->idPinjam = $request->idPinjam;
            $data->TanggalKembali = $request->TanggalKembali;
            $data->WaktuPengembalian = $request->WaktuPengembalian;
            $data->StatusBarang = $request->StatusBarang;
            $data->save();

            return redirect()->route('pengembalian')->with('success_message', 'Data berhasil ditambahkan');
        } catch (Exception $error){
            Log::error($error->getMessage());
            return redirect()->back()->with('error_message', 'Data gagal ditambahkan');
        }
    }

    public function tampilpengembalian($idKembali){

        $data = Pengembalian::find($idKembali);
        return view('tampilpengembalian', compact('data'));
    }

    public function updatepengembalian(Request $request, $idKembali){
        $request->validate([
            'idPinjam' => 'required',
            'TanggalKembali' => 'requireds',
            'WaktuPengembalian' => 'required',
            'StatusBarang' => 'required',
        ]);

        try {
            Pengembalian::find($idKembali)->update([
                'idPinjam' => $request->idPinjam,
                'TanggalKembali' => $request->TanggalKembali,
                'WaktuPengembalian' => $request->WaktuPengembalian,
                'StatusBarang' => $request->StatusBarang,
            ]);
            return redirect()->route('pengembalian')->with('success_message', 'Data berhasil diperbaharui');
        } catch (Exception $error) {
            Log::error($error->getMessage());
            return redirect()->route('pengembalian')->with('error_message', 'Data gagal diperbaharui');
        }
    }

    public function deletepengembalian($idKembali){
        try {
            Pengembalian::find($idKembali)->delete();
            return redirect()->route('pengembalian')->with('success_message', 'Data berhasil di hapus');
        } catch (Exception $error) {
            Log::error($error->getMessage());
            return redirect()->route('pengembalian')->with('error_message', 'Data gagal di hapus');
        }
    }

    public function exportpengembalian(){
        $data = Pengembalian::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datapengembalian-pdf');
        return $pdf->download('data.pdf');
    }

 // API datatables

    public function list_data_pengembalian()
    {
        
        $data = Pengembalian::join('pinjam' , 'pinjams.idPinjam' , 'pengembalians.idPinjam')->select('pinjams.NamaPeminjam' , 'pengembalians.*')->get();

        return DataTables::of($data)
        ->addColumn('action' , function($data){

            return '<div class="btn-group" role="group" aria-label="Basic example">
            <a type="button" class="btn btn-primary" href="/tampilpengembalian/'.$data->idKembali.'">Edit</a>
            <a type="button" class="btn btn-danger" href="/deletepengembalian/'.$data->idKembali.'">Delete</a>
            </div>';

        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);

    }
}
