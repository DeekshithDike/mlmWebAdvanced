@extends('layouts.app')

@section('title', 'Manage Fund')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Manage Funds
          </h2>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Customer Confirmed Fund
              </h2>
              <p>
                List of all customer confirmed funds request.
              </p>
            </div>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />
            
            <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <table class="w-full text-left" id="tableDataTbl">
                    <thead>
                      <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          #
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          User ID
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Name
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Order ID
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Transaction ID
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Date
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Amount
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Action
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
                                {{ $item->order_id }}
                            </td>
                            <th class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->type != 'admin')
                                  {{ $item->txn_id }}
                              @else
                                  NA
                              @endif
                            </th>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ date('d M Y', strtotime($item->created_at)) }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                ${{ $item->amount }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->status_url != null)
                                  <a href="{{ $item->status_url }}" class="text-primary">Checkout</a>
                              @else
                                  NA
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
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#tableDataTbl').DataTable();
        } );
    </script>
@endsection