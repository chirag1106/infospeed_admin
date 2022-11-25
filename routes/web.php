<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
    //return view('welcome');
//});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Admin\LoginController::class, 'login_view']);
Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'login_view']);
Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);
// Route::get('signup', [App\Http\Controllers\Admin\RegistrationController::class, 'signup']);
Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout']);
Route::post('/signup', [App\Http\Controllers\Admin\RegistrationController::class, 'register']);
Route::group(['middleware' => 'logincheck'], function()
{
Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
Route::get('employee', [App\Http\Controllers\Admin\EmployeController::class, 'view']);
Route::post('/employee', [App\Http\Controllers\Admin\EmployeController::class, 'employe']);
 Route::post('emp_edit/{id}', [App\Http\Controllers\Admin\EmployeController::class, 'emp_edit']);
Route::get('emp_delete/{id}', [App\Http\Controllers\Admin\EmployeController::class, 'delete']);
Route::get('loksabha', [App\Http\Controllers\Admin\LokSabhaController::class, 'view_ls']);
Route::post('loksabha_edit/{id}', [App\Http\Controllers\Admin\LokSabhaController::class, 'edit']);
Route::get('delete_loksabha/{id}', [App\Http\Controllers\Admin\LokSabhaController::class, 'loksabha_delete']);
Route::get('loksabha-active/{id}', [App\Http\Controllers\Admin\LokSabhaController::class, 'ls_active']);
Route::get('loksabha-deactive/{id}', [App\Http\Controllers\Admin\LokSabhaController::class, 'ls_deactive']);
Route::post('/loksabha', [App\Http\Controllers\Admin\LokSabhaController::class, 'loksabha']);
Route::get('vidhansabha', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'view_vs']);
Route::post('/vidhansabha', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'vidhansabha']);
Route::post('/edit-vidhansabha/{id}', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'edit_vidhansabha']);
Route::get('delete-vidhansabha/{id}', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'destroy_vidhan']);
Route::get('loksabha-post-vidhan-get/{type}/{id}', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'get_vidhan'])->name('get_dropdowns');
Route::get('vidhansabha-deactive/{id}', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'vs_deactive']);
Route::get('vidhansabha-active/{id}', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'vs_active']);
Route::get('block', [App\Http\Controllers\Admin\BlockController::class, 'view_block']);
Route::post('/block', [App\Http\Controllers\Admin\BlockController::class, 'block']);
Route::post('/edit-block/{id}', [App\Http\Controllers\Admin\BlockController::class, 'edit_block']);
Route::get('delete-block/{id}', [App\Http\Controllers\Admin\BlockController::class, 'destroy']);
Route::get('block-active/{id}', [App\Http\Controllers\Admin\BlockController::class, 'block_active']);
Route::get('block-deactive/{id}', [App\Http\Controllers\Admin\BlockController::class, 'block_deactive']);
Route::get('panchayat', [App\Http\Controllers\Admin\PanchayatController::class, 'view_panchayat']);
Route::post('/panchayat', [App\Http\Controllers\Admin\PanchayatController::class, 'panchayat']);
Route::get('panchayat-active/{id}', [App\Http\Controllers\Admin\PanchayatController::class, 'panchayat_active']);
Route::get('panchayat-deactive/{id}', [App\Http\Controllers\Admin\PanchayatController::class, 'panchayat_deactive']);
Route::post('/edit-panchayat/{id}', [App\Http\Controllers\Admin\PanchayatController::class, 'edit_panchayat']);
Route::get('delete-panchayat/{id}', [App\Http\Controllers\Admin\PanchayatController::class, 'delete_panchayat']);
Route::get('ward-village', [App\Http\Controllers\Admin\VillageController::class, 'view_village']);
Route::post('/ward-village', [App\Http\Controllers\Admin\VillageController::class, 'village']);
Route::Post('edit-village/{id}', [App\Http\Controllers\Admin\VillageController::class, 'edit_village']);
Route::get('village-active/{id}', [App\Http\Controllers\Admin\VillageController::class, 'active_village']);
Route::get('village-deactive/{id}', [App\Http\Controllers\Admin\VillageController::class, 'deactive_village']);
Route::get('village-delete/{id}', [App\Http\Controllers\Admin\VillageController::class, 'delete_village']);
Route::get('booth', [App\Http\Controllers\Admin\BoothController::class, 'view_booth']);
Route::post('/booth', [App\Http\Controllers\Admin\BoothController::class, 'booth']);
Route::get('booth-active/{id}', [App\Http\Controllers\Admin\BoothController::class, 'booth_active']);
Route::get('booth-deactive/{id}', [App\Http\Controllers\Admin\BoothController::class, 'booth_deactive']);
Route::post('edit-booth/{id}', [App\Http\Controllers\Admin\BoothController::class, 'booth_edit']);
Route::get('delete-booth/{id}', [App\Http\Controllers\Admin\BoothController::class, 'booth_delete']);
});
Route::get('lok-vidhan/{loksabha_id}', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'view_lok_vidhan']);
Route::post('/lok-vidhan', [App\Http\Controllers\Admin\VidhanSabhaController::class, 'save_lokvidhan']);
Route::get('vidhan-block/{vidhansabha_id}', [App\Http\Controllers\Admin\BlockController::class, 'view_vidhan_block']);
Route::post('/vidhan-block', [App\Http\Controllers\Admin\BlockController::class, 'save_vidhanblock']);
Route::get('block-panchayat/{block_id}', [App\Http\Controllers\Admin\PanchayatController::class, 'view_block_panchayat']);
Route::post('/block-panchayat', [App\Http\Controllers\Admin\PanchayatController::class, 'save_block_panchayat']);
Route::get('panchayat-village/{panchayat_id}', [App\Http\Controllers\Admin\VillageController::class, 'view_panchayat_village']);
Route::post('/panchayat-village', [App\Http\Controllers\Admin\VillageController::class, 'save_panchayat_village']);
Route::get('village-booth/{village_id}', [App\Http\Controllers\Admin\BoothController::class, 'view_village_booth']);
Route::post('/village-booth', [App\Http\Controllers\Admin\BoothController::class, 'save_village_booth']);
Route::get('form-builder', [App\Http\Controllers\Admin\FormBuilderController::class, 'form_builder']);
Route::post('/form-builder', [App\Http\Controllers\Admin\FormBuilderController::class, 'retake_form']);
Route::get('form-list', [App\Http\Controllers\Admin\FormBuilderController::class, 'form_list']);
Route::get('update-form/{form_id}', [App\Http\Controllers\Admin\FormBuilderController::class, 'edit_form']);
Route::post('update-form', [App\Http\Controllers\Admin\FormBuilderController::class, 'update']);
Route::get('preview/{form_id}', [App\Http\Controllers\Admin\FormBuilderController::class, 'preview']);
Route::post('/preview', [App\Http\Controllers\Admin\FormBuilderController::class, 'email_send']);