@extends('layouts.app')

@section('title', 'Manage Withdrawal')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Manage Withdrawal
          </h2>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Pending Withdrawal Report
              </h2>
              <p>
                List of all pending withdrawal.
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
                          Withdrawal Amount
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Deduction
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Net Amount
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Wallet Address
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                          Withdraw Date
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
                        @php
                            $deduction = ($item->withdrawal_amount * $item->deduction) / 100;
                        @endphp
                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $i++ }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->login_id }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->name }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                ${{ $item->withdrawal_amount }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                ${{ $deduction }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                ${{ $item->withdrawal_amount - $deduction }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $item->wallet_address }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ date('d M Y', strtotime($item->created_at)) }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <button onclick="openActivateWithdrawalModal({{$item}})" class="btn bg-primary px-3 py-1 text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 mr-2">
                                    Pay
                                </button>
                                <button onclick="openDeclineWithdrawalModal({{$item}})" class="btn bg-warning px-3 py-1 text-xs font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 mr-2">
                                    Decline
                                </button>
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

    <form id="confirmWithdrawal" action="{{ route('adminConfirmWithdrawalSave') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden"  name="withdrawalRequestId" id="withdrawalRequestId" value="" />
    </form>

    <form id="declineWithdrawal" action="{{ route('adminDeclineWithdrawalSave') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden"  name="withdrawalRequestIdDeclined" id="withdrawalRequestIdDeclined" value="" />
    </form>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready( function () {
          $('#tableDataTbl').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
          });
        });

        function openActivateWithdrawalModal(item) {
                $("#withdrawalRequestId").val(item.id);
            if (confirm("Confirm Withdrawal ?")) {
                event.preventDefault();
                document.getElementById("confirmWithdrawal").submit();
            }
        }

        function openDeclineWithdrawalModal(item) {
                $("#withdrawalRequestIdDeclined").val(item.id);
            if (confirm("Decline Withdrawal ?")) {
                event.preventDefault();
                document.getElementById("declineWithdrawal").submit();
            }
        }
    </script>
@endsection