@extends('layouts.app')

@section('title', 'Manage Fund')

@section('content')
    <div>
        <div class="flex items-center justify-between space-x-4 py-5 lg:py-6">
          <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
          >
            Customer Profile Setting
          </h2>
          <a href="{{ route('adminDownlineUsers') }}" class="btn bg-primary text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">Go Back</a>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <div class="flex items-center space-x-4">
                <div class="avatar h-14 w-14">
                    @if ($data->profile_path)
                        <img
                            class="rounded-full"
                            src="{{ config('app.url') }}/storage/profile/{{ $data->profile_path }}"
                            alt="avatar"
                        />
                    @else
                        <img
                            class="rounded-full"
                            src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"
                            alt="avatar"
                        />
                    @endif
                </div>
                <div>
                  <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                  >
                    {{ $data->name }}
                  </h3>
                  <p class="text-xs+">{{ $data->login_id }}</p>
                </div>
              </div>
              <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                  <a
                    class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent"
                    href="{{ url('admin/customer/profile/'.Crypt::encrypt($data->id)) }}"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5"
                      fill="none"
                      viewbox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                    <span>Basic Information</span>
                  </a>
                </li>
                <li>
                  <a
                    class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                    href="{{ url('admin/customer/change-password/'.Crypt::encrypt($data->id)) }}"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                      fill="none"
                      viewbox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                      />
                    </svg>
                    <span>Change Password</span>
                  </a>
                </li>
                <li>
                  <a
                    class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                    href="{{ url('admin/customer/wallet-address/'.Crypt::encrypt($data->id)) }}"
                  >
                    <svg 
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                      fill="none"
                      viewbox="0 0 24 24"
                      stroke="currentColor"
                    >
                        <path d="M13.1771 11.4019H10.8229C10.4627 11.4019 10.1699 11.1088 10.1699 10.7488V8.9224C10.1699 8.5624 10.4629 8.26934 10.8229 8.26934H13.1771C13.5371 8.26934 13.8299 8.5624 13.8299 8.9224C13.8299 9.2168 14.0688 9.45574 14.3632 9.45574C14.6576 9.45574 14.8965 9.2168 14.8965 8.9224C14.8965 7.97414 14.1251 7.20267 13.1771 7.20267H12.5333V6.26667C12.5333 5.97227 12.2944 5.73334 12 5.73334C11.7056 5.73334 11.4667 5.97227 11.4667 6.26667V7.20294H10.8229C9.87466 7.20294 9.1032 7.9744 9.1032 8.92267V10.7491C9.1032 11.6973 9.87466 12.4691 10.8229 12.4691H13.1771C13.1776 12.4691 13.1779 12.4691 13.1784 12.4691C13.5376 12.4699 13.8299 12.7624 13.8299 13.1221V14.9485C13.8299 15.3088 13.5368 15.6016 13.1771 15.6016H10.8229C10.4627 15.6016 10.1699 15.3085 10.1699 14.9485C10.1699 14.6541 9.93093 14.4152 9.63653 14.4152C9.34213 14.4152 9.1032 14.6541 9.1032 14.9485C9.1032 15.8968 9.87466 16.6683 10.8229 16.6683H11.4667V17.7333C11.4667 18.0277 11.7056 18.2667 12 18.2667C12.2944 18.2667 12.5333 18.0277 12.5333 17.7333V16.6677H13.1771C14.1253 16.6677 14.8965 15.896 14.8965 14.948V13.1216C14.8965 12.1733 14.1253 11.4019 13.1771 11.4019Z" fill="white"/>
                        <path d="M4.01333 9.4048C3.94853 9.4048 3.8824 9.39307 3.81866 9.36773C3.54453 9.26 3.4096 8.9504 3.51706 8.67627C4.50986 6.14853 6.55573 4.2072 9.13013 3.34987C9.40906 3.25627 9.71146 3.408 9.80453 3.68747C9.8976 3.96693 9.7464 4.26907 9.46693 4.36187C7.19333 5.11893 5.3864 6.8336 4.50986 9.06613C4.42746 9.27627 4.2264 9.4048 4.01333 9.4048Z" fill="white"/>
                        <path d="M12.0157 21.1392C11.7213 21.1392 11.4824 20.9003 11.4824 20.6059C11.4824 20.3115 11.7213 20.0726 12.0157 20.0726C16.4603 20.0726 20.0765 16.4563 20.0765 12.0115C20.0765 11.7171 20.3155 11.4781 20.6099 11.4781C20.9043 11.4781 21.1432 11.7171 21.1432 12.0115C21.1432 17.0448 17.0488 21.1392 12.0157 21.1392Z" fill="white"/>
                        <path d="M12 24C5.3832 24 0 18.6168 0 12C0 5.3832 5.3832 0 12 0C13.8624 0 15.6483 0.4152 17.3067 1.23413C17.5707 1.36453 17.6789 1.68427 17.5485 1.94853C17.4184 2.21253 17.0987 2.32107 16.8341 2.19067C15.324 1.4448 13.6973 1.06667 12 1.06667C5.97147 1.06667 1.06667 5.97147 1.06667 12C1.06667 18.0285 5.97147 22.9333 12 22.9333C18.0285 22.9333 22.9333 18.0285 22.9333 12C22.9333 9.89333 22.3331 7.84827 21.1976 6.08613C21.0379 5.8384 21.1093 5.50827 21.3571 5.3488C21.6048 5.1896 21.9347 5.26053 22.0944 5.50827C23.3408 7.4432 24 9.688 24 12C24 18.6168 18.6168 24 12 24Z" fill="white"/>
                        <path d="M19.7808 5.308C19.4864 5.308 19.2475 5.06907 19.2475 4.77467V2.1424C19.2475 1.848 19.4864 1.60907 19.7808 1.60907C20.0752 1.60907 20.3141 1.848 20.3141 2.1424V4.77467C20.3141 5.06934 20.0752 5.308 19.7808 5.308Z" fill="white"/>
                        <path d="M21.0968 3.99199H18.4645C18.1701 3.99199 17.9312 3.75306 17.9312 3.45866C17.9312 3.16426 18.1701 2.92532 18.4645 2.92532H21.0968C21.3912 2.92532 21.6301 3.16426 21.6301 3.45866C21.6301 3.75306 21.3915 3.99199 21.0968 3.99199Z" fill="white"/>
                    </svg>
                    <span> BTC Address </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-span-12 lg:col-span-8">
            <div class="card">
              <div
                class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
              >
                <h2
                  class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                >
                  Basic Information
                </h2>
              </div>
              <div class="p-4 sm:p-5">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

                <!-- Success Message -->
                <x-alert-success />

                <div class="flex flex-col">
                  <span
                    class="text-base font-medium text-slate-600 dark:text-navy-100"
                    >Profile</span
                  >
                  <div class="avatar mt-1.5 h-20 w-20">
                    @if ($data->profile_path)
                        <img
                            class="mask is-squircle"
                            src="{{ config('app.url') }}/storage/profile/{{ $data->profile_path }}"
                            alt="avatar"
                            />
                    @else
                        <img
                            class="mask is-squircle"
                            src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"
                            alt="avatar"
                            />
                    @endif
                    
                    <div
                      class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700"
                    >
                      <form id="adminSubmitCustomerProfilePhoto" method="POST" action="{{ route('adminSubmitCustomerProfilePhoto') }}" style="display:none;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="{{ $data->id }}" name="editUserID" />
                        <input id="profileFile" name="profileFile" type="file" style="display:none;" accept="image/*" />
                      </form>
                      <button
                        onclick="document.getElementById('profileFile').click();"
                        class="btn h-6 w-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-3.5 w-3.5"
                          viewbox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span>User ID </span>
                            <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="User ID"
                                type="text"
                                value="{{ $data->login_id }}"
                                readonly
                            />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                            >
                                <i class="fa-regular fa-user text-base"></i>
                            </span>
                            </span>
                        </label>
                        <label class="block">
                            <span>Full Name </span>
                            <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter full name"
                                type="text"
                                value="{{ $data->name }}"
                                readonly
                            />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                            >
                                <i class="fa-regular fa-user text-base"></i>
                            </span>
                            </span>
                        </label>
                        <label class="block">
                            <span>Email Address </span>
                            <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter email address"
                                type="text"
                                value="{{ $data->email }}"
                                readonly
                            />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                            >
                                <i class="fa-regular fa-envelope text-base"></i>
                            </span>
                            </span>
                        </label>
                        <label class="block">
                            <span>Phone Number</span>
                            <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter phone number"
                                type="text"
                                value="{{ $data->mobile_no }}"
                                readonly
                            />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                            >
                                <i class="fa fa-phone"></i>
                            </span>
                            </span>
                        </label>
                    </div>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="space-y-2">
                        <h2>Country: <span class="text-primary">{{ $data->country }}</span></h2>
                        <h2>Position: <span class="text-primary">{{ $data->position }}</span></h2>
                        <h2>Sponsor ID: <span class="text-primary">{{ $data->sponsor_id }}</span></h2>
                    </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready( function () {
            $("#profileFile").change(function () {
                if ($("#profileFile").val() == "") {
                    return;
                }
                
                document.getElementById('adminSubmitCustomerProfilePhoto').submit();
            });
        } );
    </script>
@endsection