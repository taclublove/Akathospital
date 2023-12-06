<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\adminDashboardController;
use App\Http\Controllers\admin\procurementAnnouncementController;
use App\Http\Controllers\admin\sexController;
use App\Http\Controllers\admin\typeController;
use App\Http\Controllers\admin\prefixController;
use App\Http\Controllers\admin\officerController;
use App\Http\Controllers\admin\itaMainController;
use App\Http\Controllers\admin\fiscalYearController;
use App\Http\Controllers\admin\itaSub1Controller;
use App\Http\Controllers\admin\itaSub2Controller;
use App\Http\Controllers\admin\itaSub3Controller;
use App\Http\Controllers\admin\itaSub4Controller;
use App\Http\Controllers\admin\showPDFController;
use App\Http\Controllers\admin\mainMenuShowController;
use App\Http\Controllers\admin\subMenuShowController;
use App\Http\Controllers\admin\generalPressReleaseController;
use App\Http\Controllers\organizationHistoryController;
use App\Http\Controllers\executiveCommitteeController;
use App\Http\Controllers\pressReleaseController;
use App\Http\Controllers\vmvsController;
use App\Http\Controllers\itaController;

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

// Test System Start
Route::get('/testSystem', function() {
    return view('testSystem');
});
// Test System End

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function() {
    return view('test');
});

Auth::routes();

