@extends('layouts.app')

@section('title', 'Activations')

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Activations
          </h2>
          <div class="space-y-2 md:space-y-2">
            <a href="{{ route('customerMyActivationList') }}" class="btn bg-primary px-3 py-1 text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 mr-2">
              My Activations
            </a>
            <a href="{{ route('customerAffiliateActivationList') }}" class="btn bg-success px-3 py-1 text-xs font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
              Affiliate Activations
            </a>
          </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Activate Account
              </h2>
              <p>
                Activate your account using your account wallet fund.
              </p>
            </div>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />
            
            @if (date('Y-m-d') >= "2023-02-20")
                <form method="POST" action="{{ route('customerActivateAccountSave') }}">
                    @csrf
                    <div class="w-full">
                        <div x-data="pages.formValidation.initFormValidationExample" class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
                            <div>
                                <label class="block">
                                    <span>Enter User Id</span>
                                    <input
                                        x-effect="minMax9.errorMessage = getErrorMessage(minMax9.value, minMax9.validate)"
                                        class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                        placeholder="Enter User Id"
                                        type="text"
                                        id="activationUserId"
                                        name="activationUserId"
                                        required
                                        autofocus
                                        :class="{
                                            'border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent': !minMax9.blurred,
                                            'border-error': (minMax9.blurred && minMax9.errorMessage),
                                            'border-success': (minMax9.blurred && !minMax9.errorMessage)
                                        }"
                                        x-model="minMax9.value"
                                        @blur="minMax9.blurred = true"
                                    />
                                </label>
                                <span class="text-tiny+ text-error" x-show="minMax9.blurred && minMax9.errorMessage" x-text="minMax9.errorMessage"></span>
                            </div>
                            <div>
                                <label class="block">
                                    <span>Select Package ($)</span>
                                    <select id="package" name="package" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" required>
                                        <option value="" selected>Please select</option>
                                        @foreach ($packages as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div>
                                <label class="block">
                                    <span>Enter Amount (USD)</span>
                                    <input
                                        x-effect="min.errorMessage = getErrorMessage(min.value, min.validate)"
                                        class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                        placeholder="Enter Amount"
                                        type="text"
                                        id="activationAmount"
                                        name="activationAmount"
                                        required
                                        autofocus
                                        :class="{
                                            'border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent': !min.blurred,
                                            'border-error': (min.blurred && min.errorMessage),
                                            'border-success': (min.blurred && !min.errorMessage)
                                        }"
                                        x-model="min.value"
                                        @blur="min.blurred = true"
                                    />
                                </label>
                                <span class="text-tiny+ text-error" x-show="min.blurred && min.errorMessage" x-text="min.errorMessage"></span>
                            </div>
                        </div>
                        <button class="btn mt-5 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Submit
                        </button>
                    </div>
                </form>
            @else
                <div class="py-6">
                  <h2 class="text-xl text-primary">Activation will start from 20th Feb 2023.</h2>
                </div>
            @endif

            
          </div>
        </div>
    </div>
@endsection