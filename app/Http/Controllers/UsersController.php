<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Redirect;

class UsersController extends Controller
{
    //
    public function login(){
      return view('login');
    }

    public function register(){
      return view('register');
    }

    public function loginProcess(Request $req){
      $message = [
            'email.required'    => 'email harus diisi',
            'email.email'   => 'format email tidak benar (example@example.com)',
            'password.required' => 'password harus diisi',
        ];
        $rules = [
            'email' => 'required|email',
            'password' => [
                'required',
            ],
        ];
        $validator = $this->validator($req->all(), $rules, $message);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = User::where('email', $req->email)->first();
        if (!empty($user)){
            if (Hash::check($req->password, $user->password)){
              Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password], $req->has('remember'));
              return redirect()->route('admin.dashboard');
            } else {
                $errors = [
                    'password' => 'Email atau password yang anda masukan salah'
                ];
                return Redirect::back()->withInput()->withErrors($errors);
            }
        } else {
            $errors = [
                'password' => 'Email atau password yang anda masukan salah'
            ];
            return Redirect::back()->withInput()->withErrors($errors);
        }
    }

    public function registerProcess(Request $req){
      $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
      ];
      $message = [
          'email.required'    => 'email harus diisi',
          'email.email'   => 'format email tidak benar',
          'email.unique'  => 'email sudah terdaftar',
          'password.confirmed' => 'confirm password harus sama!!',
          'password.required' => 'password harus diisi',
          'password.min'    => 'password min 8 karakter'
      ];
      $validator = Validator::make($req->all(), $rules, $message);
      if($validator->fails())
      {
          return Redirect::back()->withInput()->withErrors($validator);
      }

      $new = new User();
      $new->name = $req->name;
      $new->email = $req->email;
      $new->password = Hash::make($req->password);
      $new->save();

      return redirect()->route('login');
    }

    public function setting(){
      $user = Auth::user();
      return view('setting', compact('user'));
    }

    public function settingProcess(Request $req){
      return redirect()->route('admin.dashboard');
    }

    public function validator($data, $rules, $message){
        return Validator::make($data, $rules, $message);
    }
}
