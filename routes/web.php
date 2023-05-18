<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpecilizationController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\NDoctorController;
use App\Http\Controllers\FDoctorController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DoucmentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TestimonialController;

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

Route::get('/', function () {return view('frontend.index');});
Route::get('/about', function () { return view('frontend.about'); });
Route::get('/contact', function () { return view('frontend.contact'); });
Route::get('/hospitals', function () { return view('frontend.hospitals'); });
Route::get('/hospital/details/{id}',[HospitalController::class, 'HospitalDetails'])->name('hospital.details');
Route::get('/doctor/details/{id}',[NDoctorController::class, 'DoctorDetails'])->name('doctor.details');
Route::get('/fdoctor/details/{id}',[FDoctorController::class, 'DoctorDetails'])->name('fdoctor.details');
Route::post('/store/message',[ContactController::class, 'StoreMessage'])->name('store.message');
Route::resource('Rates', RateController::class);
Route::resource('Doucments', DoucmentController::class);
Route::resource('Complaints', ComplaintController::class);
Route::post('/store/subscription',[SubscriptionController::class, 'StoreOne'])->name('store.sub');

Route::post('/search',[HospitalController::class, 'Search'])->name('search');

Route::middleware('auth')->group(function () {  
    Route::get('/requests', [RequestController::class, 'PatientRequests'])->name('patient.request');
    Route::get('download_file/{doucment}', [DoucmentController::class, 'downloadAttachment1'])->name('downloadAttachment2');
    Route::get('/tests', [TestController::class, 'PatientTests'])->name('patient.tests');
    Route::get('/dashboard',[UserController::class,'Dashboard'])->name('dashboard');
    Route::get('/user/logout',[UserController::class, 'destroy'])->name('user.logout');
    Route::get('/user/profile',[UserController::class, 'Profile'])->name('user.profile');
    Route::post('/update/profile',[userController::class, 'UpdateProfile'])->name('update.profile');
    Route::get('/change/password',[UserController::class, 'ChangePassword'])->name('user.change.password');
    Route::post('/update/password',[UserController::class, 'UpdatePassword'])->name('update.userpassword');
    
    Route::get('/my/complaints',[ComplaintController::class, 'MyComplaints'])->name('my.complaints');
    Route::get('/testimonials',[TestimonialController::class, 'MyTestimonials'])->name('user.testimoinals');
    Route::post('/store/testimonial',[TestimonialController::class, 'StoreTestimonial'])->name('store.testimonial');
});



