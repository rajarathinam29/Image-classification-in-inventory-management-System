<?php

use Illuminate\Support\Facades\Route;
//Middleware init
use App\Http\Middleware\ValidateAdmin;
use App\Http\Middleware\ValidateSuperAdmin;
use App\Http\Middleware\ValidateAdminPermission;

use App\Http\Controllers\BanksController;
use App\Http\Controllers\CurrenciesController;
//Super Admin Controllers init
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\SuperAdminLoginController;
use App\Http\Controllers\SuperAdmin\SuperAdminsController;
use App\Http\Controllers\SuperAdmin\SuperAdminUsersController;
//Admin Controllers init
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UserCompaniesController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ProductMultipleAllianceController;
use App\Http\Controllers\Admin\ProductUnitTypesController;
use App\Http\Controllers\Admin\ProductLanguageController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\Purchase\PurchaseOrderController;
use App\Http\Controllers\Admin\Purchase\PurchaseOrderProductsController;
use App\Http\Controllers\Admin\Purchase\PurchaseOrderAttachmentsController;
use App\Http\Controllers\Admin\Purchase\PurchaseReturnController;
use App\Http\Controllers\Admin\Purchase\PurchaseReturnAttachmentsController;
use App\Http\Controllers\Admin\PurchasePaymentsController;
use App\Http\Controllers\Admin\PurchasedProductsController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\PaymentTypesController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\SalesReturnController;
use App\Http\Controllers\Admin\SalesPaymentsController;
use App\Http\Controllers\Admin\ProductCompaniesController;
use App\Http\Controllers\Admin\ProductBrandsController;
use App\Http\Controllers\Admin\VouchersController;
use App\Http\Controllers\Admin\VoucherSalesController;
use App\Http\Controllers\Admin\PayOrderController;
use App\Http\Controllers\Admin\CollectCreditController;
use App\Http\Controllers\Admin\CompanyBankInfoController;
use App\Http\Controllers\Admin\Cheque\ChequeIssuedController;
use App\Http\Controllers\Admin\Cheque\ChequeReceivedController;
use App\Http\Controllers\Admin\Stocks\StockCountController;
use App\Http\Controllers\Admin\Stocks\StockTransferController;
use App\Http\Controllers\Admin\Stocks\StockTransferSourceController;
use App\Http\Controllers\Admin\Activitys\ActivityController;
use App\Http\Controllers\Admin\Reports\StockReportController;
use App\Http\Controllers\Admin\Reports\SalesReportController;
use App\Http\Controllers\Admin\Reports\PurchaseReportController;
use App\Http\Controllers\Admin\Reports\RevenueReportController;
use App\Http\Controllers\Admin\Reports\ExpenseReportController;

use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\Products\MakeModelController;
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
/*
|--------------------------------------------------------------------------
| Super Admin
|--------------------------------------------------------------------------
*/
Route::get('/superAdmin', [SuperAdminDashboardController::class, 'index'])->name('superAdminDashboard');
//SuperAdmin Login
Route::get('/superAdmin/login', [SuperAdminLoginController::class, 'index'])->name('superAdmin.login');
Route::post('/superAdmin/login', [SuperAdminLoginController::class, 'login']);

// Modules
Route::prefix('/superAdmin/modules')->middleware(ValidateSuperAdmin::class)->group(function(){
    Route::post('/getModules', [ModuleController::class, 'getModules']);
    Route::post('/getAdminModules', [ModuleController::class, 'getAdminModules']);
});

//ADMINS 
Route::prefix('/superAdmin/admins')->middleware(ValidateSuperAdmin::class)->group(function () {
    Route::get('/create', [SuperAdminsController::class, 'create'])->name('superAdminAdmins.create')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/edit', [SuperAdminsController::class, 'edit'])->name('superAdminAdmins.edit')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/view', [SuperAdminsController::class, 'view'])->name('superAdminAdmins.view')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/', [SuperAdminsController::class, 'index'])->name('superAdminAdmins')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/setPermission', [SuperAdminsController::class, 'setPermission'])->name('superAdminAdmins.setPermission')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/accountVerify/{user}', [SuperAdminsController::class, 'accountVerify'])->name('superAdminAdmins.accountverify')->withoutMiddleware([ValidateSuperAdmin::class]);

    Route::post('/getUsers', [SuperAdminsController::class, 'getUsers'])->name('superAdminAdmins.getUsers');
    Route::post('/getUser', [SuperAdminsController::class, 'getUser'])->name('superAdminAdmins.getUser');
    Route::post('/getPermission', [SuperAdminsController::class, 'getPermission'])->name('superAdminAdmins.getPermission');
    Route::post('/addUser', [SuperAdminsController::class, 'addUser'])->name('superAdminAdmins.addUser');
    Route::post('/updateUser', [SuperAdminsController::class, 'updateUser'])->name('superAdminAdmins.updateUser');
    Route::post('/setPermission', [SuperAdminsController::class, 'setPermission']);
    Route::post('/deleteuser', [SuperAdminsController::class, 'deleteUser'])->name('superAdminAdmins.deleteUser');
    Route::post('/getUserLog', [SuperAdminsController::class, 'getUserLog'])->name('superAdminAdmins.getLog');
    Route::post('/sendResetPassword', [SuperAdminsController::class, 'sendResetPassword'])->name('superAdminAdmins.sendResetPassword');
});

//USERS 
Route::prefix('/superAdmin/users')->middleware(ValidateSuperAdmin::class)->group(function () {
    Route::get('/create', [SuperAdminUsersController::class, 'create'])->name('superAdminUsers.create')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/edit', [SuperAdminUsersController::class, 'edit'])->name('superAdminUsers.edit')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/view', [SuperAdminUsersController::class, 'view'])->name('superAdminUsers.view')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/', [SuperAdminUsersController::class, 'index'])->name('superAdminUsers')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/accountVerify/{user}', [SuperAdminUsersController::class, 'accountVerify'])->name('users.accountverify')->withoutMiddleware([ValidateSuperAdmin::class]);

    Route::post('/getUsers', [SuperAdminUsersController::class, 'getUsers'])->name('superAdminUsers.getUsers');
    Route::post('/getCountUsers', [SuperAdminUsersController::class, 'getCountUsers'])->name('superAdminUsers.getCountUsers');
    Route::post('/getUser', [SuperAdminUsersController::class, 'getUser'])->name('superAdminUsers.getUser');
    Route::post('/addUser', [SuperAdminUsersController::class, 'addUser'])->name('superAdminUsers.addUser');
    Route::post('/updateUser', [SuperAdminUsersController::class, 'updateUser'])->name('superAdminUsers.updateUser');
    Route::post('/deleteuser', [SuperAdminUsersController::class, 'deleteUser'])->name('superAdminUsers.deleteUser');
    Route::post('/getUserLog', [SuperAdminUsersController::class, 'getUserLog'])->name('superAdminUsers.getLog');
    Route::post('/sendResetPassword', [SuperAdminUsersController::class, 'sendResetPassword'])->name('superAdminUsers.sendResetPassword');
});
//User Role
Route::prefix('/superAdmin/userRole')->middleware(ValidateSuperAdmin::class)->group(function () {
    Route::post('/getUserRole', [UserRoleController::class, 'getUserRole'])->name('userrole.getUserRole');
});

