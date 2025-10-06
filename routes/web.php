<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\FinancialYearController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\InvoiceTypeController;
use App\Http\Controllers\ReportTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ConsigneeController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\QuarterController;
use App\Http\Controllers\StockLocationController;
use App\Http\Controllers\LUTMasterController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\RoleMasterController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientTypeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PurchaseInvoiceController;
use App\Http\Controllers\ReferenceController;  
use App\Http\Controllers\MakeController;   
use App\Http\Controllers\AttributeDetails;   
use App\Http\Controllers\AttributeValueController;   
use App\Http\Controllers\ModelDetailsController;   
use App\Http\Controllers\PurchasePayementController;  
use App\Http\Controllers\ClientNameController; 
use App\Http\Controllers\QuatationsController;   
use App\Http\Controllers\AMCStampingQuotation;
use App\Http\Controllers\ContractAMCController; 
use App\Http\Controllers\EmployeeDetailsController;   
use App\Http\Controllers\ServiceContractStampingController;   
use App\Http\Controllers\ServiceContractServiceController;   
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\InwardController;  
use App\Http\Controllers\ProformaController;
use App\Http\Controllers\SaleInvoicController; 
use App\Http\Controllers\SalePaymentController;





Route::get('/', [LoginController::class, 'Login'])->name('login.page');
Route::post('login-submit', [LoginController::class, 'login_post'])->name('login.submit');

//Dahboard//
Route::get('/masters', [DashboardController::class, 'index'])->name('dashboard.index');

//
// Company Details Masters 
Route::get('/masters/company-details/', [CompanyDetailController::class, 'index'])->name('masters.company-details.company-details');
Route::post('/masters/company-details/', [CompanyDetailController::class, 'store'])->name('masters.company-details.store');
Route::get('/masters/company-details/view-file', [CompanyDetailController::class, 'view'])->name('masters.company-details.view-file');
Route::get('/masters/company-details/{id}/edit', [CompanyDetailController::class, 'edit'])->name('masters.company-details.edit');
Route::put('/masters/company-details/{id}', [CompanyDetailController::class, 'update'])->name('masters.company-details.update');
Route::delete('/masters/company-details/{id}', [CompanyDetailController::class, 'destroy'])->name('masters.company-details.destroy');

// Financial year

