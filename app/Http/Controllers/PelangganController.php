<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Setting;
use Illuminate\Http\Request;
use illuminate\Support\Arr;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index');
    }
    public function data()
    {
        $pelanggan= Pelanggan::orderBy('pelanggan_id')->get();

        return datatables()
            ->of($pelanggan)
            ->addIndexColumn()
            ->addColumn('pelanggan_id', function ($pelanggan) {
                return '<span class="label label-success">'. $pelanggan->pelanggan_id .'<span>';
            })
            ->addColumn('aksi', function ($pelanggan) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('pelanggan.update', $pelanggan->pelanggan_id) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('pelanggan.destroy', $pelanggan->pelanggan_id) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'select_all', 'pelanggan_id'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelanggan = Pelanggan::latest()->first() ?? new Pelanggan();
        $pelanggan_id = (int) $pelanggan->pelanggan_id +1;
        $pelanggan= new Pelanggan();
        $pelanggan->pelanggan_id = tambah_nol_didepan($pelanggan_id, 5);
        $pelanggan->nama = $request->nama;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        return response()->json($pelanggan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        return response(null, 204);
    }
}
