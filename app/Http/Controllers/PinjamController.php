<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Alat;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Log;

use Exception;
use PDF;

// package untuk datatables
use DataTables;
use Yajra\DataTables\Html\Button;

class PinjamController extends Controller
{
    public function index(){
        $data = Pinjam::with('alat')->get();
        $alat = Alat::with('pinjam')->get();

        return view('pinjam', compact('data', 'alat'));
    }

    public function tambahpinjam(){
        return view('tambahpinjam');
    } 

    public function insertpinjam(Request $request){
        $request->validate([
            'NamaPeminjam' => 'required',
            'NomorInduk' => 'required',
            'TanggalPinjam' => 'required',
            'WaktuPeminjaman' => 'required', 
            'LokasiPinjam' => 'required', 
            'KodeBarang' => 'required', 
            'JumlahBarang' => 'required',
        ]);

        try{  
            // fungsi untuk kurangi jumlah alat saat ada peminjaman

            $cek_alat = Alat::Where('id' , $request->KodeBarang)->first();

            if (empty($cek_alat)) {
                return redirect()->route('pinjam')->with('error_message', 'Kode Barang Tidak Tersedia');
            }
            else
            {
                // jika yang dipinjam kurang dari jumlah alat yang tersedia

                if ($cek_alat->JumlahBarang < $request->JumlahBarang ) {
                    return redirect()->route('pinjam')->with('error_message', 'Jumlah Barang Melebihi Stok Ketersediaan Alat');
                }
                else{

                    // update stok di alat
                    $update_stok_alat =  $cek_alat->JumlahBarang - $request->JumlahBarang;
                    $update_alat = Alat::Where('id' , $request->KodeBarang)->update(['JumlahBarang' => $update_stok_alat]);

                    $data = new pinjam();

                    $data->NamaPeminjam = $request->NamaPeminjam;
                    $data->NomorInduk = $request->NomorInduk;
                    $data->TanggalPinjam = $request->TanggalPinjam;
                    $data->WaktuPeminjaman = $request->WaktuPeminjaman;
                    $data->LokasiPinjam = $request->LokasiPinjam;
                    $data->KodeBarang = $request->KodeBarang;
                    $data->JumlahBarang = $request->JumlahBarang;

                    $data->save(); 

                    return redirect()->route('pinjam')->with('success_message', 'Data berhasil ditambahkan');
                }
            }

        } catch (Exception $error){
            Log::error($error->getMessage());
            return redirect()->route('pinjam')->with('error_message', 'Data gagal ditambahkan');
        }
    }

    public function tampilpinjam($idPinjam){

        $data = Pinjam::find($idPinjam);
        if(!$data) return redirect()->route('pinjam')
            ->with('error_message', 'User dengan id '.$idPinjam.' tidak ditemukan');
        return view('tampilpinjam', compact('data'));
    }
    
    public function updatepinjam(Request $request, $idPinjam){
        $request->validate([
            'NamaPeminjam' => 'required',
            'NomorInduk' => 'required',
            'TanggalPinjam' => 'required',
            'WaktuPeminjaman' => 'required', 
            'LokasiPinjam' => 'required', 
            'KodeBarang' => 'required',
            'JumlahBarang' => 'required',
        ]);

        try {
            Pinjam::find($idPinjam)->update([
                'NamaBarang' => $request->NamaBarang,
                'NomorInduk' => $request->NomorInduk,
                'TanggalPinjam' => $request->TanggalPinjam,
                'WaktuPeminjaman' => $request->WaktuPeminjaman,
                'LokasiPinjam' => $request->LokasiPinjam,
                'KodeBarang' => $request->KodeBarang,
                'JumlahBarang' => $request->JumlahBarang,
            ]);
            return redirect()->route('pinjam')->with('success_message', 'Data berhasil diperbaharui');
        } catch (Exception $error) {
            Log::error($error->getMessage());
            return redirect()->route('pinjam')->with('error_message', 'Data gagal diperbaharui');
        }
    }

    public function deletepinjam($idPinjam){
        try {
            Pinjam::find($idPinjam)->delete();
            return redirect()->route('pinjam')->with('success_message', 'Data berhasil di hapus');
        } catch (Exception $error) {
            Log::error($error->getMessage());
            return redirect()->route('pinjam')->with('error_message', 'Data gagal di hapus');
        }
    }

    public function exportpinjam(){
        $data = Pinjam::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datapinjam-pdf');
        return $pdf->download('data.pdf');
    }

    // API untuk panggil data yang akan dilempar ke datatables
    public function list_data_pinjam()
    {
        
        $data = Pinjam::join('alats' , 'alats.id' , 'pinjams.KodeBarang')->select('alats.NamaBarang' , 'pinjams.*')->get();

        return DataTables::of($data)
        ->addColumn('action' , function($data){

            $btn = '<div class="btn-group" role="group" aria-label="Basic example">';
            $btn = $btn . '<a href="/tampilpinjam/'.$data->idPinjam.'" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen"></i></a>';
            $btn = $btn . ' <a href="/deletepinjam/'.$data->idPinjam.'" class="btn btn-sm text-danger" onclick="notificationBeforeDelete(event, this)" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash" aria-hidden="true"></i></a>';
            $btn = $btn . '</div>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
}