//Route for normal Admin
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Admin Side Start


        // precurement_announcements Start
            Route::get('/procurementAnnouncement', [procurementAnnouncementController::class, 'index'])->name('procurementAnnouncement');
            Route::post('/store', [procurementAnnouncementController::class, 'store'])->name('store');
            Route::get('/fetchAll', [procurementAnnouncementController::class, 'fetchAll'])->name('fetchAll');
            Route::delete('/delete', [procurementAnnouncementController::class, 'delete'])->name('delete');
            Route::get('/edit', [procurementAnnouncementController::class, 'edit'])->name('edit');
            Route::post('/update', [procurementAnnouncementController::class, 'update'])->name('update');
        // precurement_announcements End
        // Sex Start
            Route::get('/sex', [sexController::class, 'index'])->name('sex');
            Route::post('/sexStore', [sexController::class, 'sexStore'])->name('sexStore');
            Route::get('/sexFetchAll', [sexController::class, 'sexFetchAll'])->name('sexFetchAll');
            Route::delete('/sexDelete', [sexController::class, 'sexDelete'])->name('sexDelete');
            Route::get('/sexEdit', [sexController::class, 'sexEdit'])->name('sexEdit');
            Route::post('/sexUpdate', [sexController::class, 'sexUpdate'])->name('sexUpdate');
        // Sex End
        // Type Start
            Route::get('/type', [typeController::class, 'index'])->name('type');
            Route::post('/typeStore', [typeController::class, 'typeStore'])->name('typeStore');
            Route::get('/typeFetchAll', [typeController::class, 'typeFetchAll'])->name('typeFetchAll');
            Route::delete('/typeDelete', [typeController::class, 'typeDelete'])->name('typeDelete');
            Route::get('/typeEdit', [typeController::class, 'typeEdit'])->name('typeEdit');
            Route::post('/typeUpdate', [typeController::class, 'typeUpdate'])->name('typeUpdate');
        // Type End
        // Prefix Start
            Route::get('/prefix', [prefixController::class, 'index'])->name('prefix');
            Route::post('/prefixStore', [prefixController::class, 'prefixStore'])->name('prefixStore');
            Route::get('/prefixFetchAll', [prefixController::class, 'prefixFetchAll'])->name('prefixFetchAll');
            Route::delete('/prefixDelete', [prefixController::class, 'prefixDelete'])->name('prefixDelete');
            Route::get('/prefixEdit', [prefixController::class, 'prefixEdit'])->name('prefixEdit');
            Route::post('/prefixUpdate', [prefixController::class, 'prefixUpdate'])->name('prefixUpdate');
        // Prefix End
        // Officer Start
            Route::get('/officer', [officerController::class, 'index'])->name('officer');
            Route::post('/userStore', [officerController::class, 'userStore'])->name('userStore');
            Route::get('/userFetchAll', [officerController::class, 'userFetchAll'])->name('userFetchAll');
            Route::delete('/userDelete', [officerController::class, 'userDelete'])->name('userDelete');
            Route::get('/userEdit', [officerController::class, 'userEdit'])->name('userEdit');
            Route::post('/userUpdate', [officerController::class, 'userUpdate'])->name('userUpdate');
            Route::post('/userCheck', [officerController::class, 'userCheck'])->name('userCheck');
        // Officer End

        // Fiscal Year Start
            Route::get('/fiscalYear', [fiscalYearController::class, 'index'])->name('fiscalYear');
            Route::post('/fiscalYearStore', [fiscalYearController::class, 'fiscalYearStore'])->name('fiscalYearStore');
            Route::get('/fiscalYearFetchAll', [fiscalYearController::class, 'fiscalYearFetchAll'])->name('fiscalYearFetchAll');
            Route::delete('/fiscalYearDelete', [fiscalYearController::class, 'fiscalYearDelete'])->name('fiscalYearDelete');
            Route::get('/fiscalYearEdit', [fiscalYearController::class, 'fiscalYearEdit'])->name('fiscalYearEdit');
            Route::post('/fiscalYearUpdate', [fiscalYearController::class, 'fiscalYearUpdate'])->name('fiscalYearUpdate');
        // Fiscal Year End

        // Ita Main Start
            Route::get('/itaMain', [itaMainController::class, 'index'])->name('itaMain');
            Route::post('/itaMainStore', [itaMainController::class, 'itaMainStore'])->name('itaMainStore');
            Route::get('/itaMainFetchAll', [itaMainController::class, 'itaMainFetchAll'])->name('itaMainFetchAll');
            Route::delete('/itaMainDelete', [itaMainController::class, 'itaMainDelete'])->name('itaMainDelete');
            Route::get('/itaMainEdit', [itaMainController::class, 'itaMainEdit'])->name('itaMainEdit');
            Route::post('/itaMainUpdate', [itaMainController::class, 'itaMainUpdate'])->name('itaMainUpdate');
        // Ita Main End

        // Ita Sub 1 Start
            Route::get('/itaSub1', [itaSub1Controller::class, 'index'])->name('itaSub1');
            Route::post('/itaSub1Store', [itaSub1Controller::class, 'itaSub1Store'])->name('itaSub1Store');
            Route::get('/itaSub1FetchAll', [itaSub1Controller::class, 'itaSub1FetchAll'])->name('itaSub1FetchAll');
            Route::delete('/itaSub1Delete', [itaSub1Controller::class, 'itaSub1Delete'])->name('itaSub1Delete');
            Route::get('/itaSub1Edit', [itaSub1Controller::class, 'itaSub1Edit'])->name('itaSub1Edit');
            Route::post('/itaSub1Update', [itaSub1Controller::class, 'itaSub1Update'])->name('itaSub1Update');
        // Ita Sub 1 End

        // Ita Sub 2 Start
            Route::get('/itaSub2', [itaSub2Controller::class, 'index'])->name('itaSub2');
            Route::post('/itaSub2Store', [itaSub2Controller::class, 'itaSub2Store'])->name('itaSub2Store');
            Route::get('/itaSub2FetchAll', [itaSub2Controller::class, 'itaSub2FetchAll'])->name('itaSub2FetchAll');
            Route::delete('/itaSub2Delete', [itaSub2Controller::class, 'itaSub2Delete'])->name('itaSub2Delete');
            Route::get('/itaSub2Edit', [itaSub2Controller::class, 'itaSub2Edit'])->name('itaSub2Edit');
            Route::post('/itaSub2Update', [itaSub2Controller::class, 'itaSub2Update'])->name('itaSub2Update');
        // Ita Sub 2 End

        // Ita Sub 3 Start
            Route::get('/itaSub3', [itaSub3Controller::class, 'index'])->name('itaSub3');
            Route::post('/itaSub3Store', [itaSub3Controller::class, 'itaSub3Store'])->name('itaSub3Store');
            Route::get('/itaSub3FetchAll', [itaSub3Controller::class, 'itaSub3FetchAll'])->name('itaSub3FetchAll');
            Route::delete('/itaSub3Delete', [itaSub3Controller::class, 'itaSub3Delete'])->name('itaSub3Delete');
            Route::get('/itaSub3Edit', [itaSub3Controller::class, 'itaSub3Edit'])->name('itaSub3Edit');
            Route::post('/itaSub3Update', [itaSub3Controller::class, 'itaSub3Update'])->name('itaSub3Update');
        // Ita Sub 3 End

        // Ita Sub 4 Start
            Route::get('/itaSub4', [itaSub4Controller::class, 'index'])->name('itaSub4');
            Route::post('/itaSub4Store', [itaSub4Controller::class, 'itaSub4Store'])->name('itaSub4Store');
            Route::get('/itaSub4FetchAll', [itaSub4Controller::class, 'itaSub4FetchAll'])->name('itaSub4FetchAll');
            Route::delete('/itaSub4Delete', [itaSub4Controller::class, 'itaSub4Delete'])->name('itaSub4Delete');
            Route::get('/itaSub4Edit', [itaSub4Controller::class, 'itaSub4Edit'])->name('itaSub4Edit');
            Route::post('/itaSub4Update', [itaSub4Controller::class, 'itaSub4Update'])->name('itaSub4Update');
        // Ita Sub 4 End

        // Main Menu Show Start
            Route::get('/mainMenuShow', [mainMenuShowController::class, 'index'])->name('mainMenuShow');
            Route::post('/mainMenuShowStore', [mainMenuShowController::class, 'mainMenuShowStore'])->name('mainMenuShowStore');
            Route::get('/mainMenuShowFetchAll', [mainMenuShowController::class, 'mainMenuShowFetchAll'])->name('mainMenuShowFetchAll');
            Route::delete('/mainMenuShowDelete', [mainMenuShowController::class, 'mainMenuShowDelete'])->name('mainMenuShowDelete');
            Route::get('/mainMenuShowEdit', [mainMenuShowController::class, 'mainMenuShowEdit'])->name('mainMenuShowEdit');
            Route::post('/mainMenuShowUpdate', [mainMenuShowController::class, 'mainMenuShowUpdate'])->name('mainMenuShowUpdate');
        // Main Menu Show End

         // Sub Menu Show Start
            Route::get('/subMenuShow', [subMenuShowController::class, 'index'])->name('subMenuShow');
            Route::post('/subMenuShowStore', [subMenuShowController::class, 'subMenuShowStore'])->name('subMenuShowStore');
            Route::get('/subMenuShowFetchAll', [subMenuShowController::class, 'subMenuShowFetchAll'])->name('subMenuShowFetchAll');
            Route::delete('/subMenuShowDelete', [subMenuShowController::class, 'subMenuShowDelete'])->name('subMenuShowDelete');
            Route::get('/subMenuShowEdit', [subMenuShowController::class, 'subMenuShowEdit'])->name('subMenuShowEdit');
            Route::post('/subMenuShowUpdate', [subMenuShowController::class, 'subMenuShowUpdate'])->name('subMenuShowUpdate');
        // Sub Menu Show End

            Route::get('/gprl', [generalPressReleaseController::class, 'index'])->name('gprl');
            Route::get('/gprlCreate', [generalPressReleaseController::class, 'gprlCreate'])->name('gprlCreate');

    // Admin Side End
    });

// Route::post('/adminDashboard', [adminDashboardController::class, 'store'])->name('adminDashboard');

Route::get('/organizationHistory', [organizationHistoryController::class, 'index'])->name('organizationHistory');
Route::get('/executiveCommittee', [executiveCommitteeController::class, 'index'])->name('executiveCommittee');
Route::get('/prl/{id}', [pressReleaseController::class, 'index'])->name('prl');
Route::get('/vmvs', [vmvsController::class, 'index'])->name('vmvs');
Route::get('/ita/{id}', [itaController::class, 'index'])->name('ita');

// Show PDF Start
Route::get('/showPDF/{id},{mode}', [showPDFController::class, 'show'])->name('showPDF');
// Show PDF End



