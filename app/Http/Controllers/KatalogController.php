<?php

namespace App\Http\Controllers;

use Redirect;
use App\Katalog;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as Image;

class KatalogController extends Controller
{
    //
    public function index(){
      $katalog = Katalog::with('Kategori')->get();
      return view('admin.katalog.index', compact('katalog'));
    }

    public function new(){
      $kategori = Kategori::all();
      return view('admin.katalog.new', compact('kategori'));
    }

    public function edit($id){
      $kategori = Kategori::all();
      $katalog = Katalog::where('id', $id)->first();
      return view('admin.katalog.edit', compact('kategori', 'katalog'));
    }

    public function create(Request $req){
      $valid = Validator::make($req->all(), [
          'image' => 'image|mimes:png,jpg,jpeg,JPG|max:10000',
      ]);

      if ($valid->fails()){
          return Redirect::back()->withInput()->withErrors($valid);
      }

      if($req->hasFile('image')){
        $new = new Katalog();
        $new->title = $req->title;
        $new->description = $req->description;
        $new->slug = str_replace(' ', '-', strtolower($req->title)) . '-' . rand();
        $new->id_kategori = $req->id_kategori;
        $new->low_price = $req->low_price;
        $new->end_price = $req->end_price;
        $new->color = $req->color;

        $name_image = $req->title . rand() . '.' . $req->file('image')->getClientOriginalExtension();
        $name_thumb = 'thumb_' . $name_image;

        $img = Image::make($req->file('image'));
        $imgThumb = Image::make($req->file('image'));

        $img->resize(700, null, function($constraint){
          $constraint->aspectRatio();
        });

        $imgThumb->resize(150, null, function($constraint){
          $constraint->aspectRatio();
        });

        $pathImg = public_path() . "/img/front";
        $pathThumb = public_path() . "/img/thumb";

        if (!file_exists($pathImg)){
            mkdir($pathImg, 0777, true);
        }
        if (!file_exists($pathThumb)){
            mkdir($pathThumb, 0777, true);
        }

        $img->save(public_path() . "/img/front/" . $name_image);
        $imgThumb->save(public_path() . "/img/thumb/" . $name_thumb);

        $new->image = "img/front/" . $name_image;
        $new->thumbnail_m = "img/thumb/" . $name_thumb;
        $new->save();
      } else {
        return redirect()->json([
          'error' => true,
          'message' => 'gambar tidak tersedia'
        ]);
      }

      return redirect()->route('admin.katalog');
    }

    public function update(Request $req, $id){

    }

    public function delete(Request $req){
      $del = Katalog::where('id', $req->id)->delete();
      return redirect()->route('admin.katalog');
    }
}
