<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdvancedSalaryController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;



Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



//employee route.................... 
Route::get('/add-employee', [EmployeeController::class, 'add_employee']);
Route::post('/insert-employee', [EmployeeController::class, 'store']);
Route::get('/all-employee', [EmployeeController::class, 'all_employee']);
Route::get('/view-employee/{id}', [EmployeeController::class, 'view_employee']);
Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete_employee']);
Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit_employee']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'update_employee']);


//customer route.................... 
Route::get('/add-customer', [CustomerController::class, 'add_customer']);
Route::post('/insert-customer', [CustomerController::class, 'store']);
Route::get('/all-customer', [CustomerController::class, 'all_customer']);
Route::get('/view-customer/{id}', [CustomerController::class, 'view_customer']);
Route::get('/delete-customer/{id}', [CustomerController::class, 'delete_customer']);
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit_customer']);
Route::post('/update-customer/{id}', [CustomerController::class, 'update_customer']);


//supplier route.................... 
Route::get('/add-supplier', [SupplierController::class, 'add_supplier']);
Route::post('/insert-supplier', [SupplierController::class, 'store']);
Route::get('/all-supplier', [SupplierController::class, 'all_supplier']);
Route::get('/view-supplier/{id}', [SupplierController::class, 'view_supplier']);
Route::get('/delete-supplier/{id}', [SupplierController::class, 'delete_supplier']);
Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit_supplier']);
Route::post('/update-supplier/{id}', [SupplierController::class, 'update_supplier']);


//salary route.................... 
Route::get('/add-advanced_salary', [AdvancedSalaryController::class, 'add_advanced_salary']);
Route::post('/insert-advanced_salary', [AdvancedSalaryController::class, 'store']);
Route::get('/all-advanced_salary', [AdvancedSalaryController::class, 'all_advanced_salary']);
Route::get('/delete-advanced_salary/{id}', [AdvancedSalaryController::class, 'delete_advanced_salary']);
Route::get('/pay-salary', [SalaryController::class, 'pay_salary']);
Route::get('/pay-now/{id}', [SalaryController::class, 'pay_now']);
Route::post('/insert-pay_now', [SalaryController::class, 'insert_pay_now']);
Route::get('/all-salary', [SalaryController::class, 'all_salary']);
Route::get('/view-salary/{salary_month}', [SalaryController::class, 'view_salary']);


//category route.................... 
Route::get('/add-category', [CategoryController::class, 'add_category']);
Route::post('/insert-category', [CategoryController::class, 'store']);
Route::get('/all-category', [CategoryController::class, 'all_category']);
Route::get('/view-category/{id}', [CategoryController::class, 'view_category']);
Route::get('/delete-category/{id}', [CategoryController::class, 'delete_category']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit_category']);
Route::post('/update-category/{id}', [CategoryController::class, 'update_category']);


//product route.................... 
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::post('/insert-product', [ProductController::class, 'store']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/view-product/{id}', [ProductController::class, 'view_product']);
Route::get('/delete-product/{id}', [ProductController::class, 'delete_product']);
Route::get('/edit-product/{id}', [ProductController::class, 'edit_product']);
Route::post('/update-product/{id}', [ProductController::class, 'update_product']);


//excel import export route.................... 
Route::get('/import-product', [ProductController::class, 'import_product']);
Route::post('/import', [ProductController::class, 'import']);
Route::get('/export-product', [ProductController::class, 'export']);

//expense route.................... 
Route::get('/add-expense', [ExpenseController::class, 'add_expense']);
Route::post('/insert-expense', [ExpenseController::class, 'store']);
Route::get('/today-expense', [ExpenseController::class, 'today_expense']);
Route::get('/view-expense/{id}', [ExpenseController::class, 'view_expense']);
Route::get('/delete-expense/{id}', [ExpenseController::class, 'delete_expense']);
Route::get('/edit-expense/{id}', [ExpenseController::class, 'edit_expense']);
Route::post('/update-expense/{id}', [ExpenseController::class, 'update_expense']);
Route::get('/monthly-expense', [ExpenseController::class, 'monthly_expense']);
Route::get('/yearly-expense', [ExpenseController::class, 'yearly_expense']);
Route::get('/january-expense', [ExpenseController::class, 'january_expense']);
Route::get('/february-expense', [ExpenseController::class, 'february_expense']);
Route::get('/march-expense', [ExpenseController::class, 'march_expense']);
Route::get('/april-expense', [ExpenseController::class, 'april_expense']);
Route::get('/may-expense', [ExpenseController::class, 'may_expense']);
Route::get('/june-expense', [ExpenseController::class, 'june_expense']);
Route::get('/july-expense', [ExpenseController::class, 'july_expense']);
Route::get('/august-expense', [ExpenseController::class, 'august_expense']);
Route::get('/september-expense', [ExpenseController::class, 'september_expense']);
Route::get('/october-expense', [ExpenseController::class, 'october_expense']);
Route::get('/november-expense', [ExpenseController::class, 'november_expense']);
Route::get('/december-expense', [ExpenseController::class, 'december_expense']);



//attendence route.................... 
Route::get('/take-attendence', [AttendenceController::class, 'take_attendence']);
Route::post('/insert-attendence', [AttendenceController::class, 'store']);
Route::get('/all-attendence', [AttendenceController::class, 'all_attendence']);
Route::get('/view-attendence/{edit_date}', [AttendenceController::class, 'view_attendence']);
Route::get('/delete-attendence/{edit_date}', [AttendenceController::class, 'delete_attendence']);
Route::get('/edit-attendence/{edit_date}', [AttendenceController::class, 'edit_attendence']);
Route::post('/update-attendence', [AttendenceController::class, 'update_attendence']);


//settings route.................... 
Route::get('/website-settings', [SettingsController::class, 'website_settings']);
Route::post('/update-settings/{id}', [SettingsController::class, 'update_settings']);


//pos route.................... 
Route::get('/pos', [PosController::class, 'index']);
Route::get('/pending-order', [PosController::class, 'pending_order']);
Route::get('/view-order-status/{id}', [PosController::class, 'view_order']);
Route::get('/order-confirm/{id}', [PosController::class, 'order_confirm']);
Route::get('/success-order', [PosController::class, 'success_order']);



//cart route....................
Route::post('/add-cart', [CartController::class, 'index']);
Route::post('/update-cart/{rowId}', [CartController::class, 'update_cart']);
Route::get('/remove-cart/{rowId}', [CartController::class, 'remove_cart']);
Route::post('/create-invoice', [CartController::class, 'create_invoice']);
Route::post('/insert-invoice', [CartController::class, 'insert_invoice']);