Route::group(['prefix'=>'/masters/financial-year','as'=>'financial.'], function(){

Route::get('/', [FinancialYearController::class, 'create'])->name('create');
Route::post('/', [FinancialYearController::class, 'store'])->name('store');
Route::get('/view', [FinancialYearController::class, 'index'])->name('index');
Route::get('/delete/{id}', [FinancialYearController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [FinancialYearController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [FinancialYearController::class, 'update'])->name('update');


});


//  Tax //

Route::group(['prefix'=>'/masters/tex-details','as'=>'tax.'], function(){

Route::get('/', [TaxController::class, 'index'])->name('index');
Route::post('/', [TaxController::class, 'store'])->name('store');
Route::get('/view', [TaxController::class, 'view'])->name('list');
Route::get('/delete/{id}', [TaxController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [TaxController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [TaxController::class, 'update'])->name('update');


});



///


// Invoice type//

Route::group(['prefix'=>'/masters/invoice-type','as'=>'invoice.'], function(){

Route::get('/', [InvoiceTypeController::class, 'create'])->name('create');
Route::post('/', [InvoiceTypeController::class, 'store'])->name('store');
Route::get('/view', [InvoiceTypeController::class, 'index'])->name('index');
Route::get('/edit/{id}', [InvoiceTypeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [InvoiceTypeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [InvoiceTypeController::class, 'destroy'])->name('delete');


});

///


// Report Type

Route::group(['prefix'=>'/masters/report-type','as'=>'report.'], function(){
Route::get('/', [ReportTypeController::class, 'create'])->name('create');
Route::get('/view', [ReportTypeController::class, 'index'])->name('index');
Route::get('/delete/{id}', [ReportTypeController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [ReportTypeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ReportTypeController::class, 'update'])->name('update');
Route::post('/', [ReportTypeController::class, 'store'])->name('store');

});

///


// Expense Type///
Route::group(['prefix'=>'/masters/expense-type','as'=>'expense.'], function(){
Route::get('/', [ExpenseTypeController::class, 'create'])->name('create');
Route::get('/view', [ExpenseTypeController::class, 'index'])->name('index');
Route::post('/', [ExpenseTypeController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ExpenseTypeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ExpenseTypeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ExpenseTypeController::class, 'destroy'])->name('delete');

});

////



/// Buyer //

Route::group(['prefix'=>'/masters/buyer','as'=>'buyer.'], function(){
Route::get('/', [BuyerController::class, 'create'])->name('create');
Route::get('/view', [BuyerController::class, 'index'])->name('index');
Route::post('/', [BuyerController::class, 'store'])->name('store');
Route::get('/edit/{id}', [BuyerController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [BuyerController::class, 'update'])->name('update');
Route::get('/delete/{id}', [BuyerController::class, 'destroy'])->name('delete');

});

////

//// consignee//

Route::group(['prefix'=>'/masters/consignee-name','as'=>'consignee.'], function(){
Route::get('/', [ConsigneeController::class, 'create'])->name('create');
Route::get('/view', [ConsigneeController::class, 'index'])->name('index');
Route::post('/', [ConsigneeController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ConsigneeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ConsigneeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ConsigneeController::class, 'destroy'])->name('delete');

});


////

// reminder//

Route::group(['prefix'=>'/masters/reminder','as'=>'reminder.'], function(){

Route::get('/', [ReminderController::class, 'create'])->name('create');
Route::get('/view', [ReminderController::class, 'index'])->name('index');
Route::post('/', [ReminderController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ReminderController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ReminderController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ReminderController::class, 'destroy'])->name('delete');

});


///

//account//

Route::group(['prefix'=>'/masters/account','as'=>'account.'], function(){

Route::get('/', [AccountController::class, 'create'])->name('create');
Route::get('/view', [AccountController::class, 'index'])->name('index');
Route::post('/', [AccountController::class, 'store'])->name('store');
Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AccountController::class, 'update'])->name('update');
Route::get('/delete/{id}', [AccountController::class, 'destroy'])->name('delete');

});

//


/// currency //

Route::group(['prefix'=>'/masters/currency','as'=>'currency.'], function(){

Route::get('/', [CurrencyController::class, 'create'])->name('create');
Route::get('/view', [CurrencyController::class, 'index'])->name('index');
Route::post('/', [CurrencyController::class, 'store'])->name('store');
Route::get('/edit/{id}', [CurrencyController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [CurrencyController::class, 'update'])->name('update');
Route::get('/delete/{id}', [CurrencyController::class, 'destroy'])->name('delete');

});


///


//Quarter Master
Route::group(['prefix'=>'/masters/quarter','as'=>'quarter.'], function(){

Route::get('/', [QuarterController::class, 'create'])->name('create');
Route::get('/view', [QuarterController::class, 'index'])->name('index');
Route::post('/', [QuarterController::class, 'store'])->name('store');
Route::get('/edit/{id}', [QuarterController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [QuarterController::class, 'update'])->name('update');
Route::get('/delete/{id}', [QuarterController::class, 'destroy'])->name('delete');

});
//
// location master
Route::group(['prefix'=>'/masters/location-stock','as'=>'location.'], function(){

Route::get('/', [StockLocationController::class, 'create'])->name('create');
Route::get('/view', [StockLocationController::class, 'index'])->name('index');
Route::post('/', [StockLocationController::class, 'store'])->name('store');
Route::get('/edit/{id}', [StockLocationController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [StockLocationController::class, 'update'])->name('update');
Route::get('/delete/{id}', [StockLocationController::class, 'destroy'])->name('delete');

});

//

//LUT//
Route::group(['prefix'=>'/masters/LUT-master','as'=>'LUT.'], function(){

Route::get('/', [LUTMasterController::class, 'create'])->name('create');
Route::get('/view', [LUTMasterController::class, 'index'])->name('index');
Route::post('/', [LUTMasterController::class, 'store'])->name('store');
Route::get('/edit/{id}', [LUTMasterController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [LUTMasterController::class, 'update'])->name('update');
Route::get('/delete/{id}', [LUTMasterController::class, 'destroy'])->name('delete');

});

//

//Designation//
Route::group(['prefix'=>'/masters/employees-designation','as'=>'designation.'], function(){

Route::get('/', [DesignationController::class, 'create'])->name('create');
Route::get('/view', [DesignationController::class, 'index'])->name('index');
Route::post('/', [DesignationController::class, 'store'])->name('store');
Route::get('/edit/{id}', [DesignationController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [DesignationController::class, 'update'])->name('update');
Route::get('/delete/{id}', [DesignationController::class, 'destroy'])->name('delete');

});

//

/// role//

Route::group(['prefix'=>'/masters/role-master','as'=>'role.'], function(){

Route::get('/', [RoleMasterController::class, 'create'])->name('create');
Route::get('/view', [RoleMasterController::class, 'index'])->name('index');
Route::post('/', [RoleMasterController::class, 'store'])->name('store');
Route::get('/edit/{id}', [RoleMasterController::class, 'edit'])->name('edit');
Route::post('/update', [RoleMasterController::class, 'update'])->name('update');
Route::get('/delete/{id}', [RoleMasterController::class, 'destroy'])->name('delete');

});


///


// Zone Master
Route::group(['prefix'=>'/masters/zone-master','as'=>'zone.'], function(){  
Route::get('/', [ZoneController::class, 'create'])->name('create');
Route::get('/view', [ZoneController::class, 'index'])->name('index');
Route::post('/', [ZoneController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ZoneController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ZoneController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ZoneController::class, 'destroy'])->name('delete');
});
///


Route::group(['prefix'=>'/masters/location-master'], function(){  
    Route::get('/', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/store', [LocationController::class, 'store'])->name('locations.store');
    Route::get('/edit/{id}', [LocationController::class, 'edit'])->name('locations.edit');
    Route::post('/update/{id}', [LocationController::class, 'update'])->name('locations.update');
    Route::get('/delete/{id}', [LocationController::class, 'destroy'])->name('locations.delete');
});

Route::group(['prefix'=>'/masters/client'], function(){ 
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/update/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');
});

//vendor master
Route::group(['prefix'=>'/masters/vendor'], function(){ 
    Route::get('/', [VendorController::class, 'index'])->name('vendor.index');
    Route::get('/create', [VendorController::class, 'create'])->name('vendor.create');
    Route::post('/store', [VendorController::class, 'store'])->name('vendor.store');
    Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
    Route::put('/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
    Route::get('/delete/{id}', [VendorController::class, 'destroy'])->name('vendor.delete');
});
//Client Type Master
Route::group(['prefix'=>'/masters/client-type'], function(){ 
    Route::get('/', [ClientTypeController::class, 'index'])->name('client-type.index');
    Route::get('/create', [ClientTypeController::class, 'create'])->name('client-type.create');
    Route::post('/store', [ClientTypeController::class, 'store'])->name('client-type.store');
    Route::get('/edit/{id}', [ClientTypeController::class, 'edit'])->name('client-type.edit');
    Route::post('/update/{id}', [ClientTypeController::class, 'update'])->name('client-type.update');
    Route::get('/delete/{id}', [ClientTypeController::class, 'destroy'])->name('client-type.delete');
});

///purchase invoice
Route::group(['prefix'=>'/masters/purchase-invoice'], function(){
    Route::get('/', [PurchaseInvoiceController::class, 'index'])->name('purchase-invoice.index');
    Route::get('/create', [PurchaseInvoiceController::class, 'create'])->name('purchase-invoice.create');       
    Route::post('/store', [PurchaseInvoiceController::class, 'store'])->name('purchase-invoice.store');
    Route::get('/edit/{id}', [PurchaseInvoiceController::class, 'edit'])->name('purchase-invoice.edit');
    Route::post('/update/{id}', [PurchaseInvoiceController::class, 'update'])->name('purchase-invoice.update');
    Route::get('/delete/{id}', [PurchaseInvoiceController::class, 'destroy'])->name('purchase-invoice.delete');
    Route::get('/show/{id}', [PurchaseInvoiceController::class, 'show'])->name('purchase-invoice.show');
    Route::get('/search', [PurchaseInvoiceController::class, 'search'])->name('purchase-invoice.search');
    Route::get('summary-data', [PurchaseInvoiceController::class, 'getSummaryData'])->name('purchase-invoice.summary-data');
     Route::post('/get/vendor/add', [PurchaseInvoiceController::class, 'vendors'])->name('purchase-invoice.vendor'); 
     Route::post('/generate-amc-quotation-number', [PurchaseInvoiceController::class, 'generateQuotationNumberAjax'])->name('purchase-invoice.generateQuotationNo');

});

//reference
Route::group(['prefix'=>'/masters/reference'], function(){
    Route::get('/', [App\Http\Controllers\ReferenceController::class, 'index'])->name('reference.index');
    Route::get('/create', [App\Http\Controllers\ReferenceController::class, 'create'])->name('reference.create');
    Route::post('/store', [App\Http\Controllers\ReferenceController::class, 'store'])->name('reference.store');
    Route::get('/edit/{id}', [App\Http\Controllers\ReferenceController::class, 'edit'])->name('reference.edit');
    Route::post('/update/{id}', [App\Http\Controllers\ReferenceController::class, 'update'])->name('reference.update');
    Route::get('/delete/{id}', [App\Http\Controllers\ReferenceController::class, 'destroy'])->name('reference.delete');
});
//
//

// po-entry//
Route::group(['prefix'=>'/masters/po-entry'], function(){

    Route::get('/', [App\Http\Controllers\POEntryController::class, 'index'])->name('po.index');
    Route::get('/create', [App\Http\Controllers\POEntryController::class, 'create'])->name('po.create');
    Route::get('/edit/{id}', [App\Http\Controllers\POEntryController::class, 'edit_data'])->name('po.edit');
    Route::put('/update/{id}', [App\Http\Controllers\POEntryController::class, 'update'])->name('po.update');
    Route::get('/delete/{id}', [App\Http\Controllers\POEntryController::class, 'destroy'])->name('po.delete');
    Route::post('/vendor', [App\Http\Controllers\POEntryController::class, 'vendorContacts'])->name('vendor.contact');
    Route::post('/po/store', [App\Http\Controllers\POEntryController::class, 'store'])->name('po.store');

    
});
    Route::get('po/{id}', [App\Http\Controllers\POEntryController::class, 'view'])->name('po.view');


///
   Route::post('/currency/value', [App\Http\Controllers\POEntryController::class, 'getCurrencyVal'])->name('currency.value');

////
//make //

Route::group(['prefix'=>'/masters/make','as'=>'make.'], function(){  

Route::get('/', [MakeController::class, 'create'])->name('create');
Route::get('/view', [MakeController::class, 'index'])->name('index');
Route::post('/', [MakeController::class, 'store'])->name('store');
Route::get('/edit/{id}', [MakeController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [MakeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [MakeController::class, 'destroy'])->name('delete');

});

///

//attribute value//

Route::group(['prefix'=>'/masters/attribute-details','as'=>'attribute.'], function(){  

Route::get('/', [AttributeDetails::class, 'create'])->name('create');
Route::get('/view', [AttributeDetails::class, 'index'])->name('index');
Route::post('/', [AttributeDetails::class, 'store'])->name('store');
Route::get('/edit/{id}', [AttributeDetails::class, 'edit'])->name('edit');
Route::put('/update/{id}', [AttributeDetails::class, 'update'])->name('update');
Route::delete('/delete/{id}', [AttributeDetails::class, 'destroy'])->name('delete');

});

///


//attribute value//

Route::group(['prefix'=>'/masters/attribute-value','as'=>'attribute.value.'], function(){  

Route::get('/', [AttributeValueController::class, 'create'])->name('create');
Route::get('/view', [AttributeValueController::class, 'index'])->name('index');
Route::post('/', [AttributeValueController::class, 'store'])->name('store');
Route::get('/edit/{id}', [AttributeValueController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [AttributeValueController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [AttributeValueController::class, 'destroy'])->name('delete');

});

///


/// model detail//
Route::group(['prefix'=>'/masters/model','as'=>'model.'], function(){  

Route::get('/', [ModelDetailsController::class, 'create'])->name('create');
Route::get('/view', [ModelDetailsController::class, 'index'])->name('index');
Route::post('/', [ModelDetailsController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ModelDetailsController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [ModelDetailsController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [ModelDetailsController::class, 'destroy'])->name('delete');

});


//


// purchase-payment //

/// model detail//
Route::group(['prefix'=>'/masters/purchase-payment','as'=>'purchase.payment.'], function(){  

Route::get('/', [PurchasePayementController::class, 'create'])->name('create');
Route::get('/view', [PurchasePayementController::class, 'index'])->name('index');
Route::post('/', [PurchasePayementController::class, 'store'])->name('store');
Route::get('/edit/{id}', [PurchasePayementController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [PurchasePayementController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [PurchasePayementController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [PurchasePayementController::class, 'getBalanceVendor'])->name('get_balance');


});


//
// client name//
Route::group(['prefix'=>'/masters/client-name','as'=>'client.name.'], function(){  

Route::get('/', [ClientNameController::class, 'create'])->name('create');
Route::get('/view', [ClientNameController::class, 'index'])->name('index');
Route::post('/', [ClientNameController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ClientNameController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [ClientNameController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ClientNameController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [ClientNameController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-name', [ClientNameController::class, 'getClientName'])->name('client_name');


});
//


// Quatation //
Route::group(['prefix'=>'/masters/quatation','as'=>'quatation.'], function(){  

Route::get('/', [QuatationsController::class, 'create'])->name('create');
Route::get('/view', [QuatationsController::class, 'index'])->name('index');
Route::post('/', [QuatationsController::class, 'store'])->name('store');
Route::get('/edit/{id}', [QuatationsController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [QuatationsController::class, 'update'])->name('update');
Route::get('/delete/{id}', [QuatationsController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [QuatationsController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [QuatationsController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [QuatationsController::class, 'client_add'])->name('client_add');

Route::post('/get/make', [QuatationsController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [QuatationsController::class, 'show'])->name('view');
Route::get('/summary', [QuatationsController::class, 'search'])->name('search');
Route::post('/generate-quotation-number', [QuatationsController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');





});
//


/// AMC Quotation //


Route::group(['prefix'=>'/masters/amc-quotation','as'=>'amc.quatation.'], function(){  

Route::get('/', [AMCStampingQuotation::class, 'create'])->name('create');
Route::get('/view', [AMCStampingQuotation::class, 'index'])->name('index');
Route::post('/', [AMCStampingQuotation::class, 'store'])->name('store');
Route::get('/edit/{id}', [AMCStampingQuotation::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AMCStampingQuotation::class, 'update'])->name('update');
Route::get('/delete/{id}', [AMCStampingQuotation::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [AMCStampingQuotation::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [AMCStampingQuotation::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [AMCStampingQuotation::class, 'client_add'])->name('client_add');

Route::post('/get/make', [AMCStampingQuotation::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [AMCStampingQuotation::class, 'show'])->name('view');
Route::get('/summary', [AMCStampingQuotation::class, 'search'])->name('search');





});

//

//contract amc//

Route::group(['prefix'=>'/masters/contract/amc','as'=>'contract.amc.'], function(){  

Route::get('/', [ContractAMCController::class, 'create'])->name('create');
Route::get('/view', [ContractAMCController::class, 'index'])->name('index');
Route::post('/', [ContractAMCController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ContractAMCController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ContractAMCController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ContractAMCController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [ContractAMCController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [ContractAMCController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [ContractAMCController::class, 'client_add'])->name('client_add');

Route::post('/get/make', [ContractAMCController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [ContractAMCController::class, 'show'])->name('view');
Route::get('/summary', [ContractAMCController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [ContractAMCController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');

Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');




});


///

/// Employee Details


Route::group(['prefix'=>'/masters/employee/details','as'=>'employee.details.'], function(){  

Route::get('/', [EmployeeDetailsController::class, 'create'])->name('create');
Route::get('/view', [EmployeeDetailsController::class, 'index'])->name('index');
Route::post('/', [EmployeeDetailsController::class, 'store'])->name('store');
Route::get('/edit/{id}', [EmployeeDetailsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [EmployeeDetailsController::class, 'update'])->name('update');
Route::get('/delete/{id}', [EmployeeDetailsController::class, 'destroy'])->name('delete');




});
///

/// Employee Details


Route::group(['prefix'=>'/masters/reference/details','as'=>'reference.details.'], function(){  

Route::get('/', [ReferenceController::class, 'create'])->name('create');
Route::get('/view', [ReferenceController::class, 'index'])->name('index');
Route::post('/', [ReferenceController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ReferenceController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ReferenceController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ReferenceController::class, 'destroy'])->name('delete');




});
///

///
Route::group(['prefix'=>'/masters/contracts/service-charges','as'=>'service-charges.'], function(){  

Route::get('/', [ServiceContractStampingController::class, 'create'])->name('create');
Route::get('/view', [ServiceContractStampingController::class, 'index'])->name('index');
Route::post('/', [ServiceContractStampingController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ServiceContractStampingController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ServiceContractStampingController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ServiceContractStampingController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [ServiceContractStampingController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [ServiceContractStampingController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [ServiceContractStampingController::class, 'client_add'])->name('client_add');

Route::post('/get/make', [ServiceContractStampingController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [ServiceContractStampingController::class, 'show'])->name('view');
Route::get('/summary', [ServiceContractStampingController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [ServiceContractStampingController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');

Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');




});


///


//service //
Route::group(['prefix'=>'/masters/contracts/service-contract','as'=>'service-contract.'], function(){  

Route::get('/', [ServiceContractServiceController::class, 'create'])->name('create');
Route::get('/view', [ServiceContractServiceController::class, 'index'])->name('index');
Route::post('/', [ServiceContractServiceController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ServiceContractServiceController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ServiceContractServiceController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ServiceContractServiceController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [ServiceContractServiceController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [ServiceContractServiceController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [ServiceContractServiceController::class, 'client_add'])->name('client_add');
Route::post('/get/make', [ServiceContractServiceController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [ServiceContractServiceController::class, 'show'])->name('view');
Route::get('/summary', [ServiceContractServiceController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [ServiceContractServiceController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');
Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');


});


///

//Challan //
Route::group(['prefix'=>'/masters/challan','as'=>'challan.'], function(){  

Route::get('/', [ChallanController::class, 'create'])->name('create');
Route::get('/view', [ChallanController::class, 'index'])->name('index');
Route::post('/', [ChallanController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ChallanController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ChallanController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ChallanController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [ChallanController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [ChallanController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [ChallanController::class, 'client_add'])->name('client_add');
Route::post('/get/make', [ChallanController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [ChallanController::class, 'show'])->name('view');
Route::get('/summary', [ChallanController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [ServiceContractServiceController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');
Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');


});


///


//Inward //
Route::group(['prefix'=>'/masters/inward','as'=>'inward.'], function(){  

Route::get('/', [InwardController::class, 'create'])->name('create');
Route::get('/view', [InwardController::class, 'index'])->name('index');
Route::post('/', [InwardController::class, 'store'])->name('store');
Route::get('/edit/{id}', [InwardController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [InwardController::class, 'update'])->name('update');
Route::get('/delete/{id}', [InwardController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [InwardController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [InwardController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [InwardController::class, 'client_add'])->name('client_add');
Route::post('/get/make', [InwardController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [InwardController::class, 'show'])->name('view');
Route::get('/summary', [InwardController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [InwardController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');
Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');


});


///

// proforma
Route::group(['prefix'=>'/masters/proforma','as'=>'proforma.'], function(){  
Route::get('/', [ProformaController::class, 'create'])->name('create');
Route::get('/view', [ProformaController::class, 'index'])->name('index');
Route::post('/', [ProformaController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ProformaController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProformaController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ProformaController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [ProformaController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [ProformaController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [ProformaController::class, 'client_add'])->name('client_add');
Route::post('/get/make', [ProformaController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [ProformaController::class, 'show'])->name('view');
Route::get('/summary', [ProformaController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [ProformaController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');
Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');
Route::post('proforma-type', [ProformaController::class, 'proforma_type'])->name('proforma_type');
});
//


///
// sales-invoice
Route::group(['prefix'=>'/masters/sale-invoice','as'=>'sale.invoice.'], function(){  
Route::get('/', [SaleInvoicController::class, 'create'])->name('create');
Route::get('/view', [SaleInvoicController::class, 'index'])->name('index');
Route::post('/', [SaleInvoicController::class, 'store'])->name('store');
Route::get('/edit/{id}', [SaleInvoicController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [SaleInvoicController::class, 'update'])->name('update');
Route::get('/delete/{id}', [SaleInvoicController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [SaleInvoicController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [SaleInvoicController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [SaleInvoicController::class, 'client_add'])->name('client_add');
Route::post('/get/make', [SaleInvoicController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [SaleInvoicController::class, 'show'])->name('view');
Route::get('/summary', [SaleInvoicController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [SaleInvoicController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');
Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');
Route::post('proforma-type', [SaleInvoicController::class, 'proforma_type'])->name('proforma_type');
});
//


Route::group(['prefix'=>'/masters/sale-payment','as'=>'sale.payment.'], function(){  
Route::get('/', [SalePaymentController::class, 'create'])->name('create');
Route::get('/view', [SalePaymentController::class, 'index'])->name('index');
Route::post('/', [SalePaymentController::class, 'store'])->name('store');
Route::get('/edit/{id}', [SalePaymentController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [SalePaymentController::class, 'update'])->name('update');
Route::get('/delete/{id}', [SalePaymentController::class, 'destroy'])->name('delete');
Route::post('/get/vendor-balance', [SalePaymentController::class, 'getBalanceVendor'])->name('get_balance');
Route::post('/get/client-group', [SalePaymentController::class, 'ClientGroup'])->name('client_group');
Route::post('/get/client-address', [SalePaymentController::class, 'client_add'])->name('client_add');
Route::post('/get/make', [SalePaymentController::class, 'make'])->name('make');
Route::get('/show/modal/{id}', [SalePaymentController::class, 'show'])->name('view');
Route::get('/summary', [SalePaymentController::class, 'search'])->name('search');
Route::post('/generate-amc-quotation-number', [SalePaymentController::class, 'generateQuotationNumberAjax'])->name('generateQuotationNo');
Route::get('/companies/list', [CompanyDetailController::class, 'getCompaniesList'])->name('companies.list');
Route::post('proforma-type', [SalePaymentController::class, 'proforma_type'])->name('proforma_type');
Route::get('/invoice/stream', [SalePaymentController::class, 'streamInvoice'])->name('pdf');
Route::get('/get-client-data/{id}', [SalePaymentController::class, 'getClientData'])
     ->name('client_data');

});

Route::get('/clear/all',function(){
 Artisan::call('optimize:clear');

    return "All caches cleared. Output:\n" . Artisan::output();
    
});



use Illuminate\Support\Facades\File;

Route::get('/make/{command}/{name}', function ($command, $name) {
    // Example: /make/controller/Test → creates TestController.php
    $artisanCommand = "make:$command";

    Artisan::call($artisanCommand, [
        'name' => $name
    ]);

    $output = Artisan::output();

    // Calculate generated file path
    $basePath = app_path();
    $relativePath = '';

    switch ($command) {
        case 'controller':
            $relativePath = "Http/Controllers/{$name}.php";
            break;
        case 'model':
            $relativePath = "{$name}.php";
            break;
        case 'request':
            $relativePath = "Http/Requests/{$name}.php";
            break;
        default:
            $relativePath = "{$name}.php";
    }

    $fullPath = $basePath . '/' . $relativePath;

    // Check if file created
 
       return "
    <h3>✅ File Generated Successfully!</h3>
    <p>Location: 
        <a href='file://{$fullPath}' target='_blank'>
            {$fullPath}
        </a>
    </p>
";
    
});

Route::get('/client-details', function () {
    return view('client-details');
});

Route::get('/location-master', function () {
    return view('location-master');
});

Route::get('/client-type-master', function () {
    return view('client-type-master');
});

Route::get('/purchase-invoice', function () {
    return view('purchase-invoice');
});

Route::get('/Product-Master-Model-Details', function () {
    return view('Product-Master-Model-Details');
});

Route::get('/currency-master', function () {
    return view('currency-master');
});

Route::get('/product-master', function () {
    return view('product-master');
});

Route::get('/po-entry', function () {
    return view('po-entry');
});

Route::get('/view-all-po-entry', function () {
    return view('view-all-po-entry');
});

Route::get('/po-summary', function () {
    return view('po-summary');
});

Route::get('/product-master-attribute-details', function () {
    return view('product-master-attribute-details');
});

Route::get('/product-master-attribute-value', function () {
    return View('product-master-attribute-value');
});

Route::get('/buyer-master', function () {
    return view('buyer-master');
});

Route::get('/consignee-master', function () {
    return view('consignee-master');
});

Route::get('/financial-year-master', function () {
    return View('financial-year-master');
});

Route::get('/company-details', function () {
    return View('company-details');
});

Route::get('/client-group-master', function () {
    return View('client-group-master');
});

Route::get('/view-all-company', function () {
    return View('view-all-company');
});

Route::get('/zone-master', function () {
    return view('zone-master');
});

Route::get('/vendor-master', function () {
    return View('vendor-master');
});

Route::get('/view-all-purchase-invoice', function () {
    return View('view-all-purchase-invoice');
});

Route::get('/purchase-summary', function () {
    return View('purchase-summary');
});

Route::get('/payment', function () {
    return View('payment');
});

Route::get('/payment-history', function () {
    return View('/payment-history');
});

Route::get('purchase-invoice-wise-payment', function () {
    return View('/purchase-invoice-wise-payment');
});

Route::get('/account-master', function () {
    return view('/account-master');
});

Route::get('/view-all-accounts', function () {
    return View('view-all-accounts');
});

Route::get('/sales-quotation', function () {
    return View('/sales-quotation');
});

Route::get('/employee-details', function () {
    return View('employee-details');
});

Route::get('view-all-employee-list', function () {
    return View('view-all-employee-list');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/customer-login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer-login', [CustomerLoginController::class, 'login'])->name('customer.login.submit');

Route::get('/customer-dashboard', function () {
    return view('index');
    Route::post('/customer-logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');
})->name('customer.dashboard')->middleware(['auth']);
