<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta tags  -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MLM') }} | @yield('title')</title>
            
        <link rel="icon" type="image/png" href="{{ asset('website-assets/images/favicon.png?v=20230127224926') }}" />

        <!-- CSS Assets -->
        <link rel="stylesheet" href="{{ asset('dashboard-assets/css/app.css?v=20230127224926') }}" />

        <!-- Javascript Assets -->
        <script src="{{ asset('dashboard-assets/js/app.js?v=20230127224926') }}" defer></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />

        @yield('styles')
    </head>
    <body x-data class="is-header-blur is-sidebar-open" x-bind="$store.global.documentBody">
        <!-- App preloader-->
        <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
            <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
        </div>

        <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
            <!-- Sidebar -->
            @if (Auth::user()->user_role == "ADMIN")
                @include('layouts.admin-navigation')
            @else
                @include('layouts.customer-navigation')
            @endif
            
            <!-- App Header Wrapper-->
            @include('layouts.header')

            <!-- Main Content Wrapper -->
            <main class="main-content w-full px-[var(--margin-x)] pb-8">
                @yield('content')
            </main>
        </div>
        
        <script>
            window.addEventListener("DOMContentLoaded", () => Alpine.start());
        </script>
        @yield('scripts')
    </body>
</html>
