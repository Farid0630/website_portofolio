<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class educationController extends Controller
{

    private $_tipe;
    function __construct()
    {
        $this->_tipe='education';
    }  

    // function __construct()
    // {
    //     $this->_tipe='experience';
    // }

    public function index()
    {
        $data = riwayat::where('tipe', $this->_tipe)->orderby('tgl_akhir', 'desc')->get() ;
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('isi', $request->isi);

        $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'isi' => 'required',
        ],[
            'judul.required' => 'Judul harus diisi',
            'info1.required' => 'Nama Perusahaan Wajib diisi',
            'tgl_mulai.required' => 'Tanggal Mulai Wajib diisi',
            'isi.required' => 'Isi harus diisi',
        ]);

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ];
         riwayat::create($data);
         return redirect()->route('education.index')->with('success', 'Data berhasil ditambahkan');
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
        $data = riwayat::where('id',$id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.education.edit')->with('data', $data);
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

        $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'isi' => 'required',
        ],[
            'judul.required' => 'Judul harus diisi',
            'info1.required' => 'Nama Perusahaan Wajib diisi',
            'tgl_mulai.required' => 'Tanggal Mulai Wajib diisi',
            'isi.required' => 'Isi harus diisi',
        ]);

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ];
         riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);
         return redirect()->route('education.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('education.index')->with('success', 'Data berhasil dihapus');
    }
}