//COMPANIES
Route::prefix('/superAdmin/companies')->middleware(ValidateSuperAdmin::class)->group(function(){
    Route::get('/', [CompaniesController::class, 'superAdminIndex'])->name('superAdminCompanies')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/create', [CompaniesController::class, 'superAdminCreate'])->name('superAdminCompanies.create')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/edit', [CompaniesController::class, 'superAdminEdit'])->name('superAdminCompanies.edit')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/view', [CompaniesController::class, 'superAdminView'])->name('superAdminCompanies.view')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::post('/addcompany', [CompaniesController::class, 'addcompany']);
    Route::post('/updateCompany', [CompaniesController::class, 'updateCompany']);
    Route::post('/getCompanies', [CompaniesController::class, 'getCompanies']);
    Route::post('/getCompany', [CompaniesController::class, 'getCompany']);
    Route::post('/getCountCompanies', [CompaniesController::class, 'getCountCompanies']);
    Route::post('/deleteCompany', [CompaniesController::class, 'deleteCompany']);
    Route::post('/uploadLogo', [CompaniesController::class, 'uploadLogo']);
});

//BRANCHES
Route::prefix('/superAdmin/branches')->middleware(ValidateSuperAdmin::class)->group(function(){
    Route::get('/create', [BranchesController::class, 'create'])->name('branches.create')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/edit', [BranchesController::class, 'edit'])->name('branches.edit')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::post('/addBranch', [BranchesController::class, 'addBranch']);
    Route::post('/updateBranch', [BranchesController::class, 'updateBranch']);
    Route::post('/getBranches', [BranchesController::class, 'getBranches']);
    Route::post('/getBranch', [BranchesController::class, 'getBranch']);
    Route::post('/getCountBranches', [BranchesController::class, 'getCountBranches']);
    Route::post('/deleteBranch', [BranchesController::class, 'deleteBranch']);
});

//BANKS
Route::prefix('/superAdmin/banks')->middleware(ValidateSuperAdmin::class)->group(function(){
    Route::get('/', [BanksController::class, 'index'])->name('superAdminBanks')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/create', [BanksController::class, 'create'])->name('superAdminBanks.create')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/edit', [BanksController::class, 'edit'])->name('superAdminBanks.edit')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::get('/view', [BanksController::class, 'view'])->name('superAdminBanks.view')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::post('/addBank', [BanksController::class, 'addBank']);
    Route::post('/updateBank', [BanksController::class, 'updateBank']);
    Route::post('/getBanks', [BanksController::class, 'getBanks']);
    Route::post('/getBank', [BanksController::class, 'getBank']);
    Route::post('/deleteBank', [BanksController::class, 'deleteBank']);
    Route::post('/getBankBranches', [BanksController::class, 'getBankBranches']);
    Route::post('/getBankBranch', [BanksController::class, 'getBankBranch']);
    Route::post('/addBankBranch', [BanksController::class, 'addBranch']);
    Route::post('/updateBankBranch', [BanksController::class, 'updateBranch']);
    Route::post('/deleteBankBranch', [BanksController::class, 'deleteBranch']);
});

//CURRENCIES
Route::prefix('superAdmin/currencies')->middleware(ValidateSuperAdmin::class)->group(function(){
    Route::post('/getCurrencies', [CurrenciesController::class, 'getCurrencies']);
});




//USER COMPANIES
Route::prefix('/superAdmin/userCompanies')->middleware(ValidateSuperAdmin::class)->group(function(){
    Route::get('/setPermission', [UserCompaniesController::class, 'superAdminsetpermissionview'])->name('usercompanies.setpermission')->withoutMiddleware([ValidateSuperAdmin::class]);
    Route::post('/addUserCompanies', [UserCompaniesController::class, 'addUserCompanies']);
    Route::post('/setPermission', [UserCompaniesController::class, 'setPermission']);
    Route::post('/setDefault', [UserCompaniesController::class, 'setDefault']);
    Route::post('/getCompanies', [UserCompaniesController::class, 'getCompanies']);
    Route::post('/getUsers', [UserCompaniesController::class, 'getUsers']);
    Route::post('/getUserCompany', [UserCompaniesController::class, 'getUserCompany']);
    Route::post('/deleteUserCompany', [UserCompaniesController::class, 'deleteUserCompany']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('adminDashboard');

//User Login
Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);

Route::get('/admin/selectCompany', [LoginController::class, 'selectCompany'])->name('admin.selectCompany');
Route::get('/admin/selectBranch', [LoginController::class, 'selectBranch'])->name('admin.selectBranch');

// Modules
Route::post('/modules/getModules', [ModuleController::class, 'getModules'])->middleware(ValidateAdmin::class);



//COMPANIES
Route::prefix('/admin/companies')->middleware(ValidateAdmin::class)->group(function(){
    Route::post('/getCompany', [CompaniesController::class, 'getCompany']);  
});

//BRANCH
Route::prefix('/admin/branches')->middleware(ValidateAdmin::class)->group(function(){
    Route::post('/getBranch', [BranchesController::class, 'getBranch']);
    Route::post('/getClientBranches', [BranchesController::class, 'getClientBranches']);
});

// Settings
Route::prefix('adminSettings')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [AdminSettingController::class, 'index'])->name('adminSettings')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/persnal-settings', [AdminSettingController::class, 'personal'])->name('adminSettings.personal')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/paymentmethod-settings', [AdminSettingController::class, 'paymentmethod'])->name('adminSettings.paymentmethod')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/company', [AdminSettingController::class, 'companydetails'])->name('adminSettings.companydetails')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/prefix', [AdminSettingController::class, 'prefix'])->name('adminSettings.prefix')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/branch', [AdminSettingController::class, 'branch'])->name('adminSettings.branch')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/customers', [AdminSettingController::class, 'customers'])->name('adminSettings.customers')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/suppliers', [AdminSettingController::class, 'suppliers'])->name('adminSettings.suppliers')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/products', [AdminSettingController::class, 'products'])->name('adminSettings.products')->withoutMiddleware([ValidateAdmin::class]);

    Route::post('/getPrefixSetting', [AdminSettingController::class, 'getPrefixSetting']);
    Route::post('/addPrefixSetting', [AdminSettingController::class, 'addPrefixSetting']);

    Route::get('/makeModel', [MakeModelController::class, 'index'])->name('adminSettings.makeModel')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getMakeModels', [MakeModelController::class, 'getMakeModels']);
    Route::post('/addMakeModel', [MakeModelController::class, 'addMakeModel']);
    Route::post('/updateMakeModel', [MakeModelController::class, 'updateMakeModel']);
    Route::post('/deleteMakeModel', [MakeModelController::class, 'deleteMakeModel']);
});

