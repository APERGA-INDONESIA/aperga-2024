<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

define('CREATE', "/create");
define('EDIT_ID', "/edit/{id}");
define('DELETE_ID', "/delete/{id}");
define('ADMIN_CON', App\Http\Controllers\Admin\AdminController::class);
define('HOME_CON', App\Http\Controllers\HomeController::class);
define('FIND_CON', App\Http\Controllers\ApperfindController::class);
define('LOG_CON', App\Http\Controllers\ApperlogController::class);
define('TYPE_CON', App\Http\Controllers\MasterData\TypeController::class);
define('SKILL_CON', App\Http\Controllers\MasterData\SkillController::class);
define('LOC_CON', App\Http\Controllers\MasterData\LocationController::class);

Route::get('/', function(){ return redirect("/apperlog"); });

Auth::routes();

Route::get('/', function(){ return view('welcome'); });

Route::get('/home', function(){ return redirect("/apperlog"); });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix("/administrator")->group(function () {
        Route::get('/', [ADMIN_CON, 'index'])->name('administrator');
        Route::get(CREATE, [ADMIN_CON, 'create'])->name('administrator_create');
        Route::post(CREATE, [ADMIN_CON, 'postCreate'])->name('administrator_post_create');
        Route::get(EDIT_ID, [ADMIN_CON, 'edit'])->name('administrator_edit');
        Route::post(EDIT_ID, [ADMIN_CON, 'postEdit'])->name('administrator_post_edit');
        Route::get('/pass/{id}', [ADMIN_CON, 'pass'])->name('administrator_pass');
        Route::post('/pass/{id}', [ADMIN_CON, 'postPass'])->name('administrator_post_pass');
        Route::post(DELETE_ID, [ADMIN_CON, 'postDelete'])->name('administrator_post_delete');
    });
    Route::prefix("/apperlog")->group(function () {
        Route::get('/', [LOG_CON, 'index'])->name('apperlog');
        Route::get('/progress/{id}', [FIND_CON, 'progress'])->name('apperlog_contract_success');
        Route::get('/view/{id}', [LOG_CON, 'view'])->name('apperlog_view');
        Route::post('/view/{id}', [LOG_CON, 'viewPost'])->name('apperlog_view_post');
        Route::get('/pdf/{id}', [LOG_CON, 'viewPDF'])->name('apperlog_view_pdf');
        Route::get('/sign/{id}', [LOG_CON, 'sign'])->name('apperlog_sign');
        Route::post('/sign/{id}', [LOG_CON, 'signPost'])->name('apperlog_sign_post');
    });
    Route::prefix("/apperfind")->group(function () {
        Route::get('/', [FIND_CON, 'index'])->name('apperfind');
        Route::get('/detail/{id}', [FIND_CON, 'detail'])->name('apperfind_detail');
        Route::get('/contract/{id}', [FIND_CON, 'contract'])->name('apperfind_contract');
        Route::post('/contract/{id}', [FIND_CON, 'contractPost'])->name('apperfind_contract_post');
        Route::get('/success/{id}', [FIND_CON, 'success'])->name('apperfind_contract_success');
        Route::get(EDIT_ID, [FIND_CON, 'edit'])->name('apperfind_edit');
        Route::post(EDIT_ID, [FIND_CON, 'postEdit'])->name('apperfind_post_edit');
        Route::get(DELETE_ID, [FIND_CON, 'delete'])->name('apperfind_delete');
        Route::post(DELETE_ID, [FIND_CON, 'postDelete'])->name('apperfind_post_delete');
        // master
        Route::get(CREATE, [FIND_CON, 'create'])->name('apperfind_create');
        Route::post(CREATE, [FIND_CON, 'postCreate'])->name('apperfind_post_create');
    });
    Route::prefix("/apperassist")->group(function () {
        Route::get('/', [HOME_CON, 'toBedeveloped'])->name('apperassist');
    });
    Route::prefix("/apperpay")->group(function () {
        Route::get('/', [HOME_CON, 'toBedeveloped'])->name('apperpay');
    });
    Route::prefix("/apperneed")->group(function () {
        Route::get('/', [HOME_CON, 'toBedeveloped'])->name('apperneed');
    });
    Route::prefix("/masterdata")->group(function () {
        Route::prefix("/type")->group(function () {
            Route::get('/', [TYPE_CON, 'index'])->name('masterdata_type');
            Route::get(CREATE, [TYPE_CON, 'create'])->name('masterdata_type_create');
            Route::post(CREATE, [TYPE_CON, 'postCreate'])->name('masterdata_type_post_create');
            Route::get(EDIT_ID, [TYPE_CON, 'edit'])->name('masterdata_type_edit');
            Route::post(EDIT_ID, [TYPE_CON, 'postEdit'])->name('masterdata_type_post_edit');
            Route::get(DELETE_ID, [TYPE_CON, 'delete'])->name('masterdata_type_delete');
            Route::post(DELETE_ID, [TYPE_CON, 'postDelete'])->name('masterdata_type_post_delete');
        });
        Route::prefix("/skill")->group(function () {
            Route::get('/', [SKILL_CON, 'index'])->name('masterdata_skill');
            Route::get(CREATE, [SKILL_CON, 'create'])->name('masterdata_skill_create');
            Route::post(CREATE, [SKILL_CON, 'postCreate'])->name('masterdata_skill_post_create');
            Route::get(EDIT_ID, [SKILL_CON, 'edit'])->name('masterdata_skill_edit');
            Route::post(EDIT_ID, [SKILL_CON, 'postEdit'])->name('masterdata_skill_post_edit');
            Route::get(DELETE_ID, [SKILL_CON, 'delete'])->name('masterdata_skill_delete');
            Route::post(DELETE_ID, [SKILL_CON, 'postDelete'])->name('masterdata_skill_post_delete');
        });
        Route::prefix("/location")->group(function () {
            Route::get('/', [LOC_CON, 'index'])->name('masterdata_location');
            Route::get(CREATE, [LOC_CON, 'create'])->name('masterdata_location_create');
            Route::post(CREATE, [LOC_CON, 'postCreate'])->name('masterdata_location_post_create');
            Route::get(EDIT_ID, [LOC_CON, 'edit'])->name('masterdata_location_edit');
            Route::post(EDIT_ID, [LOC_CON, 'postEdit'])->name('masterdata_location_post_edit');
            Route::get(DELETE_ID, [LOC_CON, 'delete'])->name('masterdata_location_delete');
            Route::post(DELETE_ID, [LOC_CON, 'postDelete'])->name('masterdata_location_post_delete');
        });
    });
});
