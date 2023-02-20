@extends('layouts.app')

@section('title', 'Admin Fund')

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Admin Fund
          </h2>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Remove Fund
              </h2>
              <p>
                Remove fund to customer account wallet.
              </p>
            </div>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />

                        
            <form method="POST" action="{{ route('adminRemoveFundSave') }}">
                @csrf
                <div class="max-w-xl">
                    <div x-data="pages.formValidation.initFormValidationExample" class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                        <div>
                            <label class="block">
                                <span>Enter User Id</span>
                                <input
                                    x-effect="minMax9.errorMessage = getErrorMessage(minMax9.value, minMax9.validate)"
                                    class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                    placeholder="Enter User Id"
                                    type="text"
                                    id="userId"
                                    name="userId"
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
                                <span>Enter Amount (USD)</span>
                                <input
                                    x-effect="min.errorMessage = getErrorMessage(min.value, min.validate)"
                                    class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                    placeholder="Enter Amount"
                                    type="text"
                                    id="fundAmount"
                                    name="fundAmount"
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
                        Remove
                    </button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection