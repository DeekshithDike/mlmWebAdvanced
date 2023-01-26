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

    <title>Create Account | {{ config('app.name', 'MLM') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('website-assets/images/favicon.png?v=20200126120555') }}" />

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
      class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
      x-cloak
    >
      <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
          <div class="text-center">
            <img
              class="mx-auto h-16 w-16"
              src="{{ asset('website-assets/images/favicon.png?v=20200126120555') }}"
              alt="logo"
            />
            <div class="mt-4">
              <h2
                class="text-2xl font-semibold text-slate-600 dark:text-navy-100"
              >
                Welcome To {{ config('app.name', 'MLM') }}
              </h2>
              <p class="text-slate-400 dark:text-navy-300">
                Please sign up to continue
              </p>
            </div>
          </div>
          <div class="card mt-5 rounded-lg p-5 lg:p-7">

            @php
                $countries = ['Abkhazia','Afghanistan','Albania','Algeria','American Samoa','Andorra','Angola','Anguilla','Antigua and Barbuda','Argentina','Armenia','Aruba','Ascension','Australia','Australian External Territories','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Barbuda','Belarus','Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia','Bosnia and Herzegovina','Botswana','Brazil','British Indian Ocean Territory','British Virgin Islands','Brunei','Bulgaria','Burkina Faso','Burundi','Canada','Cambodia','Cameroon','Cape Verde','Cayman Islands','Central African Republic','Chad','Chile','China','Christmas Island','Cocos-Keeling Islands','Colombia','Comoros','Congo','Congo, Dem. Rep. of (Zaire)','Cook Islands','Costa Rica','Croatia','Cuba','Curacao','Cyprus','Czech Republic','Denmark','Diego Garcia','Djibouti','Dominica','Dominican Republic','East Timor','Easter Island','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Falkland Islands','Faroe Islands','Fiji','Finland','France','French Antilles','French Guiana','French Polynesia','Gabon','Gambia','Georgia','Germany','Ghana','Gibraltar','Greece','Greenland','Grenada','Guadeloupe','Guam','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Honduras','Hong Kong SAR China','Hungary','Iceland','India','Indonesia','Iran','Iraq','Ireland','Israel','Italy','Ivory Coast','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Kuwait','Kyrgyzstan','Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macau SAR China','Macedonia','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Martinique','Mauritania','Mauritius','Mayotte','Mexico','Micronesia','Midway Island','Moldova','Monaco','Mongolia','Montenegro','Montserrat','Morocco','Myanmar','Namibia','Nauru','Nepal','Netherlands','Netherlands Antilles','Nevis','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Niue','Norfolk Island','North Korea','Northern Mariana Islands','Norway','Oman','Pakistan','Palau','Palestinian Territory','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Poland','Portugal','Puerto Rico','Qatar','Reunion','Romania','Russia','Rwanda','Samoa','San Marino','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','South Africa','South Georgia','South Sandwich Islands','South Korea','Spain','Sri Lanka','Sudan','Suriname','Swaziland','Sweden','Switzerland','Syria','Taiwan','Tajikistan','Tanzania','Thailand','Timor Leste','Togo','Tokelau','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Turks and Caicos Islands','Tuvalu','U.S. Virgin Islands','Uganda','Ukraine','United Arab Emirates','United Kingdom','United States','Uruguay','Uzbekistan','Vanuatu','Venezuela','Vietnam','Wake Island','Wallis and Futuna','Yemen','Zambia','Zanzibar','Zimbabwe'];
            @endphp

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

            <!-- Success Message -->
            <x-alert-success />

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label class="block">
                    <p class="pb-1">Full Name</p>
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Full Name"
                        type="text"
                        name="name"
                        id="name"
                        value="{{old('name')}}"
                        required
                        autofocus
                    />
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Email</p>
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Email"
                        type="email"
                        name="email"
                        id="email"
                        value="{{old('email')}}"
                        required
                    />
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Country</p>
                    <select
                        class="form-select peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        type="text"
                        name="country"
                        id="country"
                        required
                    >
                        <option value="" selected disabled>Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{old('country')!=null && old('country')==$country ? "selected" : ""}}>{{ $country }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Mobile Number</p>
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Mobile Number"
                        type="text"
                        name="mobileNumber"
                        id="mobileNumber"
                        value="{{old('mobileNumber')}}"
                        required
                    />
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Sponsor Id</p>
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Sponsor Id"
                        type="text"
                        name="sponsorId"
                        id="sponsorId"
                        value="{{old('sponsorId')}}"
                        required
                    />
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Position</p>
                    <select
                        class="form-select peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        type="text"
                        name="position"
                        id="position"
                        required
                    >
                        <option value="" selected disabled>Select Position</option>
                        <option value="Left" {{old('position')!=null && old('position')=='Left' ? "selected" : ""}}>Left</option>
                        <option value="Right" {{old('position')!=null && old('position')=='Right' ? "selected" : ""}}>Right</option>
                    </select>
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Password</p>
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Password"
                        type="password"
                        name="password"
                        id="password"
                        required
                    />
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Confirm Password</p>
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Confirm Password"
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        required
                    />
                </label>
                
                <div class="mt-4 space-y-2 text-xs text-warning">
                    <p><b>Note:</b></p>
                    <p>The password must be at least 8 characters.</p>
                    <p>The password must contain at least one uppercase and one lowercase letter.</p>
                    <p>The password must contain at least one letter.</p>
                    <p>The password must contain at least one number.</p>
                </div>

                <div class="mt-6 flex items-center space-x-2">
                <input
                    class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    type="checkbox"
                    name="iAgreeWithPolicy"
                    id="iAgreeWithPolicy"
                    required
                />
                <p class="line-clamp-1">
                    I agree with
                    <a
                    href="#"
                    class="text-slate-400 hover:underline dark:text-navy-300"
                    >
                    privacy policy
                    </a>
                </p>
                </div>
                <button
                class="btn mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                >
                Sign Up
                </button>
                <div class="mt-4 text-center text-xs+">
                <p class="line-clamp-1">
                    <span>Already have an account? </span>
                    <a
                    class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                    href="{{ route('login') }}"
                    >Sign In</a
                    >
                </p>
            </form>
          </div>
        </div>
      </main>
    </div>
    <script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
  </body>
</html>
