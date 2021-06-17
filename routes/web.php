<?php

use Illuminate\Support\Facades\Route;
use App\Models\group_tables;
use App\Models\grname_tables;
use App\Models\roles;
use App\Models\model_has_roles;
use App\Http\Controllers\groupController;
use App\Http\Controllers\addItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\TeacherController;
use App\Models\score_tables;
use App\Models\User;
use Codedge\Fpdf\Fpdf\Fpdf;
use FPDF as GlobalFPDF;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

// Маршрутизация по контроллеру
// Route::resource('/group',groupController::class);

// Route::get('groupJournal/{id_discipl}/{group}', [groupController::class, 'showJournal']);
// Route::get('ggNew', [groupController::class, 'selectGroup']);
// Route::get('showDisciplForGroup/{item}/', [groupController::class, 'showDisciplForGroup']);
// Route::get('showJournal/{discItem}/{item}/', [groupController::class, 'journalSelect']);

// // Маршрутизация CreateController (методы для добавления элементов в базу)
// Route::get('formGroup', [addItemController::class, 'createGroup']);
// Route::get('formDiscipl', [addItemController::class, 'createDiscipl']);
// Route::get('formEvent', [addItemController::class, 'createEvent']);
// Route::get('formSpecial', [addItemController::class, 'createSpecialnost']);
// Route::get('formScore/{id_discipl}/{group}', [groupController::class, 'addJournal']);
// // Маршрутизация обработчика
// Route::post('addFinalStepGroup', [addItemController::class, 'addGroup']);
// Route::post('addFinalStepDiscipl', [addItemController::class, 'addDiscipl']);
// Route::post('addFinalStepEvent', [addItemController::class, 'addEvent']);
// Route::post('addFinalStepSpecial', [addItemController::class, 'addSpecial']);
// Route::post('addFinalStepScore', [groupController::class, 'addJournalFinal']);

// USERCONTROLLER



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthenticatedSessionController::class,'create']);
Route::get('/register', [RegisteredUserController::class,'create']);
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('test',function() {
        return view('tttt');
    });

    // Маршрутизация по контроллеру
Route::resource('/group',groupController::class);




Route::get('groupJournal/{id_discipl}/{group}', [groupController::class, 'showJournal']);
Route::get('ggNew', [groupController::class, 'selectGroup']);
Route::get('showDisciplForGroup/{item}/', [groupController::class, 'showDisciplForGroup']);
Route::get('showJournal/{discItem}/{item}/', [groupController::class, 'journalSelect'])->name('showJournal');
Route::get('showJournal/', [groupController::class, 'journalSelect'])->name('showJournal1');
// Маршрутизация CreateController (методы для добавления элементов в базу)
Route::get('formGroup', [addItemController::class, 'createGroup']);
Route::get('formDiscipl', [addItemController::class, 'createDiscipl']);
Route::get('formEvent', [addItemController::class, 'createEvent']);
Route::get('formSpecial', [addItemController::class, 'createSpecialnost']);
Route::get('formScore/{id_discipl}/{group}', [groupController::class, 'addJournal']);
// Маршрутизация обработчика
Route::post('addFinalStepGroup', [addItemController::class, 'addGroup']);
Route::post('addFinalStepDiscipl', [addItemController::class, 'addDiscipl']);
Route::post('addFinalStepEvent', [addItemController::class, 'addEvent']);
Route::post('addFinalStepSpecial', [addItemController::class, 'addSpecial']);
Route::post('addFinalStepScore', [groupController::class, 'addJournalFinal']);
Route::get('addUserForGroup', [addItemController::class, 'addUserForGroup']);
Route::post('addUserForGroupDB', [addItemController::class, 'addUseGrouprForDb']);
Route::get('users', [UserController::class, 'index']);

Route::get('addRole/{item}', [UserController::class, 'addRole']);
Route::post('addFinalStepRole', [UserController::class, 'addRoleDb']);
Route::post('updatepRoleForUser', [UserController::class, 'updateRoleDb']);

route::get('deleteUser/{item}',[UserController::class, 'deleteUser']);

route::get('selectDisciplin/',[groupController::class, 'disciplinSelect']);
route::get('disciplDelete/{item}',[groupController::class, 'disciplDelete']);

// добавить дисциплинну в группу

route::get('/addDisciplinForGroup',[groupController::class, 'addDisciplinForGroup']);
route::post('/addDisciplGr',[groupController::class, 'disciplGr']);
Route::get('formEvent', [addItemController::class, 'createEvent']);
Route::post('addFinalStepEvent', [addItemController::class, 'addEvent']);

