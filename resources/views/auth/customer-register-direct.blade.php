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
      class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
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
              class="mx-auto h-16"
              src="{{ asset('website-assets/images/logo-white.png?v=20230303001525') }}"
              alt="logo"
            />
            <div class="mt-4">
              <h2
                class="text-2xl font-semibold text-primary"
              >
                Create New Account
              </h2>
              <p class="text-slate-400 dark:text-navy-300">
                Please create an account to continue
              </p>
            </div>
          </div>
          <div class="card mt-5 rounded-lg p-5 lg:p-7">

            @php
                $countries = ["Afghanistan (+93)","Albania (+355)","Algeria (+213)","American Samoa (+1-684)","Andorra (+376)","Angola (+244)","Anguilla (+1-264)","Antarctica (+672)","Antigua and Barbuda (+1-268)","Argentina (+54)","Armenia (+374)","Aruba (+297)","Australia (+61)","Austria (+43)","Azerbaijan (+994)","Bahamas (+1-242)","Bahrain (+973)","Bangladesh (+880)","Barbados (+1-246)","Belarus (+375)","Belgium (+32)","Belize (+501)","Benin (+229)","Bermuda (+1-441)","Bhutan (+975)","Bolivia (+591)","Bosnia and Herzegovina (+387)","Botswana (+267)","Brazil (+55)","British Indian Ocean Territory (+246)","British Virgin Islands (+1-284)","Brunei (+673)","Bulgaria (+359)","Burkina Faso (+226)","Burundi (+257)","Cambodia (+855)","Cameroon (+237)","Canada (+1)","Cape Verde (+238)","Cayman Islands (+1-345)","Central African Republic (+236)","Chad (+235)","Chile (+56)","China (+86)","Christmas Island (+61)","Cocos Islands (+61)","Colombia (+57)","Comoros (+269)","Cook Islands (+682)","Costa Rica (+506)","Croatia (+385)","Cuba (+53)","Curacao (+599)","Cyprus (+357)","Czech Republic (+420)","Democratic Republic of the Congo (+243)","Denmark (+45)","Djibouti (+253)","Dominica (+1-767)","Dominican Republic (+1-809, 1-829, 1-849)","East Timor (+670)","Ecuador (+593)","Egypt (+20)","El Salvador (+503)","Equatorial Guinea (+240)","Eritrea (+291)","Estonia (+372)","Ethiopia (+251)","Falkland Islands (+500)","Faroe Islands (+298)","Fiji (+679)","Finland (+358)","France (+33)","French Polynesia (+689)","Gabon (+241)","Gambia (+220)","Georgia (+995)","Germany (+49)","Ghana (+233)","Gibraltar (+350)","Greece (+30)","Greenland (+299)","Grenada (+1-473)","Guam (+1-671)","Guatemala (+502)","Guernsey (+44-1481)","Guinea (+224)","Guinea-Bissau (+245)","Guyana (+592)","Haiti (+509)","Honduras (+504)","Hong Kong (+852)","Hungary (+36)","Iceland (+354)","India (+91)","Indonesia (+62)","Iran (+98)","Iraq (+964)","Ireland (+353)","Isle of Man (+44-1624)","Israel (+972)","Italy (+39)","Ivory Coast (+225)","Jamaica (+1-876)","Japan (+81)","Jersey (+44-1534)","Jordan (+962)","Kazakhstan (+7)","Kenya (+254)","Kiribati (+686)","Kosovo (+383)","Kuwait (+965)","Kyrgyzstan (+996)","Laos (+856)","Latvia (+371)","Lebanon (+961)","Lesotho (+266)","Liberia (+231)","Libya (+218)","Liechtenstein (+423)","Lithuania (+370)","Luxembourg (+352)","Macau (+853)","Macedonia (+389)","Madagascar (+261)","Malawi (+265)","Malaysia (+60)","Maldives (+960)","Mali (+223)","Malta (+356)","Marshall Islands (+692)","Mauritania (+222)","Mauritius (+230)","Mayotte (+262)","Mexico (+52)","Micronesia (+691)","Moldova (+373)","Monaco (+377)","Mongolia (+976)","Montenegro (+382)","Montserrat (+1-664)","Morocco (+212)","Mozambique (+258)","Myanmar (+95)","Namibia (+264)","Nauru (+674)","Nepal (+977)","Netherlands (+31)","Netherlands Antilles (+599)","New Caledonia (+687)","New Zealand (+64)","Nicaragua (+505)","Niger (+227)","Nigeria (+234)","Niue (+683)","North Korea (+850)","Northern Mariana Islands (+1-670)","Norway (+47)","Oman (+968)","Pakistan (+92)","Palau (+680)","Palestine (+970)","Panama (+507)","Papua New Guinea (+675)","Paraguay (+595)","Peru (+51)","Philippines (+63)","Pitcairn (+64)","Poland (+48)","Portugal (+351)","Puerto Rico (+1-787, 1-939)","Qatar (+974)","Republic of the Congo (+242)","Reunion (+262)","Romania (+40)","Russia (+7)","Rwanda (+250)","Saint Barthelemy (+590)","Saint Helena (+290)","Saint Kitts and Nevis (+1-869)","Saint Lucia (+1-758)","Saint Martin (+590)","Saint Pierre and Miquelon (+508)","Saint Vincent and the Grenadines (+1-784)","Samoa (+685)","San Marino (+378)","Sao Tome and Principe (+239)","Saudi Arabia (+966)","Senegal (+221)","Serbia (+381)","Seychelles (+248)","Sierra Leone (+232)","Singapore (+65)","Sint Maarten (+1-721)","Slovakia (+421)","Slovenia (+386)","Solomon Islands (+677)","Somalia (+252)","South Africa (+27)","South Korea (+82)","South Sudan (+211)","Spain (+34)","Sri Lanka (+94)","Sudan (+249)","Suriname (+597)","Svalbard and Jan Mayen (+47)","Swaziland (+268)","Sweden (+46)","Switzerland (+41)","Syria (+963)","Taiwan (+886)","Tajikistan (+992)","Tanzania (+255)","Thailand (+66)","Togo (+228)","Tokelau (+690)","Tonga (+676)","Trinidad and Tobago (+1-868)","Tunisia (+216)","Turkey (+90)","Turkmenistan (+993)","Turks and Caicos Islands (+1-649)","Tuvalu (+688)","U.S. Virgin Islands (+1-340)","Uganda (+256)","Ukraine (+380)","United Arab Emirates (+971)","United Kingdom (+44)","United States (+1)","Uruguay (+598)","Uzbekistan (+998)","Vanuatu (+678)","Vatican (+379)","Venezuela (+58)","Vietnam (+84)","Wallis and Futuna (+681)","Western Sahara (+212)","Yemen (+967)","Zambia (+260)","Zimbabwe (+263)"];
            @endphp

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="pb-5 text-error" :errors="$errors" />

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
                        value="{{ $userID }}"
                        required
                        readonly
                    />
                </label>
                <label class="block mt-4">
                    <p class="pb-1">Position</p>
                    <input
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Sponsor Id"
                        type="text"
                        name="position"
                        id="position"
                        value="{{ $position }}"
                        required
                        readonly
                    />
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
