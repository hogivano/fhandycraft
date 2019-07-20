<?php

namespace App\Http\Controllers;

use Auth;
use App\Kategori;
use App\Katalog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
      $kategori = Kategori::with('Katalog')->get();
      $all = Katalog::all();
      return view('welcome', compact('kategori', 'all'));
    }

    public function dashboard(){
      $kategori = Kategori::count();
      $katalog = Katalog::count();
      return view('admin.dashboard', compact('kategori', 'katalog'));
    }

    public function logout(){
      Auth::guard('admin')->logout();
      return redirect()->route('admin.dashboard');
    }
}
