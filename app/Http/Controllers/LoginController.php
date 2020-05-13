<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function logoutPost()
    {
        //ini buat logout
        Session::flush();
        //ini buat ngarahin ke halaman selanjutnya
        return redirect('/');
    }

    public function viewLoginPetugas()
    {
        //ini buat pengecekan kalo belum login
        if (!Session::get('login')) {
            //kalo belum login masuk sini
    	   return view('login.loginPetugas'); 
        }else{
            //kalo udah masuk sini tapi disini ada pengecekan lagi
            //pengecekan disini berfungsi untuk mengarahkan juga berdasarkan level yang diambil dari login

            if (Session::get('level') == 'admin') {
                return redirect('admin/home');
            } else if(Session::get('level') == 'petugas') {
                return redirect('petugas/home');
            } else{
                return redirect('/');
            }

        }
    }
//Request $request berfungsi untuk mengambil data yg di inputkan user 
    public function loginPetugasPost(Request $request)
    {
        //ini buat nampung yg di inputkan user di variabel
    	$username = $request->username;
    	$password = $request->password;

 //App\Petugas terus where itu buat mengambil semua data berdasarkan username yang telah diinputkan user di dalam model Petugas yang isinya tabel petugas
//terus first berfungsi untuk mengambil 1 data menurut where        
    	$data = \App\Petugas::where('username',$username)->first();
//ini untuk pengecekan apaakah usernamenya ada atau ennga
    	if ($data) {
//ini buat pengecekan juga apakah  passwordnya juga bener engga  
//ini juga sama untuk mengecek + mentranslate password yg udah di brcypt          
    		if (Hash::check($password,$data->password)) {
                //ini untuk login paling penting
    			Session::put('login',TRUE);
                    //ini untuk mengambil data si user yg udah di cek terus di jadiin publik atau global
    			Session::put('id_petugas',$data->id_petugas);
                Session::put('nama_petugas',$data->nama_petugas);
    			Session::put('level',$data->level);

                //ini untuk mengarahkan ke halaman selanjutnya berdasarkan level user yg diambil dari session di atas
    			if (Session::get('level') == 'admin') {
    				return redirect('admin/home');
    			} else {
    				return redirect('petugas/home');
    			}

    		}else{
                //kalo salah password masuk sini
    			return redirect('login/view/petugas');
    		}
    	}else{
            //kalo salah username masuk sini
    		return redirect('login/view/petugas');
    	}
    }


    public function viewLoginSiswa()
    {
        if (!Session::get('login')) {
            return view('login.loginSiswa');            
        }else{
            if (!Session::get('level')) {
                return redirect('siswa/home');
            }else{
                return redirect('/');
            }
        }

    }

    public function loginSiswaPost(Request $request)
    {
        $nisn = $request->nisn;
        $data = \App\Siswa::where('nisn',$nisn)->first();
        if ($data) {
                Session::put('login',TRUE);
                Session::put('nisn',$data->nisn);
                Session::put('nama',$data->nama);
                return redirect('siswa/home');
        }else{
            return redirect('login/view/siswa');
        }
    }

}
