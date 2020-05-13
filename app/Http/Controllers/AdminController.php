<?php

namespace App\Http\Controllers;
//jangan lupa use
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/* struktur pembuatan function */
/* public function FunctionName()
{
    code
} */

class AdminController extends Controller
{


    public function viewHomeAdmin()
    {
        //kalo belum login
        if (!Session::get('login')) {
        //maka masuk sini    
            return redirect('/');
        }else{
         //kalo udah login masuk sini
         //tapi disini di cek lagi
         //kalo levelnya admin   
            if (Session::get('level') == 'admin') {
                //masuk sini
                //ini untuk menampilkan tampilan home pada folder admin
    	       return view('admin.home');

            //kalo levelnya petugas   
            } else if(Session::get('level') == 'petugas') {
                //masuk sini
                return redirect('petugas/home');
            //kalo ga ada level    
            } else{
                //masuk sini
                return redirect('/');
            }
        }
            
    }


    /* =========================================================== */
    /* =======================PETUGAS============================ */
    /* =========================================================== */

    public function viewCrudPetugas()
    {
        //ini variabel biasa buat nampung kata 'petugas'
    	$petugas = 'petugas';
        //yang $data itu variabel buat nampung model Petugas 
            //yang di dalam kurung [] pinggir $data itu buat variabel yang nantinya di panggil di tampilan buat di looping
            //App\Petugas terus where itu buat mengambil semua data dimana levelnya petugas di dalam model Petugas yang isinya tabel petugas
    	$data['petugas'] = \App\Petugas::where('level',$petugas)->get();
        //ini untuk menampilkan tampilan crudpetugas pada folder admin
        //$data dibawah berfungsi agar $data di atas bisa di akses pada tampilan crudpetugas
    	return view('admin.crudpetugas',$data);
    }

    public function viewTambahPetugas()
    {
        //ini untuk menampilkan ediTambahPetugass pada folder admin
    	return view('admin.editTambahPetugas');
    }

    //Request $request berfungsi untuk mengambil data yg di inputkan user 
    public function tambahPetugasPost(Request $request)
    {
        //ini untuk memvalidasi apa aja yg mau diinputkan ketika tambah barang
    	$this->validate($request,[
            'nama_petugas' => 'required',
    		'username' => 'required',
    		'password' => 'required|min:8',
    		'level' => 'required',
    	]);

        //ini untuk menampung model kalo ada bacaan new berarti buat tambah data
    	$data = new \App\Petugas;
        //ini untuk memasukkan data dari nama_petugas diambil dari $request->nama_petugas ini data yg di inputkan user
        $data->nama_petugas = $request->nama_petugas;
    	$data->username = $request->username;
        //bcrypt berfungsi untuk ngeprotect password
    	$data->password = bcrypt($request->password);
    	$data->level = $request->level;
        //ini untuk simpan data
    	$status = $data->save();
        //ini buat pengecekan
    	if ($status) {
            //kalo berhassil kesini
    		return redirect('admin/crud/petugas');
    	} else {
            //kalo gagal kesini
    		return redirect('admin/tambah/petugas');
    	}

    }

