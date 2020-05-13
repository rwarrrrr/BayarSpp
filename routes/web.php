<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ini route halaman utama

Route::get('/', function () {
    return view('welcome');
});
//ini buat logout
Route::get('logout','LoginController@logoutPost');


//ini route login 
Route::get('login/view/petugas','LoginController@viewLoginPetugas');
Route::post('login/petugas','LoginController@loginPetugasPost');

Route::get('login/view/siswa','LoginController@viewLoginSiswa');
Route::post('login/siswa','LoginController@loginSiswaPost');



//ini route admin
Route::get('admin/home','AdminController@viewHomeAdmin');

//ini crud petugas
Route::get('admin/crud/petugas','AdminController@viewCrudPetugas');
Route::get('admin/tambah/petugas','AdminController@viewTambahPetugas');
Route::post('admin/petugas','AdminController@tambahPetugasPost');
Route::get('admin/edit/petugas/{id_petugas}','AdminController@viewEditPetugas');
Route::patch('admin/petugas/{id_petugas}','AdminController@editPetugasPost');
Route::get('admin/forgot/petugas/{id_petugas}','AdminController@viewForgotPetugas');
Route::post('admin/forgot/{id_petugas}','AdminController@forgotPetugasPost');
Route::delete('admin/delete/petugas{id_petugas}','AdminController@deletePetugasPost');


//ini crudspp
Route::get('admin/crud/spp','AdminController@viewCrudSpp');
Route::get('admin/tambah/spp','AdminController@viewTambahSpp');
Route::post('admin/spp','AdminController@tambahSppPost');
Route::get('admin/edit/spp/{id_spp}','AdminController@viewEditSpp');
Route::patch('admin/spp/{id_spp}','AdminController@editSppPost');
Route::delete('admin/delete/spp{id_spp}','AdminController@deleteSppPost');


//ini crudkelas
Route::get('admin/crud/kelas','AdminController@viewCrudKelas');
Route::get('admin/tambah/kelas','AdminController@viewTambahKelas');
Route::post('admin/kelas','AdminController@tambahKelasPost');
Route::get('admin/edit/kelas/{id_kelas}','AdminController@viewEditKelas');
Route::patch('admin/kelas/{id_kelas}','AdminController@editKelasPost');
Route::delete('admin/delete/kelas{id_kelas}','AdminController@deleteKelasPost');


//ini crudsiswa
Route::get('admin/crud/siswa','AdminController@viewCrudSiswa');
Route::get('admin/tambah/siswa','AdminController@viewTambahSiswa');  
Route::post('admin/siswa','AdminController@tambahSiswaPost');
Route::get('admin/edit/siswa/{nisn}','AdminController@viewEditSiswa');
Route::patch('admin/siswa/{nisn}','AdminController@editSiswaPost');
Route::delete('admin/delete/siswa{nisn}','AdminController@deleteSiswaPost');


//ini crrudpembayaran
Route::get('admin/crud/pembayaran','AdminController@viewCrudPembayaran');
Route::get('admin/tambah/pembayaran','AdminController@viewTambahPembayaran');
Route::post('admin/pembayaran','AdminController@tambahPembayaranPost');
Route::get('admin/edit/pembayaran/{id_pembayaran}','AdminController@viewEditPembayaran');
Route::patch('admin/pembayaran/{id_pembayaran}','AdminController@editPembayaranPost');
Route::delete('admin/delete/pembayaran{id_pembayaran}','AdminController@deletePembayaranPost');


//ini route petugass

//ini crudpembayaran
Route::get('petugas/home','PetugasController@viewHomePetugas');
Route::get('petugas/tambah/pembayaran','PetugasController@viewTambahPembayaran');
Route::post('petugas/pembayaran','PetugasController@tambahPembayaranPost');
Route::get('petugas/edit/pembayaran/{id_pembayaran}','PetugasController@viewEditPembayaran');
Route::patch('petugas/pembayaran/{id_pembayaran}','PetugasController@editPembayaranPost');
Route::delete('petugas/pembayaran{id_pembayaran}','PetugasController@deletePembayaranPost');


//ini route siswa

Route::get('siswa/home','SiswaController@viewHomeSiswa');



