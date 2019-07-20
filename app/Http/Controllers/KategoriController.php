<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    //
    public function index(){
      $kategori = Kategori::all();
      return view('admin.kategori.index', compact('kategori'));
    }

    public function new(){
      return view('admin.kategori.new');
    }

    public function edit($id){
      $kategori = Kategori::where('id', $id)->first();
      return view('admin.kategori.edit', compact('kategori'));
    }

    public function create(Request $req){
      $new = new Kategori();
      $new->nama = $req->nama;
      $new->save();

      return redirect()->route('admin.kategori');
    }

    public function update(Request $req, $id){
      $update = Kategori::where('id', $id)->update([
        'nama' => $req->nama
      ]);
      return redirect()->route('admin.kategori');
    }

    public function delete(Request $req){
      $del = Kategori::where('id', $req->id)->delete();
      return redirect()->route('admin.negara');
    }
}
