@extends('layouts.app')

@section('title', 'Withdrawal')

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Manage Withdrawal
          </h2>
          <div class="space-y-2 md:space-y-2">
            <a href="{{ route('customerWithdrawRoiProfitReport') }}" class="btn bg-primary px-3 py-1 text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 mr-2">
              ROI PROFIT REPORT
            </a>
          </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                ROI Profit
              </h2>
              <p>
                Withdrawal you ROI profit.
              </p>
            </div>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />

            
            <h4 class="py-4 text-info">Your ROI wallet balance: ${{ Auth::user()->roi_wallet_amount }}</h4>
            
            <form method="POST" action="{{ route('customerWithdrawRoiProfitSave') }}">
                @csrf
                <div class="max-w-xl">
                    <div x-data="pages.formValidation.initFormValidationExample" class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                        <div>
                            <label class="block">
                                <span>Enter Amount (USD) <small class="text-success">Min $10</small></span>
                                <input
                                    x-effect="min10.errorMessage = getErrorMessage(min10.value, min10.validate)"
                                    class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                    placeholder="Enter Amount"
                                    type="text"
                                    id="withdrawAmount"
                                    name="withdrawAmount"
                                    required
                                    autofocus
                                    :class="{
                                        'border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent': !min10.blurred,
                                        'border-error': (min10.blurred && min10.errorMessage),
                                        'border-success': (min10.blurred && !min10.errorMessage)
                                    }"
                                    x-model="min10.value"
                                    @blur="min10.blurred = true"
                                />
                            </label>
                            <span class="text-tiny+ text-error" x-show="min10.blurred && min10.errorMessage" x-text="min10.errorMessage"></span>
                        </div>
                    </div>
                    
                    @if (config('services.withdrawalcharges.roi') > 0)
                        <h4 class="py-4 text-warning">Withdrawal charge: {{ config('services.withdrawalcharges.roi') }}%</h4>    
                    @endif                    
                    
                    <button class="btn mt-5 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        Withdraw
                    </button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection