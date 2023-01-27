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

    <title>Customer Login | {{ config('app.name', 'MLM') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('website-assets/images/favicon.png?v=20230127233845') }}" />

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
      class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
    >
      <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
    </div>

    <!-- Page Wrapper -->
    <div
      id="root"
      class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" style="background-image:url({{ asset('website-assets/images/background/bg-3.jpg?v=20230127233845') }});"
      x-cloak
    >
      <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
          <div class="text-center">
            <img
              class="mx-auto h-16"
              src="{{ asset('website-assets/images/logo-white.png?v=20230127233845') }}"
              alt="logo"
            />
            <div class="mt-4">
              <h2
                class="text-2xl font-semibold text-primary"
              >
                Customer Login
              </h2>
              <p class="text-slate-400 dark:text-navy-300">
                Please sign in to continue
              </p>
            </div>
          </div>
          <div class="card mt-5 rounded-lg p-5 lg:p-7">
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <label class="block">
                <span>User ID</span>
                <span class="relative mt-1.5 flex">
                    <input
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter User ID"
                    type="text"
                    name="loginId"
                    id="loginId"
                    />
                    <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                    >
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.7" y="0.7" width="16.6" height="12.6" rx="2.3" stroke="#94A3B8" stroke-width="1.4"/>
                            <line x1="2.5" y1="9.5" x2="15.5" y2="9.5" stroke="#94A3B8" stroke-linecap="round"/>
                            <path d="M3.03033 7.25426V6.89205L4.62834 4.36364H4.89112V4.92472H4.71357L3.50618 6.83523V6.86364H5.65817V7.25426H3.03033ZM4.74198 8V7.14418V6.9755V4.36364H5.16101V8H4.74198ZM8.89459 8.04972C8.65074 8.04972 8.43531 8.00651 8.24828 7.9201C8.06244 7.8325 7.91743 7.71236 7.81327 7.55966C7.7091 7.40578 7.65761 7.23059 7.65879 7.03409C7.65761 6.88021 7.68779 6.73816 7.74935 6.60795C7.8109 6.47656 7.89494 6.36707 8.00148 6.27947C8.10919 6.1907 8.22934 6.13447 8.36192 6.1108V6.08949C8.18791 6.04451 8.04942 5.94685 7.94643 5.79652C7.84345 5.645 7.79255 5.47277 7.79373 5.27983C7.79255 5.09517 7.83931 4.93004 7.934 4.78445C8.0287 4.63885 8.15891 4.52403 8.32463 4.43999C8.49153 4.35594 8.68152 4.31392 8.89459 4.31392C9.10529 4.31392 9.2935 4.35594 9.45922 4.43999C9.62494 4.52403 9.75515 4.63885 9.84984 4.78445C9.94572 4.93004 9.99426 5.09517 9.99544 5.27983C9.99426 5.47277 9.94158 5.645 9.83741 5.79652C9.73443 5.94685 9.59771 6.04451 9.42726 6.08949V6.1108C9.55865 6.13447 9.67702 6.1907 9.78237 6.27947C9.88772 6.36707 9.97176 6.47656 10.0345 6.60795C10.0972 6.73816 10.1292 6.88021 10.1304 7.03409C10.1292 7.23059 10.0759 7.40578 9.97058 7.55966C9.86641 7.71236 9.72141 7.8325 9.53557 7.9201C9.35091 8.00651 9.13725 8.04972 8.89459 8.04972ZM8.89459 7.65909C9.05912 7.65909 9.20117 7.63246 9.32072 7.57919C9.44028 7.52592 9.53261 7.45076 9.59771 7.35369C9.66282 7.25663 9.69596 7.14299 9.69714 7.01278C9.69596 6.87547 9.66045 6.75414 9.59061 6.64879C9.52077 6.54344 9.42548 6.46058 9.30474 6.40021C9.18519 6.33984 9.04847 6.30966 8.89459 6.30966C8.73952 6.30966 8.60103 6.33984 8.4791 6.40021C8.35837 6.46058 8.26308 6.54344 8.19324 6.64879C8.12458 6.75414 8.09085 6.87547 8.09203 7.01278C8.09085 7.14299 8.12221 7.25663 8.18614 7.35369C8.25124 7.45076 8.34416 7.52592 8.4649 7.57919C8.58564 7.63246 8.72887 7.65909 8.89459 7.65909ZM8.89459 5.93324C9.0248 5.93324 9.14021 5.9072 9.24082 5.85511C9.34262 5.80303 9.42252 5.73023 9.48052 5.63672C9.53853 5.54321 9.56812 5.43371 9.5693 5.30824C9.56812 5.18513 9.53912 5.07801 9.4823 4.98686C9.42548 4.89453 9.34676 4.82351 9.24615 4.77379C9.14553 4.72289 9.02835 4.69744 8.89459 4.69744C8.75846 4.69744 8.6395 4.72289 8.5377 4.77379C8.4359 4.82351 8.35718 4.89453 8.30155 4.98686C8.24591 5.07801 8.21869 5.18513 8.21987 5.30824C8.21869 5.43371 8.2465 5.54321 8.30332 5.63672C8.36132 5.73023 8.44123 5.80303 8.54302 5.85511C8.64482 5.9072 8.76201 5.93324 8.89459 5.93324ZM13.3748 4.31392C13.5239 4.3151 13.6731 4.34351 13.8222 4.39915C13.9714 4.45478 14.1075 4.54711 14.2306 4.67614C14.3537 4.80398 14.4526 4.97857 14.5271 5.19993C14.6017 5.42128 14.639 5.69886 14.639 6.03267C14.639 6.35582 14.6082 6.64287 14.5467 6.89382C14.4863 7.14358 14.3987 7.35429 14.2839 7.52592C14.1702 7.69756 14.0317 7.82777 13.8684 7.91655C13.7062 8.00533 13.5228 8.04972 13.318 8.04972C13.1144 8.04972 12.9327 8.00947 12.7729 7.92898C12.6143 7.8473 12.484 7.73426 12.3822 7.58984C12.2816 7.44425 12.2171 7.27557 12.1887 7.08381H12.6219C12.661 7.25071 12.7385 7.38861 12.8545 7.49751C12.9717 7.60523 13.1262 7.65909 13.318 7.65909C13.5985 7.65909 13.8199 7.53658 13.982 7.29155C14.1454 7.04652 14.2271 6.70028 14.2271 6.25284H14.1987C14.1324 6.35227 14.0536 6.43809 13.9625 6.5103C13.8714 6.5825 13.7701 6.63814 13.6589 6.6772C13.5476 6.71626 13.4292 6.7358 13.3038 6.7358C13.0954 6.7358 12.9043 6.6843 12.7303 6.58132C12.5574 6.47715 12.4189 6.33452 12.3148 6.15341C12.2118 5.97112 12.1603 5.76278 12.1603 5.52841C12.1603 5.30587 12.21 5.10227 12.3094 4.91761C12.4101 4.73177 12.5509 4.58381 12.732 4.47372C12.9143 4.36364 13.1286 4.31037 13.3748 4.31392ZM13.3748 4.70455C13.2256 4.70455 13.0913 4.74183 12.9717 4.81641C12.8534 4.8898 12.7593 4.98923 12.6894 5.1147C12.6208 5.23899 12.5864 5.37689 12.5864 5.52841C12.5864 5.67992 12.6196 5.81783 12.6859 5.94212C12.7533 6.06522 12.8451 6.16347 12.9611 6.23686C13.0783 6.30907 13.2114 6.34517 13.3606 6.34517C13.473 6.34517 13.5778 6.32327 13.6749 6.27947C13.7719 6.23449 13.8566 6.17353 13.9288 6.09659C14.0022 6.01847 14.0596 5.93028 14.101 5.83203C14.1424 5.7326 14.1631 5.62902 14.1631 5.52131C14.1631 5.37926 14.1288 5.24609 14.0602 5.1218C13.9927 4.99751 13.8992 4.8969 13.7796 4.81996C13.6612 4.74302 13.5263 4.70455 13.3748 4.70455Z" fill="#94A3B8"/>
                        </svg>
                    </span>
                </span>
                </label>
                <label class="mt-4 block">
                <span>Password</span>
                <span class="relative mt-1.5 flex">
                    <input
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter Password"
                    type="password"
                    name="password"
                    id="password"
                    />
                    <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                    >
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 13V15M3 19H15C15.5304 19 16.0391 18.7893 16.4142 18.4142C16.7893 18.0391 17 17.5304 17 17V11C17 10.4696 16.7893 9.96086 16.4142 9.58579C16.0391 9.21071 15.5304 9 15 9H3C2.46957 9 1.96086 9.21071 1.58579 9.58579C1.21071 9.96086 1 10.4696 1 11V17C1 17.5304 1.21071 18.0391 1.58579 18.4142C1.96086 18.7893 2.46957 19 3 19ZM13 9V5C13 3.93913 12.5786 2.92172 11.8284 2.17157C11.0783 1.42143 10.0609 1 9 1C7.93913 1 6.92172 1.42143 6.17157 2.17157C5.42143 2.92172 5 3.93913 5 5V9H13Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </span>
                </label>
                <div class="mt-4 flex items-center justify-end space-x-2">
                <a
                    href="{{ route('password.request') }}"
                    class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100"
                    >Forgot your password?</a
                >
                </div>
                <button
                class="btn mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                >
                Sign In
                </button>
                <div class="mt-4 text-center text-xs+">
                <p class="line-clamp-1">
                    <span>Dont have Account?</span>

                    <a
                    class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                    href="{{ route('register') }}"
                    >Create account</a
                    >
                </p>
                </div>
                <div class="my-7 flex items-center space-x-3">
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                <p>OR</p>
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                </div>
                <div class="flex space-x-4 justify-center">
                <p>Visit <a href="{{ url('/') }}" class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">Website</a>
                </div>
            </form>
          </div>
          <div
            class="mt-8 flex justify-center text-xs text-slate-400 dark:text-navy-300"
          >
            <a href="#">Privacy Notice</a>
            <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
            <a href="#">Term of service</a>
          </div>
        </div>
      </main>
    </div>
    <script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
  </body>
</html>
