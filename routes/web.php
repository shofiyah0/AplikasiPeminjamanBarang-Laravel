<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PinjamMemberController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\TestQueueEmails;
use Spatie\Permission\Models\Permission;

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
    return view('welcome');
});

Auth::routes();

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

/* Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth'); */
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* PEMINJAMAN */
Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam');
Route::get('/tambahpinjam', [PinjamController::class, 'tambahpinjam'])->name('tambahpinjam');
Route::post('/insertpinjam', [PinjamController::class, 'insertpinjam'])->name('insertpinjam');
Route::get('/tampilpinjam/{ididPinjam}', [PinjamController::class, 'tampilpinjam'])->name('tampilpinjam');
Route::post('/updatepinjam/{idPinjam}', [PinjamController::class, 'updatepinjam'])->name('updatepinjam');
Route::get('/deletepinjam/{idPinjam}', [PinjamController::class, 'deletepinjam'])->name('deletepinjam');
Route::get('/exportpinjam', [PinjamController::class, 'exportpinjam'])->name('exportpinjam');

/* PENGEMBALIAN */
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');
Route::get('/tambahpengembalian', [PengembalianController::class, 'tambahpengembalian'])->name('tambahpengembalian');
Route::post('/insertpengembalian', [PengembalianController::class, 'insertpengembalian'])->name('insertpengembalian');
Route::get('/tampilpengembalian/{idKembali}', [PengembalianController::class, 'tampilpengembalian'])->name('tampilpengembalian');
Route::post('/updatepengembalian/{idKembali}', [PengembalianController::class, 'updatepengembalian'])->name('updatepengembalian');
Route::get('/deletepengembalian/{idKembali}', [PengembalianController::class, 'deletepengembalian'])->name('deletepengembalian');
Route::get('/exportpengembalian', [PengembalianController::class, 'exportpengembalian'])->name('exportpengembalian');

/* PENGECEKAN */
Route::get('/alat', [AlatController::class, 'index'])->name('alat');
Route::get('/tambahalat', [AlatController::class, 'tambahalat'])->name('tambahalat');
Route::post('/insertalat', [AlatController::class, 'insertalat'])->name('insertalat');
Route::get('/tampilalat/{id}', [AlatController::class, 'tampilalat'])->name('tampilalat');
Route::post('/updatealat/{id}', [AlatController::class, 'updatealat'])->name('updatealat');
Route::get('/deletealat/{id}', [AlatController::class, 'deletealat'])->name('deletealat');
Route::get('/exportalat', [AlatController::class, 'exportalat'])->name('exportalat');

// API untuk panggil data datatables

//Home
Route::get('/list_alat_dashboard', [HomeController::class, 'list_alat_dashboard'])->name('list_alat_dashboard');

// pinjam
Route::get('/list_data_pinjam', [PinjamController::class, 'list_data_pinjam'])->name('list_data_pinjam');

// alat
Route::get('/list_data_alat', [AlatController::class, 'list_data_alat'])->name('list_data_alat');

// pengembalian
Route::get('/list_data_pengembalian', [PengembalianController::class, 'list_data_pengembalian'])->name('list_data_pengembalian');

// give permission to user with role petugas by route
Route::get('/get-permission-teknisi', function () {
    $user = \App\Models\User::find(Auth::id());
    $user->givePermissionTo('crud master');
    return $user;
});

// give permission to user with role super-admin by route
Route::get('/get-permission-super-admin', function () {
    // cara memberikan akses melalui command line tinker
    // php artisan tinker
    // $user = \App\Models\User::find(1);
    // $user->assignRole('super-admin');
    // $user->givePermissionTo(Spatie\Permission\Models\Permission::all());
    // exit
    $user = \App\Models\User::find(Auth::id());
    $user->givePermissionTo(Permission::all());
    return $user;
});

// give permission to user with role member by route
Route::get('/get-permission-member', function () {
    $user = \App\Models\User::find(Auth::id());
    $user->givePermissionTo('akses member');
    return $user;
});

// give roles to user by route (member)
Route::get('/get-role-member', function () {
    $user = \App\Models\User::find(Auth::id());
    $user->assignRole('member');
    return $user;
});

// give roles to user by route (petugas)
Route::get('/get-role-teknisi', function () {
    $user = \App\Models\User::find(Auth::id());
    $user->assignRole('teknisi');
    return $user;
});


Route::get('/email-test', [TestQueueEmails::class, 'sendTestEmails']);
// Route::get('email-test', function() {
//     $details['email'] = 'devinalusiana15@gmail.com';
//     dispatch(new App\Jobs\TestSendEmail($details));
//     dd('Email send Successfully');
// });



// Email
Route::get('/email', [App\Http\Controllers\EmailController::class, 'create']);
Route::post('/email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');

Route::post('/kirim_email', [App\Http\Controllers\EmailController::class, 'kirim_email'])->name('kirim_email');