//USERS 
Route::prefix('adminSettings/users')->middleware(ValidateAdmin::class)->group(function () {
    Route::get('/create', [UsersController::class, 'create'])->name('adminUsers.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [UsersController::class, 'edit'])->name('users.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [UsersController::class, 'view'])->name('users.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/', [UsersController::class, 'index'])->name('adminUsers')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/accountVerify/{user}', [UsersController::class, 'accountVerify'])->name('users.accountverify')->withoutMiddleware([ValidateAdmin::class]);

    Route::post('/getUsers', [UsersController::class, 'getUsers'])->name('users.getUsers')->middleware('validateAdminPermission:usersView');
    Route::post('/getBranchUsers', [UserCompaniesController::class, 'getBranchUsers'])->middleware('validateAdminPermission:usersView');
    Route::post('/getCountUsers', [UsersController::class, 'getCountUsers'])->name('users.getCountUsers');
    Route::post('/getUser', [UsersController::class, 'getUser']);
    Route::post('/addUser', [UserCompaniesController::class, 'addUser'])->middleware('validateAdminPermission:usersWrite');
    Route::post('/updateUser', [UsersController::class, 'updateUser']);
    Route::post('/deleteuser', [UsersController::class, 'deleteUser'])->middleware('validateAdminPermission:usersDelete');
    Route::post('/sendResetPassword', [UsersController::class, 'sendResetPassword'])->middleware('validateAdminPermission:usersWrite');
    Route::post('/uploadProfile', [UserProfileController::class, 'uploadProfile']);
});

//PAYMENT METHODS
Route::prefix('adminSettings/paymentmethod')->middleware(ValidateAdmin::class)->group(function () {
    Route::post('/getPaymentmethods', [PaymentMethodController::class, 'getPaymentmethods'])->name('paymentmethod.getPaymentmethods');
});

//PAYMENT TYPES
Route::prefix('adminSettings/paymentTypes')->middleware(ValidateAdmin::class)->group(function () {
    Route::post('/getPaymentTypes', [PaymentTypesController::class, 'getPaymentTypes']);
});

//LANGUAGES
Route::prefix('adminSettings/languages')->middleware(ValidateAdmin::class)->group(function () {
    Route::post('/getLanguages', [LanguagesController::class, 'getLanguages']);
});

//USER ROLE
Route::prefix('adminSettings/userRole')->middleware(ValidateAdmin::class)->group(function () {
    Route::post('/getUserRole', [UserRoleController::class, 'getUserRole'])->name('userrole.getUserRole');
});

//BANKS
Route::prefix('admin/banks')->middleware(ValidateAdmin::class)->group(function(){
    Route::post('/getBanks', [BanksController::class, 'getBanks']);
    // Branches
    Route::post('/getBankBranches', [BanksController::class, 'getBankBranches']);
});

//CURRENCIES
Route::prefix('admin/currencies')->middleware(ValidateAdmin::class)->group(function(){
    Route::post('/getCurrencies', [CurrenciesController::class, 'getCurrencies']);
});

//COMPANIES
Route::prefix('/companies')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [CompaniesController::class, 'index'])->name('companies')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [CompaniesController::class, 'create'])->name('companies.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [CompaniesController::class, 'edit'])->name('companies.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [CompaniesController::class, 'view'])->name('companies.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addcompany', [CompaniesController::class, 'addcompany']);
    Route::post('/updateCompany', [CompaniesController::class, 'updateCompany']);
    Route::post('/getCompanies', [CompaniesController::class, 'getCompanies']);
    Route::post('/getCompany', [CompaniesController::class, 'getCompany']);
    Route::post('/getCountCompanies', [CompaniesController::class, 'getCountCompanies']);
    Route::post('/deleteCompany', [CompaniesController::class, 'deleteCompany']);
});


//USER COMPANIES
Route::prefix('/userCompanies')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/setPermission', [UserCompaniesController::class, 'setpermissionview'])->name('usercompanies.setpermission')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addUserCompanies', [UserCompaniesController::class, 'addUserCompanies'])->middleware('validateAdminPermission:usersWrite');
    Route::post('/setPermission', [UserCompaniesController::class, 'setPermission'])->middleware('validateAdminPermission:usersSetPermission');
    Route::post('/setDefault', [UserCompaniesController::class, 'setDefault'])->middleware('validateAdminPermission:usersWrite');
    Route::post('/getCompaniesOnly', [UserCompaniesController::class, 'getCompaniesOnly']);
    Route::post('/getBranch', [UserCompaniesController::class, 'getBranch']);
    Route::post('/getCompanies', [UserCompaniesController::class, 'getCompanies'])->middleware('validateAdminPermission:usersView');
    Route::post('/getUsers', [UserCompaniesController::class, 'getUsers'])->middleware('validateAdminPermission:usersView');
    Route::post('/getUserCompany', [UserCompaniesController::class, 'getUserCompany'])->middleware('validateAdminPermission:usersView');
    Route::post('/deleteUserCompany', [UserCompaniesController::class, 'deleteUserCompany'])->middleware('validateAdminPermission:usersDelete');
});

//COMPANY BANKS
Route::prefix('/companyBanks')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/view', [CompanyBankInfoController::class, 'view'])->name('companies.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addCompanyBank', [CompanyBankInfoController::class, 'addCompanyBank']);
    Route::post('/updateCompanyBank', [CompanyBankInfoController::class, 'updateCompanyBank']);
    Route::post('/getCompanyBankInfo', [CompanyBankInfoController::class, 'getCompanyBankInfo']);
    Route::post('/deleteCompanyBank', [CompanyBankInfoController::class, 'deleteCompanyBank']);
});

