<?php

use Illuminate\Support\Facades\Route;

// dashboard
use App\Http\Livewire\Dashboard;

Route::get('/', Dashboard::class);

// auth
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;

Route::get('login', Login::class);
Route::get('logout', Logout::class);

// bureau
use App\Http\Livewire\Bureau\Index as BureauIndex;
use App\Http\Livewire\Bureau\Create as BureauCreate;
use App\Http\Livewire\Bureau\Edit as BureauEdit;
use App\Http\Livewire\Bureau\Detail as BureauDetail;

Route::get('bureau', BureauIndex::class);
Route::get('bureau/create', BureauCreate::class);
Route::get('bureau/{bureau}/edit', BureauEdit::class);
Route::get('bureau/{bureau}', BureauDetail::class);

// citizen
use App\Http\Livewire\Citizen\Index as CitizenIndex;
use App\Http\Livewire\Citizen\Create as CitizenCreate;
use App\Http\Livewire\Citizen\Edit as CitizenEdit;
use App\Http\Livewire\Citizen\Detail as CitizenDetail;

Route::get('citizen', CitizenIndex::class);
Route::get('citizen/create', CitizenCreate::class);
Route::get('citizen/{citizen}/edit', CitizenEdit::class);
Route::get('citizen/{citizen}', CitizenDetail::class);

// file
use App\Http\Livewire\File\Logo as FileLogo;

Route::get('file/logo', FileLogo::class);


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('tes', function(){
//     return view('tes');
// });