Route::prefix('admin')->group(function(){
	Route::get('login',[AdminController::class,'Index'])->name('login_form');
	Route::post('/login/admin',[AdminController::class,'Login'])->name('admin.login');
	Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/change/password',[AdminController::class, 'ChangePassword'])->name('change.password')->middleware('admin');
    Route::post('/update/password',[AdminController::class, 'UpdatePassword'])->name('update.password')->middleware('admin');
    Route::get('/admin/profile',[AdminController::class, 'Profile'])->name('admin.profile')->middleware('admin');
    Route::post('/store/profile',[AdminController::class, 'StoreProfile'])->name('store.profile')->middleware('admin');

    Route::get('/all/admins',[AdminController::class, 'AllAdmins'])->name('all.admins')->middleware('admin');
    Route::post('/delete/admin/{id}',[AdminController::class, 'DeleteAdmin'])->name('delete.admin')->middleware('admin');
    Route::post('/add/admin',[AdminController::class,'AddAdmin'])->name('add.admin')->middleware('admin');

    Route::resource('Specilization', SpecilizationController::class);
    Route::resource('Features', FeaturesController::class);
    Route::resource('Hospitals', HospitalController::class);
    

    Route::get('/all/ndr',[AdminController::class, 'AllNDr'])->name('all.nationaldr')->middleware('admin');
    Route::post('/delete/ndr/{id}',[AdminController::class, 'DeleteNDr'])->name('delete.nationaldr')->middleware('admin');
    Route::post('/add/ndr',[AdminController::class,'AddNDr'])->name('add.nationaldr')->middleware('admin');
    Route::post('/edit/ndr/{id}',[AdminController::class, 'EditNDr'])->name('edit.nationaldr')->middleware('admin');

    Route::get('/all/fdr',[AdminController::class, 'AllFDr'])->name('all.forgindr')->middleware('admin');
    Route::post('/delete/fdr/{id}',[AdminController::class, 'DeleteFDr'])->name('delete.forgindr')->middleware('admin');
    Route::post('/add/fdr',[AdminController::class,'AddFDr'])->name('add.forgindr')->middleware('admin');
    Route::post('/edit/fdr/{id}',[AdminController::class, 'EditFDr'])->name('edit.forgindr')->middleware('admin');

    Route::get('/all/patients',[AdminController::class, 'AllPatients'])->name('all.patients')->middleware('admin');
    Route::post('/delete/patient/{id}',[AdminController::class, 'DeletePatient'])->name('delete.patient')->middleware('admin');

    Route::get('/doucments', [DoucmentController::class, 'AdminDoucments'])->name('admin.doucments')->middleware('admin');
    Route::get('download_file/{doucment}', [DoucmentController::class, 'downloadAttachment'])->name('downloadAttachment1')->middleware('admin');
    Route::post('/update/doucment',[DoucmentController::class, 'UpdateDoucment'])->name('update.doucment')->middleware('admin');

    Route::get('/tests', [TestController::class, 'AdminTests'])->name('admin.tests')->middleware('admin');
    Route::get('/requests', [RequestController::class, 'AdminRequests'])->name('admin.requests')->middleware('admin');

    Route::get('/reports', [ReportController::class, 'AdminReports'])->name('admin.reports')->middleware('admin');
    Route::get('/print/report/{id}',[ReportController::class, 'AdminPrintReport'])->name('print.report');

    Route::resource('Query', QueryController::class);

    Route::get('/all/messages',[ContactController::class, 'AllMessages'])->name('all.messages')->middleware('admin');
    Route::post('/delete/message/{id}',[ContactController::class, 'DeleteMessage'])->name('delete.message')->middleware('admin');

    Route::get('/testimonials',[TestimonialController::class, 'AllTestimonials'])->name('all.testimoinals');
    Route::post('/delete/testimonial/{id}',[TestimonialController::class, 'DeleteTestimonial'])->name('delete.testimonial')->middleware('admin');
    Route::post('/edit/testimonials/{id}',[TestimonialController::class, 'EditTestimonial'])->name('edit.testimonial')->middleware('admin');

    Route::get('/all/subscriptions',[SubscriptionController::class, 'AllSubscriptions'])->name('all.subscriptions')->middleware('admin');
    Route::post('/delete/subscribe/{id}',[SubscriptionController::class, 'DeleteSubscription'])->name('delete.subscripe')->middleware('admin');
});