    //$id_petugas dibawah adalah hasil passing/mengambil id dari tampilan
    public function viewEditPetugas($id_petugas)
    {
        //yang $data itu variabel buat nampung model Petugas 
            //yang di dalam kurung [] pinggir $data itu buat variabel yang nantinya di panggil di tampilan buat di looping
            //App\Petugas terus find itu buat mengambil semua data berdasarkan id_petugas di dalam model Petugas yang isinya tabel petugas
    	$data['petugas'] = \App\Petugas::find($id_petugas);
        //ini untuk menampilkan ediTambahPetugass pada folder admin        
        //$data dibawah berfungsi agar $data di atas bisa di akses pada tampilan editTambahPetugas
    	return view('admin.editTambahPetugas',$data);
    }

//Request $request berfungsi untuk mengambil data yg di inputkan user 
//$id_petugas dibawah adalah hasil passing/mengambil id dari tampilan
    public function editPetugasPost(Request $request, $id_petugas)
    {
        //ini untuk memvalidasi apa aja yg mau diinputkan ketika tambah barang
    	$this->validate($request,[
            'nama_petugas' => 'required',
    		'username' => 'required',
    		'level' => 'required',
    	]);

//ini mengambil data dari tabel barang berdasarkan id barang
    	$data = \App\Petugas::find($id_petugas);
        $data->nama_petugas = $request->nama_petugas;
    	$data->username = $request->username;
    	$data->level = $request->level;
//ini untuk ubah data
    	$status = $data->update();
        //ini buat pengecekan
    	if ($status) {
            //kalo berhasil
    		return redirect('admin/crud/petugas');
    	} else {
            //kalo gagal
    		return redirect('admin/edit/petugas');
    	}
    }

//$id_petugas dibawah adalah hasil passing/mengambil id dari tampilan
    public function viewForgotPetugas($id_petugas)
    {
         //yang $data itu variabel buat nampung model Petugas 
            //yang di dalam kurung [] pinggir $data itu buat variabel yang nantinya di panggil di tampilan buat di looping
            //App\Petugas terus find itu buat mengambil semua data berdasarkan id_petugas di dalam model Petugas yang isinya tabel petugas
    	$data['petugas'] = \App\Petugas::find($id_petugas);
        //ini untuk menampilkan forgotpas pada folder admin        
        //$data dibawah berfungsi agar $data di atas bisa di akses pada tampilan forgotpas
    	return view('admin.forgotPetugas',$data);
    }

//Request $request berfungsi untuk mengambil data yg di inputkan user 
//$id_petugas dibawah adalah hasil passing/mengambil id dari tampilan
	public function forgotPetugasPost(Request $request, $id_petugas)
    {
        //ini untuk memvalidasi apa aja yg mau diinputkan ketika tambah barang
    	$this->validate($request,[
    		'password' => 'required',
    		'cpassword' => 'same:password',
    	]);
//ini mengambil data dari tabel barang berdasarkan id barang
    	$data = \App\Petugas::find($id_petugas);
    	$data->password = bcrypt($request->password);
//ini buat edit data
    	$status = $data->update();
//ini buat pengecekan
    	if ($status) {
            //kalo berhasil
    		return redirect('admin/crud/petugas');
    	} else {
        //kalo gagal
    		return redirect('admin/edit/petugas');
    	}
    }   

//$id_petugas dibawah adalah hasil passing/mengambil id dari tampilan
    public function deletePetugasPost($id_petugas)
     {
            //App\Petugas terus find itu buat mengambil semua data berdasarkan id_petugas di dalam model Petugas yang isinya tabel petugas
     	$data = \App\Petugas::find($id_petugas);
//ini untuk delete data
    	$status = $data->delete();
//ini untuk pengececkan
    	if ($status) {
            //kalo berhassil
    		return redirect('admin/crud/petugas');
    	} else {
            //kalo gagal
    		return redirect('admin/crud/petugas');
    	}
     } 


    /* =========================================================== */
    /* =======================SPP============================ */
    /* =========================================================== */     

    public function viewCrudSpp()
    {
        $data['spp'] = \App\Spp::get();
        return view('admin.crudSpp',$data);
    }

    public function viewTambahSpp()
    {
        return view('admin.editTambahSpp');
    }

