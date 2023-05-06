<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Alat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Exceptions\Handler;
use Exception;
use PDF;

// package untuk datatables
use DataTables;
use Yajra\DataTables\Html\Button;

class AlatController extends Controller
{
    public function index(){
        $data = Alat::paginate(5);
        return view('alat', compact('data'));
    

        //tampilkan view barang dan kirim datanya ke view tersebut
        return view('pinjam')->with('data', $data);
    }

    public function tambahalat(){
        return view('tambahalat');
    }

    public function insertalat(Request $request){
        
        $request->validate([
            'NamaBarang' => 'required|unique:alats',
            'JumlahBarang' => 'required|numeric',
        ]);
        
        try{
            $data = new Alat();
            $data->NamaBarang = $request->NamaBarang;
            $data->JumlahBarang = $request->JumlahBarang;
            $data->save();
            return redirect()->route('alat')->with('success_message', 'Data berhasil ditambahkan');

        } catch (Exception $error){
            Log::error($error->getMessage());
            return redirect()->back()->with('error_message', 'Data gagal ditambahkan');
        }
    }

    public function tampilalat($id){
        $data = Alat::find($id);
        if(!$data) return redirect()->route('alat')
            ->with('error_message', 'User dengan id '.$id.' tidak ditemukan');
        return view('tampilalat', compact('data'));
    }

    public function updatealat(Request $request, $id){
        $request->validate([
            'NamaBarang' => 'required',
            'JumlahBarang' => 'required',
        ]);

        try {
            Alat::find($id)->update([
                'NamaBarang' => $request->NamaBarang,
                'JumlahBarang' => $request->JumlahBarang,
            ]);
            return redirect()->route('alat')->with('success_message', 'Data berhasil diperbaharui');
        } catch (Exception $error) {
            Log::error($error->getMessage());
            return redirect()->route('alat')->with('error_message', 'Data gagal diperbaharui');
        }
    }

    public function deletealat($id){
        try {
            Alat::find($id)->delete();
            return redirect()->route('alat')->with('success_message', 'Data berhasil di hapus');
        } catch (Exception $error) {
            Log::error($error->getMessage());
            return redirect()->route('alat')->with('error_message', 'Data gagal di hapus');
        }
    }

    public function exportalat(){
        $data = Alat::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('dataalat-pdf');
        return $pdf->download('data.pdf');
    }

    // API datatables
    public function list_data_alat()
    {
        $data = Alat::all();

        return DataTables::of($data)
        ->addColumn('action' , function($data){

            $btn = '<div class="btn-group" role="group" aria-label="Basic example">';
            $btn = $btn . '<a href="/tampilalat/'.$data->id.'" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen"></i></a>';
            $btn = $btn . ' <a href="/deletealat/'.$data->id.'" class="btn btn-sm text-danger" onclick="notificationBeforeDelete(event, this)" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash" aria-hidden="true"></i></a>';
            $btn = $btn . '</div>';
            return $btn;

        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
}