//PRODUCT CATEGORIES
Route::prefix('/productCategories')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ProductCategoriesController::class, 'index'])->name('productcategories')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [ProductCategoriesController::class, 'create'])->name('productcategories.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [ProductCategoriesController::class, 'edit'])->name('productcategories.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [ProductCategoriesController::class, 'view'])->name('productcategories.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addProductCategory', [ProductCategoriesController::class, 'addProductCategory'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/updateProductCategory', [ProductCategoriesController::class, 'updateProductCategory'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/getProductCategories', [ProductCategoriesController::class, 'getProductCategories'])->middleware('validateAdminPermission:productsView');
    Route::post('/getCategoriesActive', [ProductCategoriesController::class, 'getCategoriesActive']);
    Route::post('/getProductCategory', [ProductCategoriesController::class, 'getProductCategory']);
    Route::post('/deleteProductCategory', [ProductCategoriesController::class, 'deleteProductCategory'])->middleware('validateAdminPermission:productsDelete');
});

//PRODUCTS
Route::prefix('/products')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ProductsController::class, 'index'])->name('products')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [ProductsController::class, 'create'])->name('products.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [ProductsController::class, 'edit'])->name('products.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [ProductsController::class, 'view'])->name('products.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addProducts', [ProductsController::class, 'addProducts'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/updateProduct', [ProductsController::class, 'updateProduct'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/getProducts', [ProductsController::class, 'getProducts'])->middleware('validateAdminPermission:productsView');
    Route::post('/getProduct', [ProductsController::class, 'getProduct'])->middleware('validateAdminPermission:productsView');
    Route::post('/searchProduct', [ProductsController::class, 'searchProduct'])->middleware('validateAdminPermission:productsView,salesWrite,purchaseWrite');
    Route::post('/deleteProduct', [ProductsController::class, 'deleteProduct'])->middleware('validateAdminPermission:productsDelete');
    Route::post('/importProducts', [ProductsController::class, 'importProducts']);

    Route::get('/imagesearch', function () {
        return view('admin.products.image-search',['title'=>'imagesearch']);
      })->name('products.imagesearch')->withoutMiddleware([ValidateAdmin::class]);
      
    //product unit types
    Route::post('/getUnitTypes', [ProductUnitTypesController::class, 'getUnitsTypes']);
    //Multiple Alliance
    Route::post('/getMultipleAlliance', [ProductMultipleAllianceController::class, 'getMultipleAlliance'])->middleware('validateAdminPermission:productsView');
    Route::post('/addAlliance', [ProductMultipleAllianceController::class, 'addAlliance'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/updateAlliance', [ProductMultipleAllianceController::class, 'updateAlliance'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/deleteAlliance', [ProductMultipleAllianceController::class, 'deleteAlliance'])->middleware('validateAdminPermission:productsDelete');
    //Product Language
    Route::post('/getProductLanguage', [ProductLanguageController::class, 'getProductLanguage'])->middleware('validateAdminPermission:productsView');
    Route::post('/addProductLanguage', [ProductLanguageController::class, 'addProductLanguage'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/updateProductLanguage', [ProductLanguageController::class, 'updateProductLanguage'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/deleteProductLanguage', [ProductLanguageController::class, 'deleteProductLanguage'])->middleware('validateAdminPermission:productsDelete');
});

//SUPPLIERS
Route::prefix('/suppliers')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [SuppliersController::class, 'index'])->name('suppliers')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [SuppliersController::class, 'create'])->name('suppliers.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [SuppliersController::class, 'edit'])->name('suppliers.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [SuppliersController::class, 'view'])->name('suppliers.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addSuppliers', [SuppliersController::class, 'addSuppliers'])->middleware('validateAdminPermission:suppliersWrite');
    Route::post('/updateSuppliers', [SuppliersController::class, 'updateSuppliers'])->middleware('validateAdminPermission:suppliersWrite');
    Route::post('/getSuppliers', [SuppliersController::class, 'getSuppliers'])->middleware('validateAdminPermission:suppliersView,purchasesView,purchase_returnWrite');
    Route::post('/getSupplier', [SuppliersController::class, 'getSupplier'])->middleware('validateAdminPermission:suppliersView');
    Route::post('/deleteSuppliers', [SuppliersController::class, 'deleteSuppliers'])->middleware('validateAdminPermission:suppliersDelete');
    Route::post('/importSuppliers', [SuppliersController::class, 'importSuppliers']);
});
//CUSTOMERS
Route::prefix('/customers')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [CustomersController::class, 'index'])->name('customers')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [CustomersController::class, 'create'])->name('customers.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [CustomersController::class, 'edit'])->name('customers.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [CustomersController::class, 'view'])->name('customers.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addCustomer', [CustomersController::class, 'addCustomer'])->middleware('validateAdminPermission:customersWrite');
    Route::post('/updateCustomer', [CustomersController::class, 'updateCustomer'])->middleware('validateAdminPermission:customersWrite');
    Route::post('/searchCustomers', [CustomersController::class, 'searchCustomers']);
    Route::post('/getCustomers', [CustomersController::class, 'getCustomers'])->middleware('validateAdminPermission:customersView,salesView');
    Route::post('/getCustomer', [CustomersController::class, 'getCustomer'])->middleware('validateAdminPermission:customersView');
    Route::post('/deleteCustomer', [CustomersController::class, 'deleteCustomer'])->middleware('validateAdminPermission:customersDelete');
    Route::post('/importCustomers', [CustomersController::class, 'importCustomers']);
});

//PURCHASE
Route::prefix('/purchases')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [PurchaseController::class, 'index'])->name('purchases')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [PurchaseController::class, 'create'])->name('purchases.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [PurchaseController::class, 'edit'])->name('purchases.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [PurchaseController::class, 'view'])->name('purchases.view')->withoutMiddleware([ValidateAdmin::class]);
    
    Route::get('/printBill', [PurchaseController::class, 'printBill']);
    Route::post('/addPurchase', [PurchaseController::class, 'addPurchase'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/updatePurchase', [PurchaseController::class, 'updatePurchase'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/setComplete', [PurchaseController::class, 'setComplete'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/getPurchases', [PurchaseController::class, 'getPurchases'])->middleware('validateAdminPermission:purchasesView,suppliersView');
    Route::post('/requestPurchase', [PurchaseController::class, 'requestPurchase'])->middleware('validateAdminPermission:purchasesView,purchasesWrite');
    Route::post('/getPurchase', [PurchaseController::class, 'getPurchase'])->middleware('validateAdminPermission:purchasesView');
    Route::post('/deletePurchase', [PurchaseController::class, 'deletePurchase'])->middleware('validateAdminPermission:purchasesDelete');
    Route::post('/uploadAttachment', [PurchaseController::class, 'uploadAttachment'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/getAttachments', [PurchaseController::class, 'getAttachments'])->middleware('validateAdminPermission:purchasesView');
    Route::post('/getMonthTotalPurchase', [PurchaseController::class, 'getMonthTotalPurchase']);
    Route::post('/getLastSixMonthPurchase', [PurchaseController::class, 'getLastSixMonthPurchase']);
    //purchased Products
    Route::post('/getPurchaseProducts', [PurchasedProductsController::class, 'getPurchasedProducts']);
    Route::post('/getPurchasedProductsByProuctId', [PurchasedProductsController::class, 'getPurchasedProductsByProuctId']);
    Route::post('/setPriceSatus', [PurchasedProductsController::class, 'setPriceSatus']);
    Route::post('/getProductPrices', [PurchasedProductsController::class, 'getProductPrices']);
    Route::post('/addPurchaseProduct', [PurchasedProductsController::class, 'addPurchasedProduct']);
    Route::post('/updatePurchaseProduct', [PurchasedProductsController::class, 'updatePurchasedProduct']);
    Route::post('/deletePurchasedProduct', [PurchasedProductsController::class, 'deletePurchasedProduct']);
    Route::post('/updateDefaultPrice', [PurchasedProductsController::class, 'updateDefaultPrice']);
    //payments
    Route::post('/getPayments', [PurchaseController::class, 'getPayments'])->middleware('validateAdminPermission:purchase_paymentView');

    //purchase Payments
    Route::get('/purchasePayments', [PurchasePaymentsController::class, 'index'])->name('purchases.purchasepayments')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/purchasePaymentView', [PurchasePaymentsController::class, 'view'])->name('purchases.purchasepaymentview')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getPurchasePayments', [PurchasePaymentsController::class, 'getPurchasePayments']);
    Route::post('/getPurchasePayment', [PurchasePaymentsController::class, 'getPurchasePayment']);
    Route::post('/deletePurchasePayment', [PurchasePaymentsController::class, 'deletePurchasePayment']);

    //Purchase Order
    Route::get('/purchaseOrder', [PurchaseOrderController::class, 'index'])->name('purchases.purchaseOrder')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/purchaseOrder/create', [PurchaseOrderController::class, 'create'])->name('purchases.purchaseOrderCreate')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/purchaseOrder/edit', [PurchaseOrderController::class, 'edit'])->name('purchases.purchaseOrderEdit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/purchaseOrder/view', [PurchaseOrderController::class, 'view'])->name('purchases.purchaseOrderView')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getPurchaseOrders', [PurchaseOrderController::class, 'getPurchaseOrders'])->middleware('validateAdminPermission:purchasesView');
    Route::get('/purchaseOrder/printBill', [PurchaseOrderController::class, 'printBill']);
    Route::get('/purchaseOrder/quickView', [PurchaseOrderController::class, 'quickView']);
    Route::post('/getOrder', [PurchaseOrderController::class, 'getOrder'])->middleware('validateAdminPermission:purchasesView');
    Route::post('/addOrder', [PurchaseOrderController::class, 'addOrder'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/updateOrder', [PurchaseOrderController::class, 'updateOrder'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/purchaseOrder/sendMailPurchaseOrder', [PurchaseOrderController::class, 'sendMailPurchaseOrder'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/purchaseOrder/setFinalized', [PurchaseOrderController::class, 'setFinalized'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/purchaseOrder/setCancelled', [PurchaseOrderController::class, 'setCancelled'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/deleteOrder', [PurchaseOrderController::class, 'deleteOrder'])->middleware('validateAdminPermission:purchasesDelete');

    Route::post('/getPurchaseOrderProducts', [PurchaseOrderProductsController::class, 'getPurchaseOrderProducts'])->middleware('validateAdminPermission:purchasesView');
    Route::post('/addPurchaseOrderProduct', [PurchaseOrderProductsController::class, 'addPurchaseOrderProduct'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/updatePurchaseOrderProduct', [PurchaseOrderProductsController::class, 'updatePurchaseOrderProduct'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('/deletePurchaseOrderProduct', [PurchaseOrderProductsController::class, 'deletePurchaseOrderProduct'])->middleware('validateAdminPermission:purchasesDelete');

    Route::get('purchaseOrder/uploadAttachment', [PurchaseOrderAttachmentsController::class, 'uploadAttachmentView'])->name('purchaseOrder.uploadAttachmentView')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('purchaseOrder/generateUploadAttachmentUrl', [PurchaseOrderAttachmentsController::class, 'generateUploadAttachmentUrl']);
    Route::post('purchaseOrder/uploadAttachment', [PurchaseOrderAttachmentsController::class, 'uploadAttachment'])->middleware('validateAdminPermission:purchasesWrite');
    Route::post('purchaseOrder/getAttachments', [PurchaseOrderAttachmentsController::class, 'getAttachments'])->middleware('validateAdminPermission:purchasesView');
    Route::post('purchaseOrder/deleteAttachment', [PurchaseOrderAttachmentsController::class, 'deleteAttachment'])->middleware('validateAdminPermission:purchasesDelete');
    
});

//PURCHASE RETURN
Route::prefix('/purchaseReturn')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [PurchaseReturnController::class, 'index'])->name('purchaseReturn')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [PurchaseReturnController::class, 'create'])->name('purchaseReturn.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [PurchaseReturnController::class, 'edit'])->name('purchaseReturn.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [PurchaseReturnController::class, 'view'])->name('purchaseReturn.view')->withoutMiddleware([ValidateAdmin::class]);

    Route::post('/getPurchaseReturns', [PurchaseReturnController::class, 'getPurchaseReturns'])->middleware('validateAdminPermission:purchase_returnView');
    Route::post('/getPurchaseReturn', [PurchaseReturnController::class, 'getPurchaseReturn'])->middleware('validateAdminPermission:purchase_returnView');
    Route::post('/setCompleted', [PurchaseReturnController::class, 'setCompleted'])->middleware('validateAdminPermission:purchase_returnWrite');
    Route::post('/addReturn', [PurchaseReturnController::class, 'addReturn'])->middleware('validateAdminPermission:purchase_returnWrite');
    Route::post('/updateReturn', [PurchaseReturnController::class, 'updateReturn'])->middleware('validateAdminPermission:purchase_returnWrite');
    Route::post('/deleteReturn', [PurchaseReturnController::class, 'deleteReturn'])->middleware('validateAdminPermission:purchase_returnDelete');

    Route::post('/getPurchaseReturnProducts', [PurchaseReturnController::class, 'getPurchaseReturnProducts'])->middleware('validateAdminPermission:purchase_returnView');
    Route::post('/addPurchaseReturnProduct', [PurchaseReturnController::class, 'addPurchaseReturnProduct'])->middleware('validateAdminPermission:purchase_returnWrite');
    Route::post('/updatePurchaseReturnProduct', [PurchaseReturnController::class, 'updatePurchaseReturnProduct'])->middleware('validateAdminPermission:purchase_returnWrite');
    Route::post('/deletePurchaseReturnProduct', [PurchaseReturnController::class, 'deletePurchaseReturnProduct'])->middleware('validateAdminPermission:purchase_returnDelete');

    Route::post('/uploadAttachment', [PurchaseReturnAttachmentsController::class, 'uploadAttachment'])->middleware('validateAdminPermission:purchase_returnWrite');
    Route::post('/getAttachments', [PurchaseReturnAttachmentsController::class, 'getAttachments'])->middleware('validateAdminPermission:purchase_returnView');
    Route::post('/deleteAttachment', [PurchaseReturnAttachmentsController::class, 'deleteAttachment'])->middleware('validateAdminPermission:purchase_returnDelete');
});

//SALES
Route::prefix('/sales')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [SalesController::class, 'index'])->name('sales')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [SalesController::class, 'create'])->name('sales.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [SalesController::class, 'edit'])->name('sales.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [SalesController::class, 'view'])->name('sales.view')->withoutMiddleware([ValidateAdmin::class]);
    
    Route::post('/addSale', [SalesController::class, 'addSale'])->middleware('validateAdminPermission:salesWrite');
    Route::post('/updateSale', [SalesController::class, 'updateSale'])->middleware('validateAdminPermission:salesWrite');
    Route::post('/getSalesData', [SalesController::class, 'getSalesData'])->middleware('validateAdminPermission:salesView');
    Route::post('/getSale', [SalesController::class, 'getSale'])->middleware('validateAdminPermission:salesView');
    Route::post('/deleteSale', [SalesController::class, 'deleteSale'])->middleware('validateAdminPermission:salesDelete');
    Route::post('/getMonthTotalSales', [SalesController::class, 'getMonthTotalSales']);
    Route::post('/getLastSixMonthSales', [SalesController::class, 'getLastSixMonthSales']);
    
    Route::get('/returns', [SalesReturnController::class, 'returns'])->name('sales.returns')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/rtnAccept', [SalesReturnController::class, 'rtnAccept']);
    Route::post('/getReturnProducts', [SalesReturnController::class, 'getReturnProducts']);
    Route::post('/getPendingReturnProducts', [SalesReturnController::class, 'getPendingReturnProducts']);
    Route::post('/reuseProduct', [SalesReturnController::class, 'reuseProduct']);
    Route::post('/damageProduct', [SalesReturnController::class, 'damageProduct']);
    // Route::post('/getsalesProducts', [SalesdProductsController::class, 'getsalesdProducts']);
    // Route::post('/addsalesProduct', [SalesdProductsController::class, 'addsalesdProduct']);
    // Route::post('/updatesalesProduct', [SalesdProductsController::class, 'updatesalesdProduct']);
    // Route::post('/deletesalesdProduct', [SalesdProductsController::class, 'deletesalesdProduct']);

    //sales Payments
    Route::get('/salesPayments', [SalesPaymentsController::class, 'index'])->name('sales.salespayments')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/salesPaymentView', [SalesPaymentsController::class, 'view'])->name('sales.salespaymentview')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getSalesPayments', [SalesPaymentsController::class, 'getSalesPayments']);
    Route::post('/getSalesPayment', [SalesPaymentsController::class, 'getSalesPayment']);
    Route::post('/deleteSalesPayment', [SalesPaymentsController::class, 'deleteSalesPayment']);

    //Customer Sales
    Route::post('/getCustomerSalesData', [SalesController::class, 'getCustomerSalesData']);
    
});

//EXPENSES
Route::prefix('/expenses')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ExpensesController::class, 'index'])->name('expenses')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [ExpensesController::class, 'create'])->name('expenses.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [ExpensesController::class, 'edit'])->name('expenses.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [ExpensesController::class, 'view'])->name('expenses.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addExpenses', [ExpensesController::class, 'addExpenses'])->middleware('validateAdminPermission:expensesWrite');
    Route::post('/updateExpenses', [ExpensesController::class, 'updateExpenses'])->middleware('validateAdminPermission:expensesWrite');
    Route::post('/getExpenses', [ExpensesController::class, 'getExpenses'])->middleware('validateAdminPermission:expensesView');
    Route::post('/getExpense', [ExpensesController::class, 'getExpense'])->middleware('validateAdminPermission:expensesView');
    Route::post('/deleteExpenses', [ExpensesController::class, 'deleteExpenses'])->middleware('validateAdminPermission:expensesDelete');
});

//REVENUE
Route::prefix('/revenues')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [RevenueController::class, 'index'])->name('revenues')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [RevenueController::class, 'create'])->name('revenues.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [RevenueController::class, 'edit'])->name('revenues.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [RevenueController::class, 'view'])->name('revenues.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addRevenue', [RevenueController::class, 'addRevenue'])->middleware('validateAdminPermission:revenuesWrite');
    Route::post('/updateRevenue', [RevenueController::class, 'updateRevenue'])->middleware('validateAdminPermission:revenuesWrite');
    Route::post('/getRevenues', [RevenueController::class, 'getRevenues'])->middleware('validateAdminPermission:revenuesView');
    Route::post('/getRevenue', [RevenueController::class, 'getRevenue'])->middleware('validateAdminPermission:revenuesView');
    Route::post('/deleteRevenue', [RevenueController::class, 'deleteRevenue'])->middleware('validateAdminPermission:revenuesDelete');
});

//PRODUCTCOMPANIES
Route::prefix('/productcompanies')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ProductCompaniesController::class, 'index'])->name('productcompanies')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [ProductCompaniesController::class, 'create'])->name('productcompanies.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [ProductCompaniesController::class, 'edit'])->name('productcompanies.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [ProductCompaniesController::class, 'view'])->name('productcompanies.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addProductCompanies', [ProductCompaniesController::class, 'addProductCompanies'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/updateProductCompanies', [ProductCompaniesController::class, 'updateProductCompanies'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/getProductCompanies', [ProductCompaniesController::class, 'getProductCompanies'])->middleware('validateAdminPermission:productsView');
    Route::post('/getProductCompany', [ProductCompaniesController::class, 'getProductCompany'])->middleware('validateAdminPermission:productsView');
    Route::post('/deleteProductCompanies', [ProductCompaniesController::class, 'deleteProductCompanies'])->middleware('validateAdminPermission:productsDelete');
});

