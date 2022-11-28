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

use App\User;


Auth::routes();
Route::group(['middleware' => ['Auth']], function () {

    Route::post('/Update_Profile', 'Admin\UserController@Update_Profile');

//systemVacation
    Route::post('/systemVacation', 'Admin\VacationsController@update');

//    shift settings
    Route::post('shiftsetting/update', 'Admin\ShiftSettingsController@update');
//update emp shifts
    Route::post('/update_User_shifts', 'Admin\EmpShiftController@setShifts');
// attendance
    Route::post('import', 'Admin\ArchievsController@importExcel');
//monthly search


    Route::post('/Store_Category', 'Admin\CategoryController@store');
    Route::post('/Update_Category', 'Admin\CategoryController@update');
    Route::get('/Delete_Category', 'Admin\CategoryController@delete');


    Route::post('/Store_User', 'Admin\UserController@store');
    Route::get('/Delete_User', 'Admin\UserController@delete');
    Route::get('/UpdateStatusUser', 'Admin\UserController@UpdateStatusUser');
    Route::post('/Update_User', 'Admin\UserController@update');
    Route::post('/Update_User_Notation', 'Admin\UserController@Update_User_Notation');
    Route::post('/UserUpdateContractDate', 'Admin\UserController@UserUpdateContractDate');

    Route::post('/Store_Nationality', 'Admin\NationalityController@store');
    Route::get('/Delete_Nationality', 'Admin\NationalityController@delete');
    Route::post('/Update_Nationality', 'Admin\NationalityController@update');


    Route::post('/Store_UserAttachment', 'Admin\UserAttachmentController@store');
    Route::get('/Delete_UserAttachment', 'Admin\UserAttachmentController@delete');

    Route::post('/Store_Setting', 'Admin\SettingController@store');
    Route::get('/Delete_Setting', 'Admin\SettingController@delete');
    Route::post('/Update_Setting', 'Admin\SettingController@update');

    Route::post('/Store_Language', 'Admin\LanguageController@store');
    Route::get('/Delete_Language', 'Admin\LanguageController@delete');
    Route::post('/Update_Language', 'Admin\LanguageController@update');

    Route::post('/Store_Log', 'Admin\LogController@store');
    Route::get('/Delete_Log', 'Admin\LogController@delete');
    Route::post('/Update_Log', 'Admin\LogController@update');


    Route::post('/storeOutExport', 'Admin\InboxController@storeOutExport');

    Route::post('/Store_inbox', 'Admin\InboxController@store');
    Route::post('/Update_inbox', 'Admin\InboxController@Update_inbox');
    Route::post('/storeOutBox', 'Admin\InboxController@storeOutBox');

    Route::post('/Store_UserRole', 'Admin\UserRolesController@store');
    Route::post('/Update_UserRole', 'Admin\UserRolesController@update');
    Route::get('/Delete_UserRole', 'Admin\UserRolesController@delete');

    Route::post('/askpermission', 'Admin\AskPermissionController@store');
    Route::post('/vacationrequest', 'Admin\VacationRequestController@store');
    Route::post('/updateaskpermission/{id}', 'Admin\AskPermissionController@update');
    Route::post('/updatevacation/{id}', 'Admin\VacationRequestController@update');


});
Route::get('/home', 'HomeController@test')->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'Auth']], function () {
    Route::get('/resources/Users', 'Admin\UserController@index');
    Route::get('/resources/getUsersWhereDate/{id}', 'Admin\UserController@getUsersWhereDate');
    Route::get('/resources/getUsersWhereType/{id}', 'Admin\UserController@getUsersWhereType');

    Route::get('/resources/Search_User', 'Admin\UserController@Search_User');

    Route::get('/Edit_User', 'Admin\UserController@edit');
    Route::get('/Edit_User_notation', 'Admin\UserController@Edit_User_notation');

    Route::get('/resources/UserAttachment/{id}', 'Admin\UserAttachmentController@index');
    Route::get('/changeDate', 'Admin\UserController@changeDate');
    Route::get('/', 'Admin\UserController@admin_index');


    Route::get('/settings', function () {
        return view('Admin.settings');
    });

    Route::get('/settings/InboxSetting', function () {
        return view('Admin.InboxSetting');
    });
    Route::get('/settings/HRSetting', function () {
        return view('Admin.HRSetting');
    });
    Route::get('/settings/HumanSetting', function () {
        return view('Admin.HumanSetting');
    });

    Route::get('/Profile', 'Admin\UserController@Profile');
    Route::get('/viewProfile/{id}', 'Admin\UserController@view');

    Route::get('/transactions', function () {
        return view('Admin.transactions');
    });

    Route::get('/copanel', function () {
        return view('Admin.copanel');
    });

    Route::get('/resources', function () {
        return view('Admin.resources');
    });


    // Categories Contorller
    Route::get('/resources/CategoriesTree', 'Admin\CategoryController@CategoriesTree');
    Route::get('/resources/Categories', 'Admin\CategoryController@index');
    Route::get('/resources/CategorySearch', 'Admin\CategoryController@CategorySearch');
    Route::get('/Edit_Category', 'Admin\CategoryController@edit');

    //Bounses
    Route::get('/resources/Bounses', 'Admin\BonusesController@index');
    Route::post('/Store_Bonuses', 'Admin\BonusesController@store');
    Route::post('/Update_Bonuses', 'Admin\BonusesController@update');
    Route::get('/Delete_Bonuses', 'Admin\BonusesController@delete');
    Route::get('/copanel/Bonuses-datatable', 'Admin\BonusesController@datatable')->name('BounsesDatatable');
    Route::get('/Edit_Bonuses/{id}', 'Admin\BonusesController@edit');
    Route::get('/buttons_Bonuses', function () {
        return view('Admin.Bonuses.buttons');
    });

//system vacation
    Route::get('/resources/systemVacation', 'Admin\VacationsController@index');
//shifts
    Route::get('/resources/shifts', 'Admin\ShiftsController@index');
    Route::get('/resources/Edit_shifts', 'Admin\ShiftsController@edit');
    Route::get('/User_shifts', 'Admin\EmpShiftController@getAllShifts');
    Route::post('/shifts', 'Admin\ShiftsController@store');
    Route::post('/Update_shifts', 'Admin\ShiftsController@update');
    Route::get('/Delete_shifts', 'Admin\ShiftsController@delete');
    Route::get('/copanel/shifts-datatable', 'Admin\ShiftsController@datatable')->name('shiftsDatatable');
    Route::get('/Edit_shifts/{id}', 'Admin\ShiftsController@edit');
    Route::get('/buttons_shifts', function () {
        return view('Admin.shifts.buttons');
    });
//shif_ settings
    Route::get('shiftsettings/{id}', 'Admin\ShiftSettingsController@viewShiftSettings');
    Route::get('/shiftsettings', 'Admin\ShiftSettingsController@edit');

//Banks
    Route::get('/settings/Banks', 'Admin\BankController@index');
    Route::post('/Store_Bank', 'Admin\BankController@store');
    Route::post('/Update_Bank', 'Admin\BankController@update');
    Route::get('/Delete_Bank', 'Admin\BankController@delete');
    Route::get('/copanel/Banks-datatable', 'Admin\BankController@datatable')->name('BanksDatatable');
    Route::get('/Edit_Banks/{id}', 'Admin\BankController@edit');
    Route::get('/buttons_Banks', function () {
        return view('Admin.Bank.buttons');
    });

//Branches
    Route::get('/settings/Branches', 'Admin\BrancheController@index');
    Route::post('/Store_Branch', 'Admin\BrancheController@store');
    Route::post('/Update_Branch', 'Admin\BrancheController@update');
    Route::get('/Delete_Branch', 'Admin\BrancheController@delete');
    Route::get('/copanel/Branch-datatable', 'Admin\BrancheController@datatable')->name('BranchDatatable');
    Route::get('/Edit_Branch/{id}', 'Admin\BrancheController@edit');
    Route::get('/buttons_Branch', function () {
        return view('Admin.Branch.buttons');
    });
//Insurance
    Route::get('/settings/Insurance', 'Admin\InsuranceController@index');
    Route::post('/Store_Insurance', 'Admin\InsuranceController@store');
    Route::post('/Update_Insurance', 'Admin\InsuranceController@update');
    Route::get('/Delete_Insurance', 'Admin\InsuranceController@delete');
    Route::get('/copanel/Insurance-datatable', 'Admin\InsuranceController@datatable')->name('InsuranceDatatable');
    Route::get('/Edit_Insurance/{id}', 'Admin\InsuranceController@edit');
    Route::get('/buttons_Insurance', function () {
        return view('Admin.Insurance.buttons');
    });

    Route::get('/resources/Search_Job', 'Admin\JobController@Search_Job');
    Route::get('/resources/Jobs', 'Admin\JobController@index');
    Route::get('/Edit_Job', 'Admin\JobController@edit');
    Route::post('/Store_Job', 'Admin\JobController@store');
    Route::get('/Delete_Job', 'Admin\JobController@delete');
    Route::post('/Update_Job', 'Admin\JobController@update');

//JobTypes
    Route::post('/Store_JobType', 'Admin\JobTypeController@store');
    Route::get('/Delete_JobType', 'Admin\JobTypeController@delete');
    Route::post('/Update_JobType', 'Admin\JobTypeController@update');
    Route::get('/settings/JobType', 'Admin\JobTypeController@index');
    Route::get('/copanel/JobType-datatable', 'Admin\JobTypeController@datatable')->name('JobTypeDatatable');
    Route::get('/Edit_JobType/{id}', 'Admin\JobTypeController@edit');
    Route::get('/buttons_JobType', function () {
        return view('Admin.JobType.buttons');
    });
//Nationality
    Route::get('/settings/Nationality', 'Admin\NationalityController@index');
    Route::get('/copanel/Nationality-datatable', 'Admin\NationalityController@datatable')->name('NationalityDatatable');
    Route::get('/Edit_Nationality/{id}', 'Admin\NationalityController@edit');
    Route::get('/buttons_Nationality', function () {
        return view('Admin.Nationality.buttons');
    });
//AttachmentCategory
    Route::get('/settings/AttachmentCategory', 'Admin\AttachmentCategoryController@index');
    Route::post('/Store_AttachmentCategory', 'Admin\AttachmentCategoryController@store');
    Route::get('/Delete_AttachmentCategory', 'Admin\AttachmentCategoryController@delete');
    Route::post('/Update_AttachmentCategory', 'Admin\AttachmentCategoryController@update');
    Route::get('/copanel/AttachmentCategory-datatable', 'Admin\AttachmentCategoryController@datatable')->name('AttachmentCategoryDatatable');
    Route::get('/Edit_AttachmentCategory/{id}', 'Admin\AttachmentCategoryController@edit');
    Route::get('/buttons_AttachmentCategory', function () {
        return view('Admin.AttachmentCategory.buttons');
    });

//CategoryUnits
    Route::post('/Store_CategoryUnits', 'Admin\CategoryUnitsController@store');
    Route::get('/Delete_CategoryUnits', 'Admin\CategoryUnitsController@delete');
    Route::post('/Update_CategoryUnits', 'Admin\CategoryUnitsController@update');
    Route::get('/settings/CategoryUnits', 'Admin\CategoryUnitsController@index');
    Route::get('/copanel/CategoryUnits-datatable', 'Admin\CategoryUnitsController@datatable')->name('CategoryUnitsDatatable');
    Route::get('/Edit_CategoryUnits/{id}', 'Admin\CategoryUnitsController@edit');
    Route::get('/buttons_CategoryUnits', function () {
        return view('Admin.CategoryUnits.buttons');
    });

    Route::get('/copanel/Setting', 'Admin\SettingController@index');
    Route::get('/Edit_Setting', 'Admin\SettingController@edit');

    Route::get('/copanel/UserRole', 'Admin\UserRolesController@index');
    Route::get('/copanel/UserRole-datatable', 'Admin\UserRolesController@datatable')->name('UserRoleDatatable');
    Route::get('/Edit_UserRole/{id}', 'Admin\UserRolesController@edit');
    Route::get('/buttons_UserRole', function () {
        return view('Admin.UserRole.buttons');
    });

    Route::get('/copanel/Languages', 'Admin\LanguageController@index');
    Route::get('/copanel/Language-datatable', 'Admin\LanguageController@datatable')->name('LanguageDatatable');
    Route::get('/Edit_Language/{id}', 'Admin\LanguageController@edit');
    Route::get('/buttons_Language', function () {
        return view('Admin.Language.buttons');
    });

    Route::get('/copanel/Logs', 'Admin\LogController@index');
    Route::get('/Edit_Log', 'Admin\LogController@edit');
    Route::get('/copanel/Logs-datatable', 'Admin\LogController@datatable')->name('LogsDatatable');
    Route::get('/Edit_Logs/{id}', 'Admin\LogController@edit');
    Route::get('/buttons_Logs', function () {
        return view('Admin.Log.buttons');
    });
//inboxProcessType
    Route::get('/settings/inboxProcessType', 'Admin\InboxProcessTypeController@index');
    Route::post('/Store_InboxProcessType', 'Admin\InboxProcessTypeController@store');
    Route::get('/Delete_InboxProcessType', 'Admin\InboxProcessTypeController@delete');
    Route::post('/Update_InboxProcessType', 'Admin\InboxProcessTypeController@update');
    Route::get('/copanel/InboxProcessType-datatable', 'Admin\InboxProcessTypeController@datatable')->name('InboxProcessTypeDatatable');
    Route::get('/settings/Edit_InboxProcessType/{id}', 'Admin\InboxProcessTypeController@edit')->name('InboxProcessType.edit');
    Route::get('/buttons_InboxProcessType', function () {
        return view('Admin.inboxProcessType.buttons');
    });

//inboxThirdParty
    Route::get('/settings/inboxThirdParty', 'Admin\InboxThirdPartyController@index');
    Route::post('/Store_inboxThirdParty', 'Admin\InboxThirdPartyController@store');
    Route::get('/Delete_inboxThirdParty', 'Admin\InboxThirdPartyController@delete');
    Route::post('/Update_inboxThirdParty', 'Admin\InboxThirdPartyController@update');
    Route::get('/copanel/inboxThirdParty-datatable', 'Admin\InboxThirdPartyController@datatable')->name('inboxThirdPartyDatatable');
    Route::get('/settings/Edit_inboxThirdParty/{id}', 'Admin\InboxThirdPartyController@edit')->name('inboxThirdParty.edit');
    Route::get('/buttons_inboxThirdParty', function () {
        return view('Admin.inboxThirdParty.buttons');
    });
//inboxType
    Route::get('/settings/inboxType', 'Admin\InboxTypeController@index');
    Route::post('/Store_inboxType', 'Admin\InboxTypeController@store');
    Route::get('/Delete_inboxType', 'Admin\InboxTypeController@delete');
    Route::post('/Update_inboxType', 'Admin\InboxTypeController@update');
    Route::get('/checkType', 'Admin\InboxTypeController@checkType');
    Route::get('/copanel/inboxType-datatable', 'Admin\InboxTypeController@datatable')->name('inboxTypeDatatable');
    Route::get('/settings/Edit_inboxType/{id}', 'Admin\InboxTypeController@edit')->name('inboxType.edit');
    Route::get('/buttons_inboxType', function () {
        return view('Admin.inboxType.buttons');
    });
//InboxGroup
    Route::get('/settings/InboxGroup', 'Admin\InboxGroupController@index');
    Route::post('/Store_InboxGroup', 'Admin\InboxGroupController@store');
    Route::get('/Delete_InboxGroup', 'Admin\InboxGroupController@delete');
    Route::post('/Update_InboxGroup', 'Admin\InboxGroupController@update');
    Route::get('/copanel/InboxGroup-datatable', 'Admin\InboxGroupController@datatable')->name('InboxGroupDatatable');
    Route::get('/settings/Edit_InboxGroup/{id}', 'Admin\InboxGroupController@edit')->name('InboxGroup.edit');
    Route::get('/buttons_InboxGroup', function () {
        return view('Admin.InboxGroup.buttons');
    });
//InboxGroupMembers
    Route::get('/settings/InboxGroupMembers/{id}', 'Admin\InboxGroupMembersController@index');
    Route::post('/Store_InboxGroupMembers', 'Admin\InboxGroupMembersController@store');
    Route::get('/Delete_InboxGroupMembers', 'Admin\InboxGroupMembersController@delete');
    Route::post('/Update_InboxGroupMembers', 'Admin\InboxGroupMembersController@update');
    Route::get('/copanel/InboxGroupMembers-datatable/{id}', 'Admin\InboxGroupMembersController@datatable')->name('InboxGroupMembersDatatable');
    Route::get('/settings/Edit_InboxGroupMembers/{id}', 'Admin\InboxGroupMembersController@edit')->name('InboxGroupMembers.edit');
    Route::get('/buttons_InboxGroupMembers', function () {
        return view('Admin.InboxGroupMembers.buttons');
    });

    Route::get('/Edit_UserinboxGroup', 'Admin\InboxGroupController@Edit_UserinboxGroup');
    Route::get('/GetMemebers', 'Admin\InboxGroupController@GetMemebers');
    Route::get('/GetDefaultMemebers', 'Admin\InboxGroupController@GetDefaultMemebers');
    Route::get('/GetDefaultMemebers2', 'Admin\InboxGroupController@GetDefaultMemebers2');
    Route::get('/GetMemebers2', 'Admin\InboxGroupController@GetMemebers2');
    Route::get('/GetMemebers21', 'Admin\InboxGroupController@GetMemebers21');
    Route::post('/Update_UserinboxGroup', 'Admin\InboxGroupController@Update_UserinboxGroup');

    Route::get('/signatureLetter', 'Admin\InboxController@signatureLetter');
    Route::get('/assginLeter', 'Admin\InboxController@assginLeter');
    Route::get('/assginLeterOut', 'Admin\InboxController@assginLeterOut');

    Route::get('/Letter/{id}', 'Admin\InboxController@Letter');
    Route::get('/transactions/inbox', 'Admin\InboxController@index');
    Route::get('/transactions/inboxSearch', 'Admin\InboxController@inboxSearch');


    Route::get('/transactions/OutExport', 'Admin\InboxController@OutExport');
    Route::get('/transactions/OutExport_details/{id}', 'Admin\InboxController@OutExport_details');
    Route::get('/transactions/CreateOutExport', 'Admin\InboxController@CreateOutExport');
    Route::get('/transactions/OutExportSearch', 'Admin\InboxController@OutExportSearch');


    Route::get('/transactions/outbox', 'Admin\InboxController@outbox');
    Route::get('/transactions/outBoxSearch', 'Admin\InboxController@outBoxSearch');

    Route::get('/transactions/archiveinbox', 'Admin\InboxController@archiveinbox');
    Route::get('/transactions/archiveinboxSearch', 'Admin\InboxController@archiveinboxSearch');

    Route::get('/transactions/archiveoutbox', 'Admin\InboxController@archiveoutbox');
    Route::get('/transactions/archiveoutboxSearch', 'Admin\InboxController@archiveoutboxSearch');

    Route::get('/transactions/search', 'Admin\InboxController@Search');
    Route::get('/transactions/AdvancedSearch', 'Admin\InboxController@AdvancedSearch');

    Route::get('/transactions/secretSearch', 'Admin\InboxController@secretSearch');
    Route::get('/transactions/AdvancedsecretSearch', 'Admin\InboxController@AdvancedsecretSearch');


    Route::get('/transactions/outbox_Create', 'Admin\InboxController@outbox_Create');
    Route::get('/transactions/outbox_Create2/{data}', 'Admin\InboxController@outbox_Create');
    Route::get('/transactions/Outbound_details/{id}', 'Admin\InboxController@Outbound_details');

    Route::get('/transactions/inbox_details/{id}', 'Admin\InboxController@inbox_details');
    Route::get('/transactions/inbox_Create', 'Admin\InboxController@Create');
    Route::get('/transactions/outbox_send', 'Admin\InboxController@outbox_send');
    Route::get('/report', 'Admin\design@report');

    Route::get('/askpermission', 'Admin\AskPermissionController@index');
    Route::get('/askpermission/{id}', 'Admin\AskPermissionController@edit');
    Route::get('/vacationrequest', 'Admin\VacationRequestController@index');
    Route::get('/vacationrequest/{id}', 'Admin\VacationRequestController@edit');

    Route::get('requestslist', 'Admin\RequestsController@index');
    Route::get('HRRequestList', 'Admin\RequestsController@HRRequestList');
    Route::get('requestslists', 'Admin\RequestsController@store');

    Route::get('myrequests', 'Admin\myRequestsController@index');
    Route::get('myrequetsearch', 'Admin\myRequestsController@store');

    Route::get('/reports', function () {
        return view('Admin.reports');
    });
    Route::get('reports/archieves', 'Admin\ArchievsController@index');
    Route::get('reports/archieves-search', 'Admin\ArchievsController@store');

    Route::get('reports/monthly', 'Admin\MonthlyReportController@index');
    Route::get('mothlyreport', 'Admin\MonthlyReportController@store');
    Route::get('printmonthlyreport', 'Admin\MonthlyReportController@export_pdf');

    Route::get('dailyreport', 'Admin\DailyReportController@store');
    Route::get('dailyreport', 'Admin\DailyReportController@index');
    Route::get('printdailyreport', 'Admin\DailyReportController@export_pdf');


});
Route::post('/UserLogin', 'Admin\UserController@login');
Route::post('/store_event', 'Admin\EventsController@store');
Route::get('/logout', 'Admin\UserController@logout');
Route::get('/changePass', 'Admin\UserController@changePass');
Route::get('/getHolidays', 'Admin\AskPermissionController@getHolidays');

Route::get('/check', function () {
    Artisan::call('notification:send');
});
