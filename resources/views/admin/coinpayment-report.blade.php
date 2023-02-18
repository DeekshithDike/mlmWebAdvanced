@extends('layouts.app')

@section('title', 'Coinpayment Report')

@section('styles')    
    <!-- FooTable -->
    <link href="{{ asset('dashboard-assets/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Coinpayment Report
          </h2>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Coinpayment Report
              </h2>
              <p>
                Cist of all coinpayment charges.
              </p>
            </div>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />
            
            <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <input type="text" class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70" id="filter" placeholder="Search in table">

                  <table id="tableDataTbl" class="footable table table-stripped toggle-arrow-tiny" data-page-size="15" data-filter=#filter>
                    <thead>
                      <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          #
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          User ID
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Full Name
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Email
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Order Id
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Transaction Id
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Address
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Amount
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Coin
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Date
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Status
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $item)
                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $i++ }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->login_id }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->name }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->email }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->order_id }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->txn_id }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->address }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                ${{ $item->amount_total_fiat }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->coin }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ date('d M Y', strtotime($item->created_at)) }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->type == "admin")
                                  NA
                              @else
                                  <a href="{{ $item->status_url }}" class="text-info">View</a>
                              @endif                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>  
                </div>
            </div>
            
          </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard-assets/js/jquery-3.1.1.min.js') }}"></script>

    <!-- FooTable -->
    <script src="{{ asset('dashboard-assets/js/plugins/footable/footable.all.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.footable').footable();
        });
    </script>
@endsection