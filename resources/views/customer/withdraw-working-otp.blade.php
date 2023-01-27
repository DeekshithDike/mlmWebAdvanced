@extends('layouts.app')

@section('title', 'Withdrawal')

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            OTP Verification
          </h2>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Enter 6 digit OTP sent to your registered email address to complete the withdrawal.
              </h2>
            </div>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />
            
            <form method="POST" action="{{ route('customerWithdrawWorkingProfitSave') }}">
                @csrf
                <input type="hidden" name="withdrawAmount" value="{{ $withdrawAmount }}" />
                <input type="hidden" name="withdrawalOTPEncrypted" value="{{ $otp }}" />
                <div class="max-w-xl">
                    <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                        <div>
                            <label class="block">
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                    placeholder="Enter 6 digit OTP"
                                    type="text"
                                    id="withdrawalOTP"
                                    name="withdrawalOTP"
                                    required
                                    autofocus
                                    class="border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                />
                            </label>
                        </div>
                    </div>
                        
                    <button class="btn mt-5 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        Verify
                    </button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection