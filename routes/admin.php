<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\AccountActivationController;
use App\Http\Controllers\Admin\FundController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\Admin\ProfitController;
use App\Http\Controllers\Admin\TransferController;
use App\Http\Controllers\CoinpaymentController;

// routes for admin
Route::prefix('admin')->group(function () {

    // Authenticated & Email verified routes for only customer
    Route::group(['middleware' => ['auth','adminauth','verified']], function (){
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'viewDashboard'])->name('adminDashboard');

        // Manage Users
        Route::prefix('users')->group(function () {
            Route::get('downline', [ManageUsersController::class, 'listDownlineUsers'])->name('adminDownlineUsers');
            Route::get('blocked', [ManageUsersController::class, 'listBlockedUsers'])->name('adminBlockedUsers');
            Route::get('tree', [ManageUsersController::class, 'listUsersTree'])->name('adminUsersTree');
            Route::get('tree/{id}', [ManageUsersController::class, 'listIndividualUsersTree']);
            Route::post('search-tree', [ManageUsersController::class, 'searchIndividualUsersTree'])->name('searchIndividualUsersTree');
            
            Route::post('admin-block-user', [ManageUsersController::class, 'blockUser'])->name('adminBlockUser');
            Route::post('admin-unblock-user', [ManageUsersController::class, 'unBlockUser'])->name('adminUnBlockUser');
        });

        // Activations
        Route::prefix('activations')->group(function () {
            // Route::get('pending', [AccountActivationController::class, 'listPendingActivations'])->name('adminPendingActivations');
            // Route::post('admin-activate-account', [AccountActivationController::class, 'activateAccountSave'])->name('adminActivateAccountSave');
            // Route::post('admin-decline-account', [AccountActivationController::class, 'declineAccountSave'])->name('adminDeclineActivationSave');
            Route::get('activated', [AccountActivationController::class, 'listActivatedAccounts'])->name('adminActivatedAccounts');
            // Route::get('declined', [AccountActivationController::class, 'listDeclinedActivations'])->name('adminDeclinedActivations');
        });

        // Manage Customer Funds
        Route::prefix('customer/funds')->group(function () {
            Route::get('pending', [FundController::class, 'listPendingCustomerFunds'])->name('adminPendingCustomerFunds');
            // Route::post('admin-confirm-customer-fund', [FundController::class, 'confirmCustomerFundSave'])->name('adminConfirmCustomerFundSave');
            // Route::post('admin-decline-customer-fund', [FundController::class, 'declineCustomerFundSave'])->name('adminDeclineCustomerFundSave');
            Route::get('confirmed', [FundController::class, 'listConfirmedFunds'])->name('adminConfirmedFunds');
            // Route::get('declined', [FundController::class, 'listDeclinedFunds'])->name('adminDeclinedFunds');
        });

        // Withdrawal
        Route::prefix('withdrawal')->group(function () {
            Route::get('pending', [WithdrawalController::class, 'listPendingWithdrawal'])->name('adminPendingWithdrawal');
            Route::post('admin-confirm-withdrawal', [WithdrawalController::class, 'confirmWithdrawalSave'])->name('adminConfirmWithdrawalSave');
            Route::post('admin-decline-withdrawal', [WithdrawalController::class, 'declineWithdrawalSave'])->name('adminDeclineWithdrawalSave');
            Route::get('confirmed', [WithdrawalController::class, 'listConfirmedWithdrawal'])->name('adminConfirmedWithdrawal');
            Route::get('declined', [WithdrawalController::class, 'listDeclinedWithdrawal'])->name('adminDeclinedWithdrawal');
        });

        // Profit
        Route::prefix('profit')->group(function () {
            Route::get('direct-members', [ProfitController::class, 'directMemberProfit'])->name('adminDirectMembersProfit');
            Route::get('roi', [ProfitController::class, 'roiIncomeProfit'])->name('adminRoiIncomeProfit');
            Route::get('binary', [ProfitController::class, 'binaryProfit'])->name('adminBinaryProfit');
        });        

        // Transfer
        Route::prefix('transfer')->group(function () {
            Route::get('report', [TransferController::class, 'transferReport'])->name('adminTransferReport');           
        });

        // Admin Fund
        Route::prefix('fund')->group(function () {
            Route::get('add', [FundController::class, 'listAddFund'])->name('adminAddFund');
            Route::get('add/report', [FundController::class, 'listAddFundReport'])->name('adminAddFundReport');
            Route::get('remove', [FundController::class, 'listRemoveFund'])->name('adminRemoveFund');
            Route::get('remove/report', [FundController::class, 'listRemoveFundReport'])->name('adminRemoveFundReport');
            
            Route::post('admin-addfund', [FundController::class, 'addFundSave'])->name('adminAddFundSave');
            Route::post('admin-removefund', [FundController::class, 'removeFundSave'])->name('adminRemoveFundSave');
        });

        // Coinpayment
        Route::prefix('coinpayment')->group(function () {
            Route::get('report', [CoinpaymentController::class, 'listCoinpaymentReport'])->name('adminCoinpaymentReport');           
        });

        // Admin Topup
        Route::prefix('topup')->group(function () {
            Route::get('add', [AccountActivationController::class, 'listAddTopup'])->name('adminAddTopup');
            Route::get('report', [AccountActivationController::class, 'listAddTopupReport'])->name('adminAddTopupReport');
            
            Route::post('admin-addtopup', [AccountActivationController::class, 'addTopupSave'])->name('adminAddTopupSave');
        });

        // update user profile
        Route::prefix('customer')->group(function () {
            Route::get('profile/{id}', [ManageUsersController::class, 'viewEditUserProfile'])->name('adminEditUserProfile');
            Route::post('profile', [ManageUsersController::class, 'storeCustomerProfilePhoto'])->name('adminSubmitCustomerProfilePhoto');
            Route::post('profile/save', [ManageUsersController::class, 'storeCustomerProfileDet'])->name('adminStoreCustomerProfileDet');
            
            Route::get('change-password/{id}', [ManageUsersController::class, 'viewCustomerChangePassword'])->name('adminCustomerChangePassword');
            Route::post('change-password', [ManageUsersController::class, 'adminCustomerChangePasswordSave'])->name('adminCustomerChangePasswordSave');
            
            Route::get('wallet-address/{id}', [ManageUsersController::class, 'viewCustomerWalletAddress'])->name('adminCustomerWalletAddress');
            Route::post('wallet-address', [ManageUsersController::class, 'viewCustomerWalletAddressSave'])->name('adminCustomerWalletAddressSave');
            
            Route::get('dashboard/{id}', [ManageUsersController::class, 'viewCustomerDashboard'])->name('adminViewCustomerDashboard');
        });

    });
});