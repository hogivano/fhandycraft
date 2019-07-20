<?php

namespace App\Http\Controllers;

use DB;
use App\Katalog;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function addView(Request $req){
      $katalog = Katalog::where('id', $req->id)->update([
        'view' => DB::raw('view+1')
      ]);
      return response()->json([
        'error' => false,
        'message' => 'berhasil menambahkan view'
      ]);
    }
}
