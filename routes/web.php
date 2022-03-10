<?php

use App\Models\Laporankeuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukumkmController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UmkmdataController;
use App\Http\Controllers\LaporankeuanganController;
use App\Http\Controllers\Admin\ManageuserController;
use App\Http\Controllers\User\UmkmdatauserController;
use App\Http\Controllers\Admin\KoperasidataController;
use App\Http\Controllers\User\DashboarduserController;
use App\Http\Controllers\adminumkm\AdminumkmController;
use App\Http\Controllers\Admin\DashboardadminController;
use App\Http\Controllers\User\KoperasidatauserController;
use App\Http\Controllers\Admin\KategorikoperasiController;
use App\Http\Controllers\adminumkm\KategoriumkmController;
use App\Http\Controllers\adminumkm\DashboardumkmController;
use App\Http\Controllers\adminumkm\ManageuserumkmController;
use App\Http\Controllers\adminkoperasi\AdminkoperasiController;
use App\Http\Controllers\adminkoperasi\KategorikoperController;
use App\Http\Controllers\adminkoperasi\DashboardkoperasiController;
use App\Http\Controllers\adminkoperasi\ManageuserkoperasiController;
use App\Http\Controllers\RatingController;
use App\Models\Rating;

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

Route::get('/', function () {

    return redirect()->route('home');

    // return view('list-umkm',[
    //     'title'=>'Home'
    // ]);
});

Auth::routes();
Route::get('/listumkm/{slug}', [HomeController::class, 'detailumkm'])->name('listumkm');
Route::get('/listkoperasi/{slug}', [HomeController::class, 'detailkoperasi'])->name('listkoperasi');
Route::get('/homedetailkoperasi/{slug}', [HomeController::class, 'detailkoperasi'])->name('homedetailkoperasi');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/list-umkm', [HomeController::class, 'listumkm'])->name('list-umkm');
Route::get('/titik/json', [HomeController::class, 'titik']);

