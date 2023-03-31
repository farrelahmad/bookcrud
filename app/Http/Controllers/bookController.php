<?php

namespace App\Http\Controllers;

use App\Models\mybook;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     * Gk pake pignate
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->katakunci) {
            $data = mybook::where('nmbook', 'LIKE', "%$request->katakunci%")
                ->orWhere('nmpenulis', 'LIKE', "%$request->katakunci%")
                ->orWhere('halaman', 'LIKE', "%$request->katakunci%")->get();
        }else{
            $data = mybook::orderBy('nmbook', 'desc')->get();
        }
        return view('book.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nmbook' => 'required|unique:buku,nmbook',
            'nmpenulis' => 'required',
            'halaman' => 'required',
        ], [
            'nmbook.required' => 'Nama buku wajib diisi',
            'nmbook.unique' => 'Nama buku yang diisikan sudah ada dalam database',
            'nmpenulis.required' => 'Nama penulis wajib diisi',
            'halaman.required' => 'Halaman wajib diisi',
        ]);
        mybook::create([
            'nmbook'=>$request->nmbook,
            'nmpenulis'=>$request->nmpenulis,
            'halaman'=>$request->halaman
        ]);
        
        return redirect()->to('book')->with('success', 'berhasil menambahkan data');
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
        $data = mybook::where('nmbook', $id)->first();
        return view('book.edit')->with('data', $data);
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
            'nmbook' => 'required|unique:buku,nmbook',
            'halaman' => 'required',
        ], [
            'nmbook.required' => 'Nama buku wajib diisi',
            'nmbook.unique' => 'Nama buku yang diisikan sudah ada dalam database',
            'halaman.required' => 'Halaman wajib diisi',
        ]);

        $haha = [
            'nmbook'=>$request->nmbook,
            'halaman'=>$request->halaman
        ];
        mybook::where('nmbook', $id)->update($haha);
        
        return redirect()->to('book')->with('success', 'berhasil merubah data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mybook::where('nmbook', $id)->delete();
        return redirect()->to('book')->with('success', 'Berhasil melakukan delete data');
    }

    // public function register()
    // {
    //     return view('book.register');
    // }

    //     /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function registeraction(Request $request)
    // {
    //     $request->validate([
    //         'nmbook' => 'required|unique:buku,nmbook',
    //         'halaman' => 'required',
    //     ], [
    //         'nmbook.required' => 'Nama buku wajib diisi',
    //         'nmbook.unique' => 'Nama buku yang diisikan sudah ada dalam database',
    //         'halaman.required' => 'Halaman wajib diisi',
    //     ]);
    // }
}