//PRODUCTBRANDS
Route::prefix('/productbrands')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ProductBrandsController::class, 'index'])->name('productbrands')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [ProductBrandsController::class, 'create'])->name('productbrands.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [ProductBrandsController::class, 'edit'])->name('productbrands.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [ProductBrandsController::class, 'view'])->name('productbrands.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addProductBrands', [ProductBrandsController::class, 'addProductBrands'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/updateProductBrands', [ProductBrandsController::class, 'updateProductBrands'])->middleware('validateAdminPermission:productsWrite');
    Route::post('/getProductBrands', [ProductBrandsController::class, 'getProductBrands'])->middleware('validateAdminPermission:productsView');
    Route::post('/getProductBrand', [ProductBrandsController::class, 'getProductBrand'])->middleware('validateAdminPermission:productsView');
    Route::post('/deleteProductBrands', [ProductBrandsController::class, 'deleteProductBrands'])->middleware('validateAdminPermission:productsDelete');
});

//VOUCHERS
Route::prefix('/vouchers')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [VouchersController::class, 'index'])->name('vouchers')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [VouchersController::class, 'create'])->name('vouchers.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [VouchersController::class, 'edit'])->name('vouchers.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [VouchersController::class, 'view'])->name('vouchers.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addVouchers', [VouchersController::class, 'addVouchers'])->middleware('validateAdminPermission:vouchersWrite');
    Route::post('/updateVouchers', [VouchersController::class, 'updateVouchers'])->middleware('validateAdminPermission:vouchersWrite');
    Route::post('/getVouchers', [VouchersController::class, 'getVouchers'])->middleware('validateAdminPermission:vouchersView');
    Route::post('/getUsedVouchers', [VouchersController::class, 'getUsedVouchers'])->middleware('validateAdminPermission:vouchersView');
    Route::post('/getUnusedVouchers', [VouchersController::class, 'getUnusedVouchers'])->middleware('validateAdminPermission:vouchersView');
    Route::post('/getVoucher', [VouchersController::class, 'getVoucher'])->middleware('validateAdminPermission:vouchersView');
    Route::post('/validateVoucher', [VouchersController::class, 'validateVoucher']);
    Route::post('/deleteVouchers', [VouchersController::class, 'deleteVouchers'])->middleware('validateAdminPermission:vouchersWrite');
    // voucher Sales
    Route::get('/sale', [VoucherSalesController::class, 'create'])->name('vouchers.sale')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/saleslists', [VoucherSalesController::class, 'index'])->name('vouchers.saleslists')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/sales-view', [VoucherSalesController::class, 'view'])->name('vouchers.salesview')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/sales-edit', [VoucherSalesController::class, 'edit'])->name('vouchers.salesedit')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getVoucherSalesData', [VoucherSalesController::class, 'getVoucherSalesData'])->middleware('validateAdminPermission:vouchersView');
    Route::post('/getVoucherSaleData', [VoucherSalesController::class, 'getVoucherSaleData'])->middleware('validateAdminPermission:vouchersView');
    Route::post('/addVoucherSale', [VoucherSalesController::class, 'addVoucherSale'])->middleware('validateAdminPermission:vouchersWrite');
    Route::post('/updateVoucherSales', [VoucherSalesController::class, 'updateVoucherSales'])->middleware('validateAdminPermission:vouchersWrite');
});

//PAYORDER
Route::prefix('/payorder')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/create', [PayOrderController::class, 'create'])->name('payorder.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addPayOrder', [PayOrderController::class, 'addPayOrder'])->middleware('validateAdminPermission:purchase_paymentWrite');
    Route::post('/getSupplierCreditBills', [PayOrderController::class, 'getSupplierCreditBills'])->middleware('validateAdminPermission:purchase_paymentView');
    Route::post('/getSupplierPoCreditBills', [PayOrderController::class, 'getSupplierPoCreditBills'])->middleware('validateAdminPermission:purchase_paymentView');
});

//COLLECTCREDIT
Route::prefix('/collectcredit')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/create', [CollectCreditController::class, 'create'])->name('collectcredit.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addCollectCredit', [CollectCreditController::class, 'addCollectCredit'])->middleware('validateAdminPermission:sales_paymentWrite');
    Route::post('/getCustomerCreditBills', [CollectCreditController::class, 'getCustomerCreditBills'])->middleware('validateAdminPermission:sales_paymentView');
});

//CHEQUE ISSUED
Route::prefix('/chequeissue')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ChequeIssuedController::class, 'index'])->name('chequeissued')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [ChequeIssuedController::class, 'edit'])->name('chequeissued.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/print', [ChequeIssuedController::class, 'print'])->name('chequeissued.print')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [ChequeIssuedController::class, 'view'])->name('chequeissued.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getCheques', [ChequeIssuedController::class, 'getCheques'])->middleware('validateAdminPermission:chequesView');
    Route::post('/getCheque', [ChequeIssuedController::class, 'getCheque'])->middleware('validateAdminPermission:chequesView');
    Route::post('/changeStatus', [ChequeIssuedController::class, 'changeStatus'])->middleware('validateAdminPermission:chequesWrite');
    Route::post('/updateCheque', [ChequeIssuedController::class, 'updateCheque'])->middleware('validateAdminPermission:chequesWrite');
});

