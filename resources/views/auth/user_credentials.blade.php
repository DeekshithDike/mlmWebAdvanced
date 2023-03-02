<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login | {{ config('app.name', 'MLM') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('website-assets/images/favicon.png?v=20230303001525') }}" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/app.css') }}" />

    <!-- Javascript Assets -->
    <script src="{{ asset('dashboard-assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet"
    />
  </head>
  <body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div
      class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-darkblue dark:bg-navy-900"
    >
      <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
    </div>

    <!-- Page Wrapper -->
    <div
      id="root"
      class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" style="background-image:url({{ asset('website-assets/images/background/bg-3.jpg?v=20230303001525') }});"
      x-cloak
    >
      <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
          <div class="text-center">
            <img
              class="mx-auto h-16 w-16"
              src="{{ asset('website-assets/images/favicon.png?v=20230303001525') }}"
              alt="logo"
            />
            <div class="mt-4">
              <h2
                class="text-2xl font-semibold text-white"
              >
                Registration Successful
              </h2>
            </div>
          </div>
          <div class="card mt-5 rounded-lg p-5 lg:p-7 text-center">
            <p class="pb-4">Thank you for registering with Krypto Musk, Below is your login details.</p>
            <h4 class="text-success">User ID: {{ $userId }}</h4>
            <h4 class="text-success">Password: {{ $password }}</h4>

            <a href="{{ route('login') }}"
            class="btn mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
            >
            Sign In Now
            </a>
          </div>
        </div>
      </main>
    </div>
    <script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
  </body>
</html>