Route::prefix('ndoctor')->group(function(){
	Route::get('login',[NDoctorController::class,'Index'])->name('ndoctor_form');
	Route::post('/login/ndoctor',[NDoctorController::class,'Login'])->name('ndoctor.login');
	Route::get('/dashboard',[NDoctorController::class,'Dashboard'])->name('ndoctor.dashboard')->middleware('ndoctor');
    Route::get('/logout',[NDoctorController::class,'NDoctorLogout'])->name('ndoctor.logout')->middleware('ndoctor');
    Route::get('/change/password',[NDoctorController::class, 'ChangePassword'])->name('change.ndpassword')->middleware('ndoctor');
    Route::post('/update/password',[NDoctorController::class, 'UpdatePassword'])->name('update.ndpassword')->middleware('ndoctor');
    Route::get('/ndoctor/profile',[NDoctorController::class, 'Profile'])->name('ndoctor.profile')->middleware('ndoctor');
    Route::post('/store/profile',[NDoctorController::class, 'StoreProfile'])->name('store.ndprofile')->middleware('ndoctor');
    Route::get('/complaints',[ComplaintController::class, 'DoctorComplaints'])->name('doctor.complaints')->middleware('ndoctor');

    Route::get('doctor/doucments', [DoucmentController::class, 'doctorDoucments'])->name('doctor.doucments')->middleware('ndoctor');
    Route::get('download_file/{doucment}', [DoucmentController::class, 'downloadAttachment'])->name('downloadAttachment')->middleware('ndoctor');

    Route::get('/tests', [TestController::class, 'DoctorTests'])->name('doctor.tests')->middleware('ndoctor');
    Route::post('/store/test',[TestController::class, 'StoreTest'])->name('store.test')->middleware('ndoctor');
    Route::get('/edit/test/{id}',[TestController::class, 'EditTest'])->name('edit.test')->middleware('ndoctor');
    Route::post('/update/test',[TestController::class, 'UpdateTest'])->name('update.test')->middleware('ndoctor');
    Route::get('/delete/test/{id}',[TestController::class, 'DeleteTest'])->name('delete.test')->middleware('ndoctor');

    Route::get('/requests', [RequestController::class, 'DoctorRequests'])->name('ndoctor.requests')->middleware('ndoctor');
    Route::post('/store/request',[RequestController::class, 'StoreRequestt'])->name('store.request')->middleware('ndoctor');
    Route::get('/delete/request/{id}',[RequestController::class, 'DeleteRequest'])->name('delete.request')->middleware('ndoctor');

    Route::get('/reports', [ReportController::class, 'NDoctorReports'])->name('ndoctor.reports')->middleware('ndoctor');
    Route::get('/print/report1/{id}',[ReportController::class, 'NDoctorPrintReport'])->name('print.report1')->middleware('ndoctor');
});

Route::prefix('fdoctor')->group(function(){
	Route::get('login',[FDoctorController::class,'Index'])->name('fdoctor_form');
	Route::post('/login/fdoctor',[FDoctorController::class,'Login'])->name('fdoctor.login');
	Route::get('/dashboard',[FDoctorController::class,'Dashboard'])->name('fdoctor.dashboard')->middleware('fdoctor');
    Route::get('/logout',[FDoctorController::class,'FDoctorLogout'])->name('fdoctor.logout')->middleware('fdoctor');
    Route::get('/change/password',[FDoctorController::class, 'ChangePassword'])->name('change.fdpassword')->middleware('fdoctor');
    Route::post('/update/password',[FDoctorController::class, 'UpdatePassword'])->name('update.fdpassword')->middleware('fdoctor');
    Route::get('/fdoctor/profile',[FDoctorController::class, 'Profile'])->name('fdoctor.profile')->middleware('fdoctor');
    Route::post('/store/profile',[FDoctorController::class, 'StoreProfile'])->name('store.fdprofile')->middleware('fdoctor');

    Route::get('/requests', [RequestController::class, 'FDoctorRequests'])->name('fdoctor.requests')->middleware('fdoctor');
    Route::get('/view/request/{id}',[RequestController::class, 'ViewRequest'])->name('view.request')->middleware('fdoctor');
    Route::post('/update/request',[RequestController::class, 'UpdateRequest'])->name('update.request')->middleware('fdoctor');

    Route::get('/reports', [ReportController::class, 'FDoctorReports'])->name('fdoctor.reports')->middleware('fdoctor');
    Route::post('/store/report',[ReportController::class, 'StoreReport'])->name('store.report')->middleware('fdoctor');
    Route::get('/delete/report/{id}',[ReportController::class, 'DeleteReport'])->name('delete.report')->middleware('fdoctor');
    Route::get('/print/report2/{id}',[ReportController::class, 'FDoctorPrintReport'])->name('print.report2')->middleware('fdoctor');
});



require __DIR__.'/auth.php';