Route::middleware(['auth'])->group(function () {
    Route::get('/selesairegistrasi', function () {
        return view('user.selesairegistrasi', [
            'title' => 'Home'
        ]);
    });
    Route::resource('umkm', UmkmController::class);
    Route::get('/detailusaha', [UmkmController::class, 'detailusaha'])->name('detailusaha');
    Route::get('/detailkoperasi', [KoperasiController::class, 'detailkoperasi'])->name('detailkoperasi');
    Route::resource('koperasi', KoperasiController::class);
    Route::resource('produkumkm', ProdukumkmController::class);
    Route::get('/produk/{id}', [ProdukumkmController::class, 'produk'])->name('produk');
    Route::resource('manageuser', ManageuserController::class);
    Route::get('/laporankoperasi/{id}', [LaporankeuanganController::class, 'laporankoperasi'])->name('laporankoperasi');
    Route::get('/detailumkm/{slug}', [AdminController::class, 'detailumkm'])->name('detailumkm');
    Route::resource('admin', AdminController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('kategorikoperasi', KategorikoperasiController::class);
    route::get('add-rating',[RatingController::class,'add'])->name('add-rating');
    route::get('/editprofile/{id}',[ManageuserController::class,'editprofile'])->name('editprofile');
    route::post('/updateprofile/{id}',[ManageuserController::class,'updateprofile'])->name('updateprofile');
});

Route::group(['middleware' => ['auth', 'admin']], function () {

   
    Route::get('/adminupdate/{slug}', [AdminController::class, 'update'])->name('adminupdate');
    Route::get('/verifikasi/{id}', [AdminController::class, 'verifikasi'])->name('verifikasi');
    Route::get('/reset_password/{id}', [ManageuserController::class, 'reset_password'])->name('reset_password');
    Route::get('/detailkoperasi/{slug}', [AdminController::class, 'detailkoperasi'])->name('detailkoperasi');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    
    Route::get('/createlaporankoperasi/{id}', [LaporankeuanganController::class, 'create'])->name('createlaporankoperasi');
    Route::get('/download/{laporan}', [Laporankeuangan::class, 'download'])->name('laporankeuangan.download');

   
    Route::resource('umkmdata', UmkmdataController::class);
    Route::resource('koperasidata', KoperasidataController::class);
    Route::resource('dashboardadmin', DashboardController::class);

    Route::get('/deletekategorikoperasi/{id}', [KategorikoperasiController::class, 'destroy'])->name('delete');
    Route::get('/deletekategoriumkm/{id}', [KategoriumkmController::class, 'destroy'])->name('delete');
    Route::get('/deleteumkm/{id}', [UmkmdataController::class, 'destroy'])->name('deleteumkm');
    Route::get('/deletekoperasi/{id}', [KoperasidataController::class, 'destroy'])->name('deletekoperasi');
    Route::get('/deleteuser/{id}', [ManageuserController::class, 'destroy'])->name('deleteuser');
});

Route::group(['middleware' => ['auth', 'user']], function () {

    Route::resource('umkmdatauser', UmkmdatauserController::class);
    Route::resource('koperasidatauser', KoperasidatauserController::class);
    Route::resource('dashboard', DashboarduserController::class);
    Route::get('/change-password', [ProfileController::class, 'change_password'])->name('change_password');
    Route::post('/update-password/{id}', [ProfileController::class, 'update_password'])->name('update_password');
    Route::resource('laporankeuangan', LaporankeuanganController::class);
    Route::get('/createlaporankoperasi/{id}', [LaporankeuanganController::class, 'create'])->name('createlaporankoperasi');
    Route::get('/deletelaporan/{id}', [LaporankeuanganController::class, 'destroy'])->name('deletelaporan');
    Route::get('/download/{laporan}', [Laporankeuangan::class, 'download'])->name('laporankeuangan.download');
    Route::get('/ulasan', [RatingController::class, 'ulasan'])->name('ulasan');
    Route::get('/deleteumkmuser/{id}', [UmkmdatauserController::class, 'destroy'])->name('deleteumkmuser');
});


Route::group(['middleware' => ['auth', 'adminumkm']], function () {
    Route::resource('dashboardumkm', DashboardumkmController::class);
    Route::resource('kategoriumkm', KategoriumkmController::class);
    Route::resource('adminumkm', AdminumkmController::class);
    Route::resource('manageuserumkm', ManageuserumkmController::class);
    Route::get('/resetpassword/{id}', [ManageuserumkmController::class, 'resetpassword'])->name('resetpassword');
    Route::get('/verifikasi_umkm/{id}', [AdminumkmController::class, 'verifikasi'])->name('verifikasi_umkm');
});

Route::group(['middleware' => ['auth', 'adminkoperasi']], function () {
    Route::resource('dashboardkoperasi', DashboardkoperasiController::class);
    Route::resource('kategorikoper', KategorikoperController::class);
    Route::resource('adminkoperasi', AdminkoperasiController::class);
    Route::resource('manageuserkoperasi', ManageuserkoperasiController::class);
    Route::get('/reset_password_user/{id}', [ManageuserkoperasiController::class, 'reset_password_user'])->name('reset_password_user');
    Route::get('/deletekategorikoper/{id}', [KategorikoperController::class, 'destroy'])->name('deletekategorikoper');
    Route::get('/deletelaporankeuangan/{id}', [LaporankeuanganController::class, 'destroy'])->name('deletelaporankeuangan');
});


// Route::group(['middleware' => ['admin', 'user']], function () {
//     Route::get('/detailumkm/{slug}', [AdminController::class, 'detailumkm'])->name('detailumkm');

//     });
Route::get('dependent-dropdown', [DependentDropdownController::class, 'index'])->name('dependent-dropdown.index');
Route::post('getState', [WilayahController::class, 'getState']);
Route::post('getCity', [WilayahController::class, 'getCity']);
Route::post('getVillage', [WilayahController::class, 'getVillage']);
Route::post('getKategoriusaha', [WilayahController::class, 'getKategoriusaha']);
