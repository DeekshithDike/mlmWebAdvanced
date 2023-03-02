@extends('layouts.app')

@section('title', 'Manage Users')

@section('styles')    
    <!-- FooTable -->
    <link href="{{ asset('dashboard-assets/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Manage Users
          </h2>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Downline Users
              </h2>
              <p>
                List of all downline users.
              </p>
            </div>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />
            
            <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  {{-- <input type="text" class="form-input mt-1.5 w-full rounded-lg border bg-transparent px-3 py-2 placeholder:text-slate-400/70" id="filter" placeholder="Search in table"> --}}

                  <table id="tableDataTbl" class="footable table table-stripped toggle-arrow-tiny" data-page-size="{{ count($data) }}" data-filter=#filter>
                    <thead>
                      <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                        <th data-toggle="true" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
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
                          Mobile No
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Sponsor ID
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Country
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Account Wallet
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Working Wallet
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Roi Wallet
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          BTC Address
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Amount
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Join Date
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Last Login Date
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Registered IP
                        </th>
                        <th data-hide="all" class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Last Login IP
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
                                {{ $item->email }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->mobile_no }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->sponsor_id }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->country }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                @if ($item->fund_wallet_amount == null)
                                    0
                                @else
                                    {{ $item->fund_wallet_amount }}
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->working_wallet_amount == null)
                                  0
                              @else
                                  {{ $item->working_wallet_amount }}
                              @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->roi_wallet_amount == null)
                                  0
                              @else
                                  {{ $item->roi_wallet_amount }}
                              @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->wallet_address == null)
                                  NA
                              @else
                                  {{ $item->wallet_address }}
                              @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                ${{ $item->getActiveActivations->sum('activation_amount') }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ date('d M Y', strtotime($item->created_at)) }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->last_login_datetime == null)
                                  NA
                              @else
                                  {{ date('d M Y', strtotime($item->last_login_datetime)) }}
                              @endif                                
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->reg_ip_address == null)
                                  NA
                              @else
                                  {{ $item->reg_ip_address }}
                              @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                              @if ($item->login_ip_address == null)
                                  NA
                              @else
                                  {{ $item->login_ip_address }}
                              @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <button onclick="openBlockUserModal({{$item}})" class="btn bg-warning px-3 py-1 text-xs font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 mr-2">
                                    Block
                                </button>
                                <a href="{{ url('admin/customer/profile/'.Crypt::encrypt($item->userID)) }}" class="btn bg-success px-3 py-1 text-xs font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 mr-2">
                                    Edit
                                </a>
                                <a href="{{ url('admin/customer/dashboard/'.Crypt::encrypt($item->userID)) }}" class="btn bg-info px-3 py-1 text-xs font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 mr-2">
                                    Login
                                </a>
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

    <form id="downlineBlockUserForm" action="{{ route('adminBlockUser') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden"  name="downlineBlocUserID" id="downlineBlocUserID" value="" />
    </form>
@endsection

@section('scripts')    
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>

    <!-- FooTable -->
    <script src="{{ asset('dashboard-assets/js/plugins/footable/footable.all.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('.footable').footable();
            $('#tableDataTbl').DataTable();
        });

        function openBlockUserModal(item) {
                $("#downlineBlocUserID").val(item.userID);
            if (confirm("Block User ?")) {
                event.preventDefault();
                document.getElementById("downlineBlockUserForm").submit();
            }
        }
    </script>
@endsection