// Роутинги для отчетов
// route::get('/formOtchet',[groupController::class, 'groupAndDisOtchet']);
// route::get('/formOtchetSecond',[groupController::class, 'groupAndDisOtchet']);
// route::get('/form_disciple/{item}',[groupController::class, 'groupDis']);
// route::get('/generateOtchet/{item}/{itemDis}',[groupController::class, 'otchetGenerate']);



route::get('/groupPdf',[groupController::class, 'groupForPDF'])->name('groupPdf');
route::get('/groupex',[groupController::class, 'groupExpPdf'])->name('groupPdf');


// Новые роутинги для отчетов
route::get('/firstPdf',[groupController::class, 'firstPdfMeth'])->name('firstPdf');
// route::get('/firstDisc/{item}',[groupController::class, 'firstDiscPdfMeth'])->name('firstPdf');
// route::get('/firctpdf/{item}/{itemDiscipl}',[groupController::class, 'firstpdf'])->name('firstPdf');

route::get('/formOtchet',[groupController::class, 'groupAndDisOt']);

// route::get('export',[groupController::class, 'otchetGenerate']);


route::get('/firstDisc/{item}',[groupController::class, 'groupDisPDF']);
route::post('/addOtchResult',[groupController::class, 'addOtchResult']);
route::get('/addPdfOtchetSecond/{idGRN}/{dateGRN}',[groupController::class, 'addSecOtchetAddPDF']);


route::get('allGroupForm/',[groupController::class, 'secondOtchetForm']);
route::post('allOtchetDb/',[groupController::class, 'allDisciplOtchet']);

route::get('ekzOtchet/',[groupController::class, 'ekzOtchetForm']);
route::post('ekzOtchetCreate/',[groupController::class, 'ekzOtchetCreate']);

route::get('addekzOtchetCreate/{userId}',[groupController::class, 'addEkzOtchetCreate']);

route::get('/grouptest/{idGRN}/{dateGRN}',[groupController::class, 'allDisciplOtchetPDF'])->name('groupPdf');
});

Route::group(['middleware' => ['role:student']], function () {

    Route::get('myGroup', [studentController::class, 'home']);
    Route::get('mydiscipl/{item}', [studentController::class, 'myDiscipl']);
    Route::get('myjournal/{item}/{itemDis}', [studentController::class, 'myJournal']);
});

Route::group(['middleware' => ['role:deleted']], function () {

    // Route::get('/dashboard', });

    Route::get('/dashboard', function () {
        return 'Hello World';
    });

});


Route::group(['middleware' => ['role:teacher']], function () {

    Route::get('myDisciplins', [TeacherController::class, 'myDisciplins']);
    Route::get('addScore/{itemDis}/{itemGrn}', [TeacherController::class, 'addScoreForTeacher']);
    Route::get('myGroup/{itemDis}', [TeacherController::class, 'myGroup']);
    Route::get('myJournalTeacher/{itemDis}/{itemGrn}', [TeacherController::class, 'myJournal']);
    Route::post('scoreAddDb', [TeacherController::class, 'addScoreDb']);
    Route::get('formEvent', [addItemController::class, 'createEvent']);
    Route::post('addFinalStepEvent', [addItemController::class, 'addEvent']);
});



Route::get('/kk', function () {
    $group = group_tables::all();
   foreach($group as $d) {
       echo 'дисц имя: '.$d.'<br>';
       echo '----------------<br>';
    foreach($d->disciplinForGroup as $discipl){
        echo 'имя дисциплины'.$discipl['discipl_name'].'<br>';
    }
   }



});

Route::get('/pdf', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $scoretest = score_tables::get();
    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 10);
    $fpdf->Cell(30, 5,'login', 1,0);
    $fpdf->Cell(30, 5,'octype', 1,0);
    $fpdf->Cell(30, 5,'id_discipl', 1,0);
    $fpdf->Cell(30, 5,'id_event', 1,1);

    foreach($scoretest as $scoreItem) {
        $fpdf->Cell(30, 5,$scoreItem->id_user, 1,0);
        $fpdf->Cell(30, 5,$scoreItem->id_octype, 1,0);
        $fpdf->Cell(30, 5,$scoreItem->id_discipl, 1,0);
        $fpdf->Cell(30, 5,$scoreItem->id_event, 1,0);
        $fpdf->ln();
    }
    $fpdf->Output();

});


















Route::get('/gg', function () {
    $group = grname_tables::all();
   foreach($group as $d) {
       echo $d->group_name.'<br>';
       echo '----------------<br>';
    foreach($d->groupAll as $groupAll){
        echo ''.$groupAll.'<br>';
    }
   }



});



Route::get('/rr', function () {
    $group = roles::all();
   foreach($group as $d) {
       echo $d.'<br>';
       echo '----------------<br>';
    // foreach($d->rolesForUs as $groupAll){
    //     echo ''.$groupAll.'<br>';
    // }
   }



});












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
