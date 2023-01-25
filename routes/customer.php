<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\FundController;
use App\Http\Controllers\Customer\AccountActivationController;
use App\Http\Controllers\Customer\AffiliateController;
use App\Http\Controllers\Customer\WithdrawalController;
use App\Http\Controllers\Customer\ProfitController;
use App\Http\Controllers\Customer\TransferController;

// routes for customer
Route::prefix('customer')->group(function () {

    // Authenticated & Email verified routes for only customer
    Route::group(['middleware' => ['auth','customerauth','verified']], function (){
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'viewDashboard'])->name('customerDashboard');

        // Profile Settings
        Route::get('profile', [DashboardController::class, 'viewCustomerProfile'])->name('customerProfileSettings');
        Route::post('profile', [DashboardController::class, 'storeCustomerProfilePhoto'])->name('submitCustomerProfilePhoto');
        Route::match(['get', 'post'], 'change-password', [DashboardController::class, 'changePassword'])->name('customerChangePassword');
        Route::match(['get', 'post'], 'btc-address', [DashboardController::class, 'btcAddress'])->name('customerBtcAddress');

        // Fund
        Route::prefix('fund')->group(function () {
            Route::get('create', [FundController::class, 'addFund'])->name('customerAddFund');
            Route::post('save', [FundController::class, 'addFundSave'])->name('customerAddFundSave');
            Route::get('pending', [FundController::class, 'listPendingFund'])->name('customerPendingFundList');
            Route::get('confirmed', [FundController::class, 'listConfirmedFund'])->name('customerConfirmedFundList');
        });

        // Activations
        Route::prefix('activations')->group(function () {
            Route::get('create', [AccountActivationController::class, 'activateAccount'])->name('customerActivateAccount');
            Route::post('save', [AccountActivationController::class, 'activateAccountSave'])->name('customerActivateAccountSave');
            Route::get('my', [AccountActivationController::class, 'myActivations'])->name('customerMyActivationList');
            Route::get('affiliate', [AccountActivationController::class, 'affiliateActivations'])->name('customerAffiliateActivationList');
        });

        // Affiliate
        Route::prefix('affiliate')->group(function () {
            Route::get('tree', [AffiliateController::class, 'viewMemberTree'])->name('customerMemberTree');
            Route::get('tree/{id}', [AffiliateController::class, 'viewIndividualMemberTree']);
            Route::get('direct', [AffiliateController::class, 'viewDirectMembers'])->name('customerDirectMembers');
            Route::get('all', [AffiliateController::class, 'viewAllMembers'])->name('customerAllMembers');
        });

        // Withdrawal
        Route::prefix('withdrawal')->group(function () {
            Route::get('working-profit', [WithdrawalController::class, 'withdrawWorkingProfit'])->name('customerWithdrawWorkingProfit');
            Route::post('save-working-profit', [WithdrawalController::class, 'withdrawWorkingProfitSave'])->name('customerWithdrawWorkingProfitSave');
            Route::get('roi-profit', [WithdrawalController::class, 'withdrawRoiProfit'])->name('customerWithdrawRoiProfit');
            Route::post('save-roi-profit', [WithdrawalController::class, 'withdrawRoiProfitSave'])->name('customerWithdrawRoiProfitSave');

            Route::prefix('report')->group(function () {
                Route::get('working-profit', [WithdrawalController::class, 'workingProfitReport'])->name('customerWithdrawWorkingProfitReport');
                Route::get('roi-profit', [WithdrawalController::class, 'roiProfitReport'])->name('customerWithdrawRoiProfitReport');
            });            
        });

        // Profit
        Route::prefix('profit')->group(function () {
            Route::get('direct-members', [ProfitController::class, 'directMemberProfit'])->name('customerDirectMembersProfit');
            Route::get('roi', [ProfitController::class, 'roiIncomeProfit'])->name('customerRoiIncomeProfit');
            Route::get('binary', [ProfitController::class, 'binaryProfit'])->name('customerBinaryProfit');
        });

        // Transfer
        Route::prefix('transfer')->group(function () {
            Route::get('km-to-km', [TransferController::class, 'kmToKmTransfer'])->name('customerKmToKmTransfer');
            Route::post('save-km-to-km', [TransferController::class, 'kmToKmTransferSave'])->name('customerKmToKmTransferSave');

            Route::get('roi-to-km', [TransferController::class, 'roiToKmTransfer'])->name('customerRoiToKmTransfer');
            Route::post('save-roi-to-km', [TransferController::class, 'roiToKmTransferSave'])->name('customerRoiToKmTransferSave');

            Route::get('working-to-km', [TransferController::class, 'workingToKmTransfer'])->name('customerWorkingToKmTransfer');
            Route::post('save-working-to-km', [TransferController::class, 'workingToKmTransferSave'])->name('customerWorkingToKmTransferSave');

            Route::prefix('report')->group(function () {
                Route::get('transfer', [TransferController::class, 'transferReport'])->name('customerTransferReport');
                // Route::get('km-to-km', [TransferController::class, 'kmToKmTransferReport'])->name('customerKmToKmTransferReport');
                // Route::get('roi-to-km', [TransferController::class, 'roiToKmTransferReport'])->name('customerRoiToKmTransferReport');
                // Route::get('working-to-km', [TransferController::class, 'workingToKmTransferReport'])->name('customerWorkingToKmTransferReport');
            });            
        });


    });
});