//CHEQUE RECEIVED
Route::prefix('/chequereceived')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ChequeReceivedController::class, 'index'])->name('chequereceived')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [ChequeReceivedController::class, 'edit'])->name('chequereceived.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/print', [ChequeReceivedController::class, 'print'])->name('chequereceived.print')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [ChequeReceivedController::class, 'view'])->name('chequereceived.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addCollectCredit', [ChequeReceivedController::class, 'addCollectCredit'])->middleware('validateAdminPermission:chequesWrite');
    Route::post('/getCheques', [ChequeReceivedController::class, 'getCheques'])->middleware('validateAdminPermission:chequesView');
    Route::post('/getCheque', [ChequeReceivedController::class, 'getCheque'])->middleware('validateAdminPermission:chequesView');
    Route::post('/changeStatus', [ChequeReceivedController::class, 'changeStatus'])->middleware('validateAdminPermission:chequesWrite');
    Route::post('/updateCheque', [ChequeReceivedController::class, 'updateCheque'])->middleware('validateAdminPermission:chequesWrite');
});
//STOCK COUNT
Route::prefix('/stockCount')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [StockCountController::class, 'index'])->name('stockcount')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [StockCountController::class, 'create'])->name('stockcount.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [StockCountController::class, 'edit'])->name('stockcount.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [StockCountController::class, 'view'])->name('stockcount.view')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addStockCount', [StockCountController::class, 'addStockCount'])->middleware('validateAdminPermission:stock_countWrite');
    Route::post('/getStockcountData', [StockCountController::class, 'getStockcountData'])->middleware('validateAdminPermission:stock_countView');
    Route::post('/getStockCount', [StockCountController::class, 'getStockCount'])->middleware('validateAdminPermission:stock_countView');
    Route::post('/updateStockCount', [StockCountController::class, 'updateStockCount'])->middleware('validateAdminPermission:stock_countWrite');
    Route::post('/deleteStockCount', [StockCountController::class, 'deleteStockCount'])->middleware('validateAdminPermission:stock_countDelete');
    // STOCK COUNT PRODUCT
    Route::get('/addProduct', [StockCountController::class, 'addProduct'])->name('stockcount.addProduct')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/addStockCountProducts', [StockCountController::class, 'addStockCountProducts'])->middleware('validateAdminPermission:stock_countWrite');
    Route::post('/updateStockCountProduct', [StockCountController::class, 'updateStockCountProduct'])->middleware('validateAdminPermission:stock_countWrite');
    Route::post('/deleteStockCountProduct', [StockCountController::class, 'deleteStockCountProduct'])->middleware('validateAdminPermission:stock_countDelete');
    // Route::post('/updateCheque', [StockCountController::class, 'updateCheque']);
});

// LOGS
Route::prefix('/logs')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [ActivityController::class, 'index'])->name('logs')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getModules', [ActivityController::class, 'getModules']);
    Route::post('/getLogsData', [ActivityController::class, 'getLogsData'])->middleware('validateAdminPermission:logsView');
});

// REPORTS
Route::prefix('/reports')->middleware(ValidateAdmin::class)->group(function(){
    //StockReports
    Route::get('/stockReport', [StockReportController::class, 'index'])->name('reports.stockReport')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getStockReport', [StockReportController::class, 'getStockReport'])->middleware('validateAdminPermission:reportsStockReport,stockView');

    //SalesReports
    Route::post('/getSalesQtyProductId', [SalesReportController::class, 'getSalesQtyProductId'])->middleware('validateAdminPermission:productsView');
    Route::post('/getSalesPurchase12Months', [SalesReportController::class, 'getSalesPurchase12Months']);
    Route::post('/getFrequentSaleProducts', [SalesReportController::class, 'getFrequentSaleProducts'])->middleware('validateAdminPermission:reportsFrequentlySales');
    Route::get('/FrequentSalesReport', [SalesReportController::class, 'index'])->name('reports.frequentlysales-report')->withoutMiddleware([ValidateAdmin::class]);
    
    //PurchaseReports
    Route::get('/FrequentPurchaseReport', [PurchaseReportController::class, 'index'])->name('reports.frequentlypurchase-report')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getPurchaseQtyProductId', [PurchaseReportController::class, 'getPurchaseQtyProductId'])->middleware('validateAdminPermission:productsView');
    Route::post('/getFrequentPurchaseProducts', [PurchaseReportController::class, 'getFrequentPurchaseProducts'])->middleware('validateAdminPermission:reportsFrequentlyPurchase');

    //RevenueReports
    Route::post('/getTotalRevenue', [RevenueReportController::class, 'getTotalRevenue']);

    //ExpenseReports
    Route::post('/getTotalExpenses', [ExpenseReportController::class, 'getTotalExpenses']);

    //SalesSummaryReports
    Route::get('/salesSummaryReport', [SalesReportController::class, 'salesSummary'])->name('reports.salessummary-report')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getSalesSummaryReport', [SalesReportController::class, 'getSalesSummaryReport'])->middleware('validateAdminPermission:reportsSalesSummaryReport');
    
    // Gross Profit Reports
    Route::get('/grossProfitReport', [SalesReportController::class, 'grossProfitReport'])->name('reports.profit-report')->withoutMiddleware([ValidateAdmin::class]);
    Route::post('/getGrossProfit', [SalesReportController::class, 'getGrossProfit']);
});

// STOCK
Route::prefix('/stock')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [StockReportController::class, 'stock'])->name('stock')->withoutMiddleware([ValidateAdmin::class]);
});

//STOCK TRANSFER
Route::prefix('/stockTransfer')->middleware(ValidateAdmin::class)->group(function(){
    Route::get('/', [StockTransferController::class, 'index'])->name('stockTransfer')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/create', [StockTransferController::class, 'create'])->name('stockTransfer.create')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/edit', [StockTransferController::class, 'edit'])->name('stockTransfer.edit')->withoutMiddleware([ValidateAdmin::class]);
    Route::get('/view', [StockTransferController::class, 'view'])->name('stockTransfer.view')->withoutMiddleware([ValidateAdmin::class]);

    Route::post('/getTransferSourcesData', [StockTransferSourceController::class, 'getTransferSourcesData']);
    Route::post('/addStockTransfer', [StockTransferController::class, 'addStockTransfer'])->middleware('validateAdminPermission:stock_countView');
    Route::post('/getTransfersData', [StockTransferController::class, 'getTransfersData'])->middleware('validateAdminPermission:stock_countView');
    Route::post('/getStockTransfer', [StockTransferController::class, 'getStockTransfer'])->middleware('validateAdminPermission:stock_countView');
    Route::post('/getWipStockTransfer', [StockTransferController::class, 'getWipStockTransfer'])->middleware('validateAdminPermission:wipView');
    // Route::post('/updateStockCount', [StockCountController::class, 'updateStockCount'])->middleware('validateAdminPermission:stock_countWrite');
    // Route::post('/deleteStockCount', [StockCountController::class, 'deleteStockCount'])->middleware('validateAdminPermission:stock_countDelete');
    // // STOCK COUNT PRODUCT
    // Route::get('/addProduct', [StockCountController::class, 'addProduct'])->name('stockcount.addProduct')->withoutMiddleware([ValidateAdmin::class]);
    // Route::post('/addStockCountProducts', [StockCountController::class, 'addStockCountProducts'])->middleware('validateAdminPermission:stock_countWrite');
    // Route::post('/updateStockCountProduct', [StockCountController::class, 'updateStockCountProduct'])->middleware('validateAdminPermission:stock_countWrite');
    // Route::post('/deleteStockCountProduct', [StockCountController::class, 'deleteStockCountProduct'])->middleware('validateAdminPermission:stock_countDelete');
    // Route::post('/updateCheque', [StockCountController::class, 'updateCheque']);
});