    public function tambahSppPost(Request $request)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = new \App\Spp;
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/spp');
        } else {
            return redirect('admin/tambah/spp');
        }

    }

    public function viewEditSpp($id_spp)
    {
        $data['spp'] = \App\Spp::find($id_spp);
        return view('admin.editTambahSpp',$data);
    }

    public function editSppPost(Request $request, $id_spp)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = \App\Spp::find($id_spp);
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/spp');
        } else {
            return redirect('admin/edit/spp');
        }
    }  

    public function deleteSppPost($id_spp)
     {
        $data = \App\Spp::find($id_spp);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/spp');
        } else {
            return redirect('admin/crud/spp');
        }
     }



     /* =========================================================== */
    /* =======================KELAS============================ */
    /* =========================================================== */     

    public function viewCrudKelas()
    {
        $data['kelas'] = \App\Kelas::get();
        return view('admin.crudKelas',$data);
    }

    public function viewTambahKelas()
    {
        return view('admin.editTambahKelas');
    }

    public function tambahKelasPost(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = new \App\Kelas;
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/kelas');
        } else {
            return redirect('admin/tambah/spp');
        }

    }

    public function viewEditKelas($id_kelas)
    {
        $data['kelas'] = \App\Kelas::find($id_kelas);
        return view('admin.editTambahKelas',$data);
    }

    public function editKelasPost(Request $request, $id_kelas)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = \App\Kelas::find($id_kelas);
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/kelas');
        } else {
            return redirect('admin/edit/kelas');
        }
    }  

    public function deleteKelasPost($id_kelas)
     {
        $data = \App\Kelas::find($id_kelas);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/kelas');
        } else {
            return redirect('admin/crud/kelas');
        }
     } 


     /* =========================================================== */
    /* =======================SISWA============================ */
    /* =========================================================== */     

    public function viewCrudSiswa()
    {
        $data['siswa'] = \App\Siswa::get();
        return view('admin.crudSiswa',$data);
    }

    public function viewTambahSiswa()
    {
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.editTambahSiswa',$data);
    }

    public function tambahSiswaPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required|min:10',
            'nis' => 'required|min:10',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = new \App\Siswa;
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/siswa');
        } else {
            return redirect('admin/tambah/siswa');
        }

    }

    public function viewEditSiswa($nisn)
    {
        $data['siswa'] = \App\Siswa::find($nisn);
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.editTambahSiswa',$data);
    }

    public function editSiswaPost(Request $request, $nisn)
    {
        $this->validate($request,[
            'nisn' => 'required|min:10',
            'nis' => 'required|min:10',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = \App\Siswa::find($nisn);
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/siswa');
        } else {
            return redirect('admin/edit/siswa');
        }
    }  

    public function deleteSiswaPost($nisn)
     {
        $data = \App\Siswa::find($nisn);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/siswa');
        } else {
            return redirect('admin/crud/siswa');
        }
     }


     /* =========================================================== */
    /* =======================PEMBAYARAN============================ */
    /* =========================================================== */     

    public function viewCrudPembayaran()
    {
        $data['pembayaran'] = \App\Pembayaran::get();
        return view('admin.crudPembayaran',$data);
    }


    public function viewTambahPembayaran()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.editTambahPembayaran',$data);
    }

    public function tambahPembayaranPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = new \App\Pembayaran;
        $data->id_petugas = Session::get('id_petugas');
        $data->nisn = $request->nisn;
        $date = date("Y-m-d");
        $data->tgl_bayar = $date;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/pembayaran');
        } else {
            return redirect('admin/tambah/pembayaran');
        }

    }

    public function viewEditPembayaran($id_pembayaran)
    {
        $data['pembayaran'] = \App\Pembayaran::find($id_pembayaran);
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        return view('admin.editTambahPembayaran',$data);
    }

    public function editPembayaranPost(Request $request, $id_pembayaran)
    {
        $this->validate($request,[
           'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = \App\Pembayaran::find($id_pembayaran);
        $data->nisn = $request->nisn;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/pembayaran');
        } else {
            return redirect('admin/edit/pembayaran');
        }
    }  

    public function deletePembayaranPost($id_pembayaran)
     {
        $data = \App\Pembayaran::find($id_pembayaran);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/pembayaran');
        } else {
            return redirect('admin/crud/pembayaran');
        }
     }




    
}
