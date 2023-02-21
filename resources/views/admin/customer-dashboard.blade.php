@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12">
            <div :class="$store.breakpoints.smAndUp &amp;&amp; 'via-purple-300'" class="card mt-12 bg-gradient-to-l from-pink-300 to-indigo-400 p-5 sm:mt-0 sm:flex-row via-purple-300">
              <div class="flex justify-center sm:order-last">
                <img class="-mt-16 h-40 sm:mt-0" src="{{ asset('dashboard-assets/images/illustrations/rocket.svg?v=20230211005214') }}" alt="">
              </div>
              <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
                <h3 class="text-xl">
                  Welcome Back, <span class="font-semibold">{{ $name }}</span>
                </h3>
                <p class="mt-2 leading-relaxed">
                  Your User Id is:
                  <span class="font-semibold text-navy-700">{{ $login_id }}</span>
                </p>
                <p class="mt-2 leading-relaxed">
                  IP Address: 
                  <span class="font-semibold text-navy-700">{{ $login_ip_address }}</span>
                </p>
                <p class="mt-2 leading-relaxed">
                  Last Login On: 
                  <span class="font-semibold text-navy-700">{{ date('d M Y h:m:s', strtotime($last_login_datetime)) }}</span>
                </p>
              </div>
            </div>
            <div class="flex justify-center mt-3">
                <a href="javascript:void(0);" onclick="window.history.go(-1); return false;" class="btn bg-info text-xs font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">Go Back</a>
            </div>
        </div>
        <div class="col-span-12 space-y-4 sm:space-y-5 lg:space-y-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
                <div class="card bg-gradient-to-r from-blue-500 to-indigo-600 px-5 pb-5">
                    <div>
                        <div class="ax-transparent-gridline mt-5 w-1/2">
                        {{-- <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.earningWhite); $el._x_chart.render() });"></div> --}}
                        </div>
                        <p class="mt-3 text-base font-medium tracking-wide text-indigo-100">
                        Account Wallet
                        </p>
                        <p class="mt-4 font-inter text-2xl font-semibold">
                        <span class="text-white">${{ $fund_wallet_amount }}</span>
                        </p>
                    </div>
                    <div class="absolute bottom-0 right-0 overflow-hidden rounded-lg">
                        <img
                        class="w-24 translate-x-1/4 translate-y-1/4 opacity-50"
                        src="{{ asset('dashboard-assets/images/illustrations/the-dollar.svg') }}"
                        alt="image"
                        />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:col-span-2 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                    <div class="relative flex flex-col overflow-hidden rounded-lg bg-gradient-to-br from-pink-500 to-rose-500 p-3.5">
                        <p class="text-xs uppercase text-pink-100">ROI Wallet</p>
                        <div class="flex items-end justify-between space-x-2">
                        <p class="mt-4 text-2xl font-medium text-white">${{ $roi_wallet_amount }}</p>
                        {{-- <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs font-medium text-pink-100 outline-none transition-colors duration-300 line-clamp-1 hover:text-white focus:text-white">Get Report
                        </a> --}}
                        </div>
                        <div class="mask is-hexagon-2 absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
                    </div>

                    <div class="relative flex flex-col overflow-hidden rounded-lg bg-gradient-to-br from-amber-400 to-orange-600 p-3.5">
                        <p class="text-xs uppercase text-amber-50">Working Wallet</p>
                        <div class="flex items-end justify-between space-x-2">
                        <p class="mt-4 text-2xl font-medium text-white">${{ $working_wallet_amount }}</p>
                        {{-- <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs font-medium text-amber-50 outline-none transition-colors duration-300 line-clamp-1 hover:text-white focus:text-white">Get Report
                        </a> --}}
                        </div>
                        <div class="mask is-diamond absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
                    </div>
                    
                    <div class="card bg-warning/15 p-4 dark:bg-transparent justify-center p-4.5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                class="text-base font-semibold text-slate-700 dark:text-navy-100"
                                >
                                ${{ $totalLeftBusiness }}
                                </p>
                                <p class="text-xs+ line-clamp-1">Total Left Business</p>
                            </div>
                            <div class="mask is-star flex h-10 w-10 shrink-0 items-center justify-center bg-secondary">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.1771 11.4019H10.8229C10.4627 11.4019 10.1699 11.1088 10.1699 10.7488V8.9224C10.1699 8.5624 10.4629 8.26934 10.8229 8.26934H13.1771C13.5371 8.26934 13.8299 8.5624 13.8299 8.9224C13.8299 9.2168 14.0688 9.45574 14.3632 9.45574C14.6576 9.45574 14.8965 9.2168 14.8965 8.9224C14.8965 7.97414 14.1251 7.20267 13.1771 7.20267H12.5333V6.26667C12.5333 5.97227 12.2944 5.73334 12 5.73334C11.7056 5.73334 11.4667 5.97227 11.4667 6.26667V7.20294H10.8229C9.87466 7.20294 9.1032 7.9744 9.1032 8.92267V10.7491C9.1032 11.6973 9.87466 12.4691 10.8229 12.4691H13.1771C13.1776 12.4691 13.1779 12.4691 13.1784 12.4691C13.5376 12.4699 13.8299 12.7624 13.8299 13.1221V14.9485C13.8299 15.3088 13.5368 15.6016 13.1771 15.6016H10.8229C10.4627 15.6016 10.1699 15.3085 10.1699 14.9485C10.1699 14.6541 9.93093 14.4152 9.63653 14.4152C9.34213 14.4152 9.1032 14.6541 9.1032 14.9485C9.1032 15.8968 9.87466 16.6683 10.8229 16.6683H11.4667V17.7333C11.4667 18.0277 11.7056 18.2667 12 18.2667C12.2944 18.2667 12.5333 18.0277 12.5333 17.7333V16.6677H13.1771C14.1253 16.6677 14.8965 15.896 14.8965 14.948V13.1216C14.8965 12.1733 14.1253 11.4019 13.1771 11.4019Z" fill="white"/>
                                <path d="M4.01333 9.4048C3.94853 9.4048 3.8824 9.39307 3.81866 9.36773C3.54453 9.26 3.4096 8.9504 3.51706 8.67627C4.50986 6.14853 6.55573 4.2072 9.13013 3.34987C9.40906 3.25627 9.71146 3.408 9.80453 3.68747C9.8976 3.96693 9.7464 4.26907 9.46693 4.36187C7.19333 5.11893 5.3864 6.8336 4.50986 9.06613C4.42746 9.27627 4.2264 9.4048 4.01333 9.4048Z" fill="white"/>
                                <path d="M12.0157 21.1392C11.7213 21.1392 11.4824 20.9003 11.4824 20.6059C11.4824 20.3115 11.7213 20.0726 12.0157 20.0726C16.4603 20.0726 20.0765 16.4563 20.0765 12.0115C20.0765 11.7171 20.3155 11.4781 20.6099 11.4781C20.9043 11.4781 21.1432 11.7171 21.1432 12.0115C21.1432 17.0448 17.0488 21.1392 12.0157 21.1392Z" fill="white"/>
                                <path d="M12 24C5.3832 24 0 18.6168 0 12C0 5.3832 5.3832 0 12 0C13.8624 0 15.6483 0.4152 17.3067 1.23413C17.5707 1.36453 17.6789 1.68427 17.5485 1.94853C17.4184 2.21253 17.0987 2.32107 16.8341 2.19067C15.324 1.4448 13.6973 1.06667 12 1.06667C5.97147 1.06667 1.06667 5.97147 1.06667 12C1.06667 18.0285 5.97147 22.9333 12 22.9333C18.0285 22.9333 22.9333 18.0285 22.9333 12C22.9333 9.89333 22.3331 7.84827 21.1976 6.08613C21.0379 5.8384 21.1093 5.50827 21.3571 5.3488C21.6048 5.1896 21.9347 5.26053 22.0944 5.50827C23.3408 7.4432 24 9.688 24 12C24 18.6168 18.6168 24 12 24Z" fill="white"/>
                                <path d="M19.7808 5.308C19.4864 5.308 19.2475 5.06907 19.2475 4.77467V2.1424C19.2475 1.848 19.4864 1.60907 19.7808 1.60907C20.0752 1.60907 20.3141 1.848 20.3141 2.1424V4.77467C20.3141 5.06934 20.0752 5.308 19.7808 5.308Z" fill="white"/>
                                <path d="M21.0968 3.99199H18.4645C18.1701 3.99199 17.9312 3.75306 17.9312 3.45866C17.9312 3.16426 18.1701 2.92532 18.4645 2.92532H21.0968C21.3912 2.92532 21.6301 3.16426 21.6301 3.45866C21.6301 3.75306 21.3915 3.99199 21.0968 3.99199Z" fill="white"/>
                            </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-primary/15 p-4 dark:bg-transparent justify-center p-4.5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                class="text-base font-semibold text-slate-700 dark:text-navy-100"
                                >
                                ${{ $totalRightBusiness }}
                                </p>
                                <p class="text-xs+ line-clamp-1">Total Right Business</p>
                            </div>
                            <div class="mask is-star flex h-10 w-10 shrink-0 items-center justify-center bg-warning">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.1771 11.4019H10.8229C10.4627 11.4019 10.1699 11.1088 10.1699 10.7488V8.9224C10.1699 8.5624 10.4629 8.26934 10.8229 8.26934H13.1771C13.5371 8.26934 13.8299 8.5624 13.8299 8.9224C13.8299 9.2168 14.0688 9.45574 14.3632 9.45574C14.6576 9.45574 14.8965 9.2168 14.8965 8.9224C14.8965 7.97414 14.1251 7.20267 13.1771 7.20267H12.5333V6.26667C12.5333 5.97227 12.2944 5.73334 12 5.73334C11.7056 5.73334 11.4667 5.97227 11.4667 6.26667V7.20294H10.8229C9.87466 7.20294 9.1032 7.9744 9.1032 8.92267V10.7491C9.1032 11.6973 9.87466 12.4691 10.8229 12.4691H13.1771C13.1776 12.4691 13.1779 12.4691 13.1784 12.4691C13.5376 12.4699 13.8299 12.7624 13.8299 13.1221V14.9485C13.8299 15.3088 13.5368 15.6016 13.1771 15.6016H10.8229C10.4627 15.6016 10.1699 15.3085 10.1699 14.9485C10.1699 14.6541 9.93093 14.4152 9.63653 14.4152C9.34213 14.4152 9.1032 14.6541 9.1032 14.9485C9.1032 15.8968 9.87466 16.6683 10.8229 16.6683H11.4667V17.7333C11.4667 18.0277 11.7056 18.2667 12 18.2667C12.2944 18.2667 12.5333 18.0277 12.5333 17.7333V16.6677H13.1771C14.1253 16.6677 14.8965 15.896 14.8965 14.948V13.1216C14.8965 12.1733 14.1253 11.4019 13.1771 11.4019Z" fill="white"/>
                                <path d="M4.01333 9.4048C3.94853 9.4048 3.8824 9.39307 3.81866 9.36773C3.54453 9.26 3.4096 8.9504 3.51706 8.67627C4.50986 6.14853 6.55573 4.2072 9.13013 3.34987C9.40906 3.25627 9.71146 3.408 9.80453 3.68747C9.8976 3.96693 9.7464 4.26907 9.46693 4.36187C7.19333 5.11893 5.3864 6.8336 4.50986 9.06613C4.42746 9.27627 4.2264 9.4048 4.01333 9.4048Z" fill="white"/>
                                <path d="M12.0157 21.1392C11.7213 21.1392 11.4824 20.9003 11.4824 20.6059C11.4824 20.3115 11.7213 20.0726 12.0157 20.0726C16.4603 20.0726 20.0765 16.4563 20.0765 12.0115C20.0765 11.7171 20.3155 11.4781 20.6099 11.4781C20.9043 11.4781 21.1432 11.7171 21.1432 12.0115C21.1432 17.0448 17.0488 21.1392 12.0157 21.1392Z" fill="white"/>
                                <path d="M12 24C5.3832 24 0 18.6168 0 12C0 5.3832 5.3832 0 12 0C13.8624 0 15.6483 0.4152 17.3067 1.23413C17.5707 1.36453 17.6789 1.68427 17.5485 1.94853C17.4184 2.21253 17.0987 2.32107 16.8341 2.19067C15.324 1.4448 13.6973 1.06667 12 1.06667C5.97147 1.06667 1.06667 5.97147 1.06667 12C1.06667 18.0285 5.97147 22.9333 12 22.9333C18.0285 22.9333 22.9333 18.0285 22.9333 12C22.9333 9.89333 22.3331 7.84827 21.1976 6.08613C21.0379 5.8384 21.1093 5.50827 21.3571 5.3488C21.6048 5.1896 21.9347 5.26053 22.0944 5.50827C23.3408 7.4432 24 9.688 24 12C24 18.6168 18.6168 24 12 24Z" fill="white"/>
                                <path d="M19.7808 5.308C19.4864 5.308 19.2475 5.06907 19.2475 4.77467V2.1424C19.2475 1.848 19.4864 1.60907 19.7808 1.60907C20.0752 1.60907 20.3141 1.848 20.3141 2.1424V4.77467C20.3141 5.06934 20.0752 5.308 19.7808 5.308Z" fill="white"/>
                                <path d="M21.0968 3.99199H18.4645C18.1701 3.99199 17.9312 3.75306 17.9312 3.45866C17.9312 3.16426 18.1701 2.92532 18.4645 2.92532H21.0968C21.3912 2.92532 21.6301 3.16426 21.6301 3.45866C21.6301 3.75306 21.3915 3.99199 21.0968 3.99199Z" fill="white"/>
                            </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12">
            <div class="grid grid-cols-1 gap-4">
                <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,3408,52,4687,2010,74,1958,5426,3890,6636,5994,2,4943" currency="USD" theme="light" transparent="false" show-symbol-logo="true"></div>
            </div>
        </div>

        <div class="col-span-12 space-y-4 sm:space-y-5 lg:space-y-6">
            <div class="grid grid-cols-1 gap-4 sm:col-span-2 sm:grid-cols-4 sm:gap-5 lg:gap-6">
                <div class="card justify-center p-4.5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                            class="text-base font-semibold text-slate-700 dark:text-navy-100"
                            >
                            ${{ $totalInvestment }}
                            </p>
                            <p class="text-xs+ line-clamp-1">Total Investment</p>
                        </div>
                        <div class="mask is-star flex h-10 w-10 shrink-0 items-center justify-center bg-info">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.1771 11.4019H10.8229C10.4627 11.4019 10.1699 11.1088 10.1699 10.7488V8.9224C10.1699 8.5624 10.4629 8.26934 10.8229 8.26934H13.1771C13.5371 8.26934 13.8299 8.5624 13.8299 8.9224C13.8299 9.2168 14.0688 9.45574 14.3632 9.45574C14.6576 9.45574 14.8965 9.2168 14.8965 8.9224C14.8965 7.97414 14.1251 7.20267 13.1771 7.20267H12.5333V6.26667C12.5333 5.97227 12.2944 5.73334 12 5.73334C11.7056 5.73334 11.4667 5.97227 11.4667 6.26667V7.20294H10.8229C9.87466 7.20294 9.1032 7.9744 9.1032 8.92267V10.7491C9.1032 11.6973 9.87466 12.4691 10.8229 12.4691H13.1771C13.1776 12.4691 13.1779 12.4691 13.1784 12.4691C13.5376 12.4699 13.8299 12.7624 13.8299 13.1221V14.9485C13.8299 15.3088 13.5368 15.6016 13.1771 15.6016H10.8229C10.4627 15.6016 10.1699 15.3085 10.1699 14.9485C10.1699 14.6541 9.93093 14.4152 9.63653 14.4152C9.34213 14.4152 9.1032 14.6541 9.1032 14.9485C9.1032 15.8968 9.87466 16.6683 10.8229 16.6683H11.4667V17.7333C11.4667 18.0277 11.7056 18.2667 12 18.2667C12.2944 18.2667 12.5333 18.0277 12.5333 17.7333V16.6677H13.1771C14.1253 16.6677 14.8965 15.896 14.8965 14.948V13.1216C14.8965 12.1733 14.1253 11.4019 13.1771 11.4019Z" fill="white"/>
                                <path d="M4.01333 9.4048C3.94853 9.4048 3.8824 9.39307 3.81866 9.36773C3.54453 9.26 3.4096 8.9504 3.51706 8.67627C4.50986 6.14853 6.55573 4.2072 9.13013 3.34987C9.40906 3.25627 9.71146 3.408 9.80453 3.68747C9.8976 3.96693 9.7464 4.26907 9.46693 4.36187C7.19333 5.11893 5.3864 6.8336 4.50986 9.06613C4.42746 9.27627 4.2264 9.4048 4.01333 9.4048Z" fill="white"/>
                                <path d="M12.0157 21.1392C11.7213 21.1392 11.4824 20.9003 11.4824 20.6059C11.4824 20.3115 11.7213 20.0726 12.0157 20.0726C16.4603 20.0726 20.0765 16.4563 20.0765 12.0115C20.0765 11.7171 20.3155 11.4781 20.6099 11.4781C20.9043 11.4781 21.1432 11.7171 21.1432 12.0115C21.1432 17.0448 17.0488 21.1392 12.0157 21.1392Z" fill="white"/>
                                <path d="M12 24C5.3832 24 0 18.6168 0 12C0 5.3832 5.3832 0 12 0C13.8624 0 15.6483 0.4152 17.3067 1.23413C17.5707 1.36453 17.6789 1.68427 17.5485 1.94853C17.4184 2.21253 17.0987 2.32107 16.8341 2.19067C15.324 1.4448 13.6973 1.06667 12 1.06667C5.97147 1.06667 1.06667 5.97147 1.06667 12C1.06667 18.0285 5.97147 22.9333 12 22.9333C18.0285 22.9333 22.9333 18.0285 22.9333 12C22.9333 9.89333 22.3331 7.84827 21.1976 6.08613C21.0379 5.8384 21.1093 5.50827 21.3571 5.3488C21.6048 5.1896 21.9347 5.26053 22.0944 5.50827C23.3408 7.4432 24 9.688 24 12C24 18.6168 18.6168 24 12 24Z" fill="white"/>
                                <path d="M19.7808 5.308C19.4864 5.308 19.2475 5.06907 19.2475 4.77467V2.1424C19.2475 1.848 19.4864 1.60907 19.7808 1.60907C20.0752 1.60907 20.3141 1.848 20.3141 2.1424V4.77467C20.3141 5.06934 20.0752 5.308 19.7808 5.308Z" fill="white"/>
                                <path d="M21.0968 3.99199H18.4645C18.1701 3.99199 17.9312 3.75306 17.9312 3.45866C17.9312 3.16426 18.1701 2.92532 18.4645 2.92532H21.0968C21.3912 2.92532 21.6301 3.16426 21.6301 3.45866C21.6301 3.75306 21.3915 3.99199 21.0968 3.99199Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card justify-center p-4.5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                            class="text-base font-semibold text-slate-700 dark:text-navy-100"
                            >
                            {{ $totalLeftUserCount }}
                            </p>
                            <p class="text-xs+ line-clamp-1">Total Left Users</p>
                        </div>
                        <div class="mask is-star flex h-10 w-10 shrink-0 items-center justify-center bg-info">
                            <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 1C5.89666 1 6.62632 1.72933 6.62632 2.626V3.56767C6.62632 4.46433 5.89699 5.19367 4.99999 5.19367C4.10332 5.19367 3.37366 4.46433 3.37366 3.56767V2.62633C3.37366 1.72933 4.10332 1 4.99999 1ZM4.99999 0C3.55566 0 2.37366 1.18167 2.37366 2.626V3.56767C2.37366 5.012 3.55532 6.19367 4.99999 6.19367C6.44432 6.19367 7.62632 5.012 7.62632 3.56767V2.62633C7.62632 1.18167 6.44432 0 4.99999 0Z" fill="white"/>
                                <path d="M6.605 7.59766C7.98833 7.93399 9 9.19533 9 10.639V12.8077H1V10.639C1 9.19533 2.01167 7.93433 3.395 7.59766C3.90467 7.80766 4.45267 7.91733 5 7.91733C5.54733 7.91733 6.09533 7.80766 6.605 7.59766ZM6.47867 6.55499C6.03433 6.78499 5.53233 6.91733 5 6.91733C4.46767 6.91733 3.96567 6.78499 3.52133 6.55499C1.53567 6.85133 0 8.57433 0 10.639V13.3557C0 13.6043 0.203333 13.8077 0.452 13.8077H9.548C9.79667 13.8077 10 13.6043 10 13.3557V10.639C10 8.57433 8.46433 6.85133 6.47867 6.55499Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card justify-center p-4.5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                            class="text-base font-semibold text-slate-700 dark:text-navy-100"
                            >
                            {{ $totalRightUserCount }}
                            </p>
                            <p class="text-xs+ line-clamp-1">Total Right User</p>
                        </div>
                        <div class="mask is-star flex h-10 w-10 shrink-0 items-center justify-center bg-success">
                            <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 1C5.89666 1 6.62632 1.72933 6.62632 2.626V3.56767C6.62632 4.46433 5.89699 5.19367 4.99999 5.19367C4.10332 5.19367 3.37366 4.46433 3.37366 3.56767V2.62633C3.37366 1.72933 4.10332 1 4.99999 1ZM4.99999 0C3.55566 0 2.37366 1.18167 2.37366 2.626V3.56767C2.37366 5.012 3.55532 6.19367 4.99999 6.19367C6.44432 6.19367 7.62632 5.012 7.62632 3.56767V2.62633C7.62632 1.18167 6.44432 0 4.99999 0Z" fill="white"/>
                                <path d="M6.605 7.59766C7.98833 7.93399 9 9.19533 9 10.639V12.8077H1V10.639C1 9.19533 2.01167 7.93433 3.395 7.59766C3.90467 7.80766 4.45267 7.91733 5 7.91733C5.54733 7.91733 6.09533 7.80766 6.605 7.59766ZM6.47867 6.55499C6.03433 6.78499 5.53233 6.91733 5 6.91733C4.46767 6.91733 3.96567 6.78499 3.52133 6.55499C1.53567 6.85133 0 8.57433 0 10.639V13.3557C0 13.6043 0.203333 13.8077 0.452 13.8077H9.548C9.79667 13.8077 10 13.6043 10 13.3557V10.639C10 8.57433 8.46433 6.85133 6.47867 6.55499Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card justify-center p-4.5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                            class="text-base font-semibold text-slate-700 dark:text-navy-100"
                            >
                            {{ $activeLeftUserCount }}
                            </p>
                            <p class="text-xs+ line-clamp-1">Active Left Users</p>
                        </div>
                        <div class="mask is-star flex h-10 w-10 shrink-0 items-center justify-center bg-primary">
                            <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 1C5.89666 1 6.62632 1.72933 6.62632 2.626V3.56767C6.62632 4.46433 5.89699 5.19367 4.99999 5.19367C4.10332 5.19367 3.37366 4.46433 3.37366 3.56767V2.62633C3.37366 1.72933 4.10332 1 4.99999 1ZM4.99999 0C3.55566 0 2.37366 1.18167 2.37366 2.626V3.56767C2.37366 5.012 3.55532 6.19367 4.99999 6.19367C6.44432 6.19367 7.62632 5.012 7.62632 3.56767V2.62633C7.62632 1.18167 6.44432 0 4.99999 0Z" fill="white"/>
                                <path d="M6.605 7.59766C7.98833 7.93399 9 9.19533 9 10.639V12.8077H1V10.639C1 9.19533 2.01167 7.93433 3.395 7.59766C3.90467 7.80766 4.45267 7.91733 5 7.91733C5.54733 7.91733 6.09533 7.80766 6.605 7.59766ZM6.47867 6.55499C6.03433 6.78499 5.53233 6.91733 5 6.91733C4.46767 6.91733 3.96567 6.78499 3.52133 6.55499C1.53567 6.85133 0 8.57433 0 10.639V13.3557C0 13.6043 0.203333 13.8077 0.452 13.8077H9.548C9.79667 13.8077 10 13.6043 10 13.3557V10.639C10 8.57433 8.46433 6.85133 6.47867 6.55499Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card justify-center p-4.5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                            class="text-base font-semibold text-slate-700 dark:text-navy-100"
                            >
                            {{ $activeRightUserCount }}
                            </p>
                            <p class="text-xs+ line-clamp-1">Active Right Users</p>
                        </div>
                        <div class="mask is-star flex h-10 w-10 shrink-0 items-center justify-center bg-warning">
                            <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 1C5.89666 1 6.62632 1.72933 6.62632 2.626V3.56767C6.62632 4.46433 5.89699 5.19367 4.99999 5.19367C4.10332 5.19367 3.37366 4.46433 3.37366 3.56767V2.62633C3.37366 1.72933 4.10332 1 4.99999 1ZM4.99999 0C3.55566 0 2.37366 1.18167 2.37366 2.626V3.56767C2.37366 5.012 3.55532 6.19367 4.99999 6.19367C6.44432 6.19367 7.62632 5.012 7.62632 3.56767V2.62633C7.62632 1.18167 6.44432 0 4.99999 0Z" fill="white"/>
                                <path d="M6.605 7.59766C7.98833 7.93399 9 9.19533 9 10.639V12.8077H1V10.639C1 9.19533 2.01167 7.93433 3.395 7.59766C3.90467 7.80766 4.45267 7.91733 5 7.91733C5.54733 7.91733 6.09533 7.80766 6.605 7.59766ZM6.47867 6.55499C6.03433 6.78499 5.53233 6.91733 5 6.91733C4.46767 6.91733 3.96567 6.78499 3.52133 6.55499C1.53567 6.85133 0 8.57433 0 10.639V13.3557C0 13.6043 0.203333 13.8077 0.452 13.8077H9.548C9.79667 13.8077 10 13.6043 10 13.3557V10.639C10 8.57433 8.46433 6.85133 6.47867 6.55499Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
                <div class="card px-4 py-4 sm:px-5">
                    <div class="pb-3 flex h-8 items-center justify-between">
                        <h2
                        class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
                        >
                        Your Incomes
                        </h2>
                    </div>
                    <div class="space-y-6">
                        <div class="flex cursor-pointer items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            ROI Income
                                        </p>
                                    </div>
                                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Your total ROI income.
                                    </p>
                                </div>
                            </div>
                            <h3>{{ $totalRoiIncome }}</h3>
                        </div>
                        <div class="flex cursor-pointer items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            Binary Income
                                        </p>
                                    </div>
                                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Your total binary income.
                                    </p>
                                </div>
                            </div>
                            <h3>${{ $totalBinaryIncome }}</h3>
                        </div>
                        <div class="flex cursor-pointer items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            Direct Income
                                        </p>
                                    </div>
                                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Your total direct income.
                                    </p>
                                </div>
                            </div>
                            <h3>{{ $totalDirectIncome }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-8">
            <div class="card">
                <div class="mt-3 flex h-8 items-center justify-between px-4 sm:px-5">
                    <h2
                    class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
                    >
                    Share your direct referral link
                    </h2>
                </div>
                <div class="ax-transparent-gridline px-4 sm:px-5 pb-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <h3 class="font-bold text-black">Left Link</h3>
                            <div class="flex items-center space-x-2 pb-2">
                                <input type="text" class="text-info w-full" name="copyLinkLeft" id="copyLinkLeft" value="{{ config('app.url')."/customer/direct/register?userID=".$login_id."&position=Left" }}" />
                            </div>
                            <button type="button" class="btn bg-primary px-3 py-1 text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90" onclick="functionToCopyLink('copyLinkLeft')">Copy Link</button>
                            {{-- <a target="_blank" class="btn bg-success px-3 py-1 text-xs font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90" href="https://api.whatsapp.com/send?phone&text=Use my referral link to join {{ config('app.name') }} Platform. {{ config('app.url') }}/customer/direct/register?userID={{ $login_id }}&position=Left"><p>WhatsApp Share</p></a> --}}
                        </div>
                        <div>
                            <h3 class="font-bold text-black">Right Link</h3>
                            <div class="flex items-center space-x-2 pb-2">
                                <input type="text" class="text-info w-full" name="copyLinkRight" id="copyLinkRight" value="{{ config('app.url')."/customer/direct/register?userID=".$login_id."&position=Right" }}" />
                            </div>
                            <button type="button" class="btn bg-primary px-3 py-1 text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90" onclick="functionToCopyLink('copyLinkRight')">Copy Link</button>
                            {{-- <a target="_blank" class="btn bg-success px-3 py-1 text-xs font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90" href="https://api.whatsapp.com/send?phone&text=Use my referral link to join {{ config('app.name') }} Platform. {{ config('app.url') }}/customer/direct/register?userID={{ $login_id }}&position=Right"><p>WhatsApp Share</p></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function functionToCopyLink(textID) {
            /* Get the text field */
            var copyText = document.getElementById(textID);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
        }
    </script>
@endsection