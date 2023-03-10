<div class="sidebar print:hidden">
    <!-- Main Sidebar -->
    <div class="main-sidebar">
        <div class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
        <!-- Application Logo -->
        <div class="flex pt-4">
            <a href="{{ route('dashboard') }}">
            <img
                class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                src="{{ asset('website-assets/images/favicon.png?v=20230303001525') }}"
                alt="logo"
                />
            </a>
        </div>
        <!-- Main Sections Links -->
        <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
            <!-- Dashobard -->
            <a
            href="{{ route('dashboard') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/dashboard') ? 'bg-menu' : ''}} outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
            x-tooltip.placement.right="'Dashboard'"
            >
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.22468 9.71741H2.2069C1.38379 9.71741 0.714233 9.04785 0.714233 8.22474V2.20696C0.714233 1.38385 1.38379 0.714294 2.2069 0.714294H8.2249C9.04801 0.714294 9.71757 1.38385 9.71757 2.20696V8.22496C9.71734 9.04785 9.04779 9.71741 8.22468 9.71741Z" fill="#7F969F"/>
                <path d="M19.2216 9.71741H13.2038C12.3807 9.71741 11.7109 9.04785 11.7109 8.22474V2.20696C11.7109 1.38385 12.3807 0.714294 13.2038 0.714294H19.2216C20.0447 0.714294 20.7142 1.38385 20.7142 2.20696V8.22496C20.7142 9.04785 20.0447 9.71741 19.2216 9.71741ZM13.2038 1.15874C12.6256 1.15874 12.1554 1.62896 12.1554 2.20696V8.22496C12.1554 8.80296 12.6256 9.27318 13.2038 9.27318H19.2216C19.7996 9.27318 20.2698 8.80296 20.2698 8.22496V2.20696C20.2698 1.62896 19.7996 1.15874 19.2216 1.15874H13.2038Z" fill="#7F939B"/>
                <path d="M8.22468 20.7143H2.2069C1.38379 20.7143 0.714233 20.0447 0.714233 19.2216V13.2039C0.714233 12.3807 1.38379 11.711 2.2069 11.711H8.2249C9.04801 11.711 9.71757 12.3807 9.71757 13.2039V19.2216C9.71734 20.0447 9.04779 20.7143 8.22468 20.7143ZM2.2069 12.1554C1.6289 12.1554 1.15868 12.6259 1.15868 13.2039V19.2216C1.15868 19.7996 1.6289 20.2699 2.2069 20.2699H8.2249C8.8029 20.2699 9.27312 19.7996 9.27312 19.2216V13.2039C9.27312 12.6256 8.8029 12.1554 8.2249 12.1554H2.2069Z" fill="#7F939B"/>
                <path d="M19.2216 20.7143H13.2038C12.3807 20.7143 11.7109 20.0447 11.7109 19.2216V13.2039C11.7109 12.3807 12.3807 11.711 13.2038 11.711H19.2216C20.0447 11.711 20.7142 12.3807 20.7142 13.2039V19.2216C20.7142 20.0447 20.0447 20.7143 19.2216 20.7143Z" fill="#BCC3C6"/>
                </svg>
            </a>
            
            <!-- Manage My Funds -->
            <a
            href="{{ route('customerAddFund') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/fund/*') ? 'bg-menu' : ''}} outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            x-tooltip.placement.right="'Manage My Funds'"
            >
                <svg width="24" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 0C4.47711 0 0 4.47711 0 10C0 15.5229 4.47711 20 10 20C15.5229 20 20 15.5229 20 10C20 4.47711 15.5229 0 10 0ZM10 18.5556C5.27489 18.5556 1.44444 14.7251 1.44444 10C1.44444 5.27489 5.27489 1.44444 10 1.44444C14.7251 1.44444 18.5556 5.27489 18.5556 10C18.5556 14.7251 14.7251 18.5556 10 18.5556Z" fill="#778E97"/>
                <path d="M11.0513 9.27556H8.94867C8.73556 9.27556 8.55556 9.09556 8.55556 8.88245V7.25111C8.55556 7.038 8.73556 6.858 8.94867 6.858H11.0513C11.2645 6.858 11.4445 7.038 11.4445 7.25111H12.7778C12.7778 6.29911 12.0033 5.52467 11.0513 5.52467H10.6667V4.302H9.33334V5.52467H8.94867C7.99667 5.52467 7.22223 6.29911 7.22223 7.25111V8.88245C7.22223 9.83445 7.99667 10.6089 8.94867 10.6089V10.6091H11.0513C11.2645 10.6091 11.4445 10.7891 11.4445 11.0022V12.6336C11.4445 12.8467 11.2645 13.0269 11.0513 13.0269H8.94867C8.73556 13.0269 8.55556 12.8467 8.55556 12.6336H7.22223C7.22223 13.5856 7.99667 14.3602 8.94867 14.3602H9.33334V15.5829H10.6667V14.3602H11.0513C12.0031 14.3602 12.7778 13.5858 12.7778 12.6336V11.0022C12.7778 10.05 12.0033 9.27556 11.0513 9.27556Z" fill="#7F969F"/>
                </svg>
            </a>
            
            <!-- Activations -->
            <a
            href="{{ route('customerActivateAccount') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/activations/*') ? 'bg-menu' : ''}} outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            x-tooltip.placement.right="'Activations'"
            >
                <svg width="24" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.98878 15.2549C9.74641 15.2549 9.54971 15.0582 9.54971 14.8159V5.16154C9.54971 4.91917 9.74641 4.72247 9.98878 4.72247C10.2311 4.72247 10.4278 4.91917 10.4278 5.16154V14.8159C10.4278 15.0584 10.2311 15.2549 9.98878 15.2549Z" fill="#556D76"/>
                <path d="M14.8158 10.4279H5.16149C4.91913 10.4279 4.72243 10.2312 4.72243 9.98881C4.72243 9.74644 4.91913 9.54974 5.16149 9.54974H14.8158C15.0582 9.54974 15.2549 9.74644 15.2549 9.98881C15.2549 10.2312 15.0584 10.4279 14.8158 10.4279Z" fill="#556D76"/>
                <path d="M16.3446 19.8677H3.6329C1.69027 19.8677 0.109863 18.2873 0.109863 16.3447V3.63293C0.109863 1.6903 1.69027 0.109894 3.6329 0.109894H16.3446C18.2873 0.109894 19.8677 1.6903 19.8677 3.63293V16.3447C19.8677 18.2873 18.2873 19.8677 16.3446 19.8677ZM3.6329 0.988019C2.17455 0.988019 0.987988 2.17459 0.987988 3.63293V16.3447C0.987988 17.8032 2.17455 18.9896 3.6329 18.9896H16.3446C17.8032 18.9896 18.9896 17.8032 18.9896 16.3447V3.63293C18.9896 2.17459 17.8032 0.988019 16.3446 0.988019H3.6329Z" fill="#7F969F"/>
                </svg>
            </a>
            
            <!-- Affiliate -->
            <a
            href="{{ route('customerMemberTree') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/affiliate/*') ? 'bg-menu' : ''}} outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            x-tooltip.placement.right="'Affiliate'"
            >
                <svg width="32" height="32" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 17.1927C15.8967 17.1927 16.626 17.922 16.626 18.819V19.7607C16.626 20.6573 15.8967 21.387 14.9997 21.387C14.103 21.387 13.3737 20.6577 13.3737 19.7607V18.819C13.3737 17.922 14.1033 17.1927 15 17.1927ZM15 16.1927C13.5557 16.1927 12.3737 17.3743 12.3737 18.819V19.7607C12.3737 21.205 13.5553 22.387 14.9997 22.387C16.444 22.387 17.6257 21.2053 17.6257 19.7607V18.819C17.6263 17.3743 16.4443 16.1927 15 16.1927Z" fill="#7F969F"/>
                <path d="M16.605 23.7903C17.9883 24.1267 19 25.388 19 26.8313V29H11V26.8313C11 25.3877 12.0117 24.1267 13.395 23.79C13.9047 24 14.4527 24.1097 15 24.1097C15.5473 24.1097 16.0953 24.0003 16.605 23.7903ZM16.4787 22.7477C16.0343 22.9777 15.5323 23.11 15 23.11C14.4677 23.11 13.9657 22.9777 13.5213 22.7477C11.5357 23.044 10 24.767 10 26.8313V29.548C10 29.7967 10.2033 30 10.452 30H19.548C19.7967 30 20 29.7967 20 29.548V26.8313C20 24.767 18.4643 23.044 16.4787 22.7477Z" fill="#7F969F"/>
                <path d="M25 1C25.8967 1 26.6263 1.72933 26.6263 2.626V3.56767C26.6263 4.46433 25.897 5.19367 25 5.19367C24.103 5.19367 23.3737 4.46433 23.3737 3.56767V2.62633C23.3737 1.72933 24.1033 1 25 1ZM25 0C23.5557 0 22.3737 1.18167 22.3737 2.626V3.56767C22.3737 5.012 23.5553 6.19367 25 6.19367C26.4443 6.19367 27.6263 5.012 27.6263 3.56767V2.62633C27.6263 1.18167 26.4443 0 25 0Z" fill="#7F969F"/>
                <path d="M26.605 7.59766C27.9883 7.93399 29 9.19533 29 10.639V12.8077H21V10.639C21 9.19533 22.0117 7.93433 23.395 7.59766C23.9047 7.80766 24.4527 7.91733 25 7.91733C25.5473 7.91733 26.0953 7.80766 26.605 7.59766ZM26.4787 6.55499C26.0343 6.78499 25.5323 6.91733 25 6.91733C24.4677 6.91733 23.9657 6.78499 23.5213 6.55499C21.5357 6.85133 20 8.57433 20 10.639V13.3557C20 13.6043 20.2033 13.8077 20.452 13.8077H29.548C29.7967 13.8077 30 13.6043 30 13.3557V10.639C30 8.57433 28.4643 6.85133 26.4787 6.55499Z" fill="#7F969F"/>
                <path d="M5.00001 1C5.89667 1 6.62634 1.72933 6.62634 2.626V3.56767C6.62634 4.46433 5.89701 5.19367 5.00001 5.19367C4.10334 5.19367 3.37367 4.46433 3.37367 3.56767V2.62633C3.37367 1.72933 4.10334 1 5.00001 1ZM5.00001 0C3.55567 0 2.37367 1.18167 2.37367 2.626V3.56767C2.37367 5.012 3.55534 6.19367 5.00001 6.19367C6.44434 6.19367 7.62634 5.012 7.62634 3.56767V2.62633C7.62634 1.18167 6.44434 0 5.00001 0Z" fill="#7F969F"/>
                <path d="M6.605 7.59766C7.98833 7.93399 9 9.19533 9 10.639V12.8077H1V10.639C1 9.19533 2.01167 7.93433 3.395 7.59766C3.90467 7.80766 4.45267 7.91733 5 7.91733C5.54733 7.91733 6.09533 7.80766 6.605 7.59766ZM6.47867 6.55499C6.03433 6.78499 5.53233 6.91733 5 6.91733C4.46767 6.91733 3.96567 6.78499 3.52133 6.55499C1.53567 6.85133 0 8.57433 0 10.639V13.3557C0 13.6043 0.203333 13.8077 0.452 13.8077H9.548C9.79667 13.8077 10 13.6043 10 13.3557V10.639C10 8.57433 8.46433 6.85133 6.47867 6.55499Z" fill="#7F969F"/>
                <path d="M10.9283 9.81166C12.188 9.417 13.5613 9.19766 15 9.19766C16.4387 9.19766 17.8123 9.417 19.0717 9.81166C19.127 9.48 19.2117 9.15666 19.3287 8.84733C17.9853 8.42966 16.5263 8.19766 15 8.19766C13.4737 8.19766 12.0147 8.42966 10.6713 8.84733C10.7883 9.15666 10.873 9.48 10.9283 9.81166Z" fill="#697E87"/>
                <path d="M9.33666 25.019C6.17066 23.523 4.05099 20.813 4.05099 17.7243C4.05099 16.7003 4.28433 15.718 4.71133 14.8077H3.62599C3.25399 15.7277 3.05099 16.7073 3.05099 17.7243C3.05099 21.2583 5.47933 24.347 9.07366 25.9913C9.13033 25.6563 9.21733 25.3307 9.33666 25.019Z" fill="#697E87"/>
                <path d="M26.374 14.8073H25.2887C25.7157 15.7177 25.949 16.7 25.949 17.724C25.949 20.8127 23.829 23.5227 20.663 25.0187C20.7823 25.3303 20.8693 25.656 20.926 25.991C24.5207 24.3467 26.949 21.2583 26.949 17.724C26.9493 16.707 26.746 15.7273 26.374 14.8073Z" fill="#697E87"/>
                </svg>
            </a>
            
            <!-- Withdrawal -->
            <a
            href="{{ route('customerWithdrawWorkingProfit') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/withdrawal/*') ? 'bg-menu' : ''}} outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            x-tooltip.placement.right="'Withdrawal'"
            >
                <svg width="30" height="24" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.7499 0H2.25013C1.0096 0 0 1.00933 0 2.25013V9.18373C0 10.4245 1.0096 11.4339 2.25013 11.4339H5.4424V13.6651V15.8403V18.0157C5.4424 18.6821 5.98453 19.2243 6.65067 19.2243H17.3493C18.0157 19.2243 18.5576 18.6821 18.5576 18.0157V15.8403V13.6651V11.4339H21.7499C22.9907 11.4339 24 10.4245 24 9.18373V2.25013C24 1.00933 22.9907 0 21.7499 0ZM8.46453 4.57307C8.72347 6.29413 10.2077 7.61947 12 7.61947C13.7923 7.61947 15.2765 6.29413 15.5355 4.57307H17.4909V6.2152V8.39067V13.6653C17.4909 13.7435 17.4275 13.8069 17.3493 13.8069H6.65067C6.57253 13.8069 6.50907 13.7435 6.50907 13.6653V8.39067V6.2152V4.57307H8.46453ZM9.54533 4.57307H14.4549C14.2096 5.7032 13.2027 6.5528 12.0003 6.5528C10.7979 6.5528 9.79067 5.7032 9.54533 4.57307ZM20.3539 4.57307C20.4171 4.57307 20.4688 4.62453 20.4688 4.688V6.74587C20.4688 6.80907 20.4173 6.8608 20.3539 6.8608H18.5576V6.2152V4.57307H20.3539ZM6.50907 14.8595C6.556 14.8651 6.60213 14.8739 6.65067 14.8739H17.3493C17.3979 14.8739 17.444 14.8651 17.4909 14.8595V15.8408C17.4909 15.9192 17.4275 15.9827 17.3493 15.9827H6.65067C6.57253 15.9827 6.50907 15.9192 6.50907 15.8408V14.8595V14.8595ZM5.4424 6.2152V6.8608H3.64613C3.58267 6.8608 3.5312 6.80933 3.5312 6.74587V4.688C3.5312 4.62453 3.58267 4.57307 3.64613 4.57307H5.4424V6.2152ZM17.3493 18.1581H6.65067C6.57253 18.1581 6.50907 18.0947 6.50907 18.0163V17.0349C6.556 17.0405 6.60213 17.0493 6.65067 17.0493H17.3493C17.3979 17.0493 17.444 17.0405 17.4909 17.0349V18.0163C17.4909 18.0947 17.4275 18.1581 17.3493 18.1581ZM22.9333 9.184C22.9333 9.83653 22.4024 10.3675 21.7499 10.3675H18.5576V8.39067V7.92747H20.3539C21.0053 7.92747 21.5355 7.39733 21.5355 6.74587V4.688C21.5355 4.03653 21.0056 3.5064 20.3539 3.5064H18.0243H5.97573H3.64613C2.99467 3.5064 2.46453 4.03653 2.46453 4.688V6.74587C2.46453 7.39733 2.99467 7.92747 3.64613 7.92747H5.4424V8.39067V10.3675H2.25013C1.5976 10.3675 1.06667 9.83653 1.06667 9.184V2.25013C1.06667 1.5976 1.5976 1.06667 2.25013 1.06667H21.7496C22.4021 1.06667 22.9331 1.5976 22.9331 2.25013V9.184H22.9333Z" fill="#7B949F"/>
                <path d="M8.3288 12.5291C8.6232 12.5291 8.86214 12.2901 8.86214 11.9957V10.1472C8.86214 9.85279 8.6232 9.61386 8.3288 9.61386C8.0344 9.61386 7.79547 9.85279 7.79547 10.1472V11.9957C7.79547 12.2904 8.0344 12.5291 8.3288 12.5291Z" fill="#BCC3C6"/>
                <path d="M15.6712 12.5291C15.9656 12.5291 16.2045 12.2901 16.2045 11.9957V10.1472C16.2045 9.85279 15.9656 9.61386 15.6712 9.61386C15.3768 9.61386 15.1379 9.85279 15.1379 10.1472V11.9957C15.1379 12.2904 15.3765 12.5291 15.6712 12.5291Z" fill="#BCC3C6"/>
                </svg>
            </a>
            
            <!-- Income -->
            <a
            href="{{ route('customerDirectMembersProfit') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/profit/*') ? 'bg-menu' : ''}} outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            x-tooltip.placement.right="'Income'"
            >
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.1771 11.4019H10.8229C10.4627 11.4019 10.1699 11.1088 10.1699 10.7488V8.9224C10.1699 8.5624 10.4629 8.26934 10.8229 8.26934H13.1771C13.5371 8.26934 13.8299 8.5624 13.8299 8.9224C13.8299 9.2168 14.0688 9.45574 14.3632 9.45574C14.6576 9.45574 14.8965 9.2168 14.8965 8.9224C14.8965 7.97414 14.1251 7.20267 13.1771 7.20267H12.5333V6.26667C12.5333 5.97227 12.2944 5.73334 12 5.73334C11.7056 5.73334 11.4667 5.97227 11.4667 6.26667V7.20294H10.8229C9.87466 7.20294 9.1032 7.9744 9.1032 8.92267V10.7491C9.1032 11.6973 9.87466 12.4691 10.8229 12.4691H13.1771C13.1776 12.4691 13.1779 12.4691 13.1784 12.4691C13.5376 12.4699 13.8299 12.7624 13.8299 13.1221V14.9485C13.8299 15.3088 13.5368 15.6016 13.1771 15.6016H10.8229C10.4627 15.6016 10.1699 15.3085 10.1699 14.9485C10.1699 14.6541 9.93093 14.4152 9.63653 14.4152C9.34213 14.4152 9.1032 14.6541 9.1032 14.9485C9.1032 15.8968 9.87466 16.6683 10.8229 16.6683H11.4667V17.7333C11.4667 18.0277 11.7056 18.2667 12 18.2667C12.2944 18.2667 12.5333 18.0277 12.5333 17.7333V16.6677H13.1771C14.1253 16.6677 14.8965 15.896 14.8965 14.948V13.1216C14.8965 12.1733 14.1253 11.4019 13.1771 11.4019Z" fill="#778E97"/>
                <path d="M4.01333 9.4048C3.94853 9.4048 3.8824 9.39307 3.81866 9.36773C3.54453 9.26 3.4096 8.9504 3.51706 8.67627C4.50986 6.14853 6.55573 4.2072 9.13013 3.34987C9.40906 3.25627 9.71146 3.408 9.80453 3.68747C9.8976 3.96693 9.7464 4.26907 9.46693 4.36187C7.19333 5.11893 5.3864 6.8336 4.50986 9.06613C4.42746 9.27627 4.2264 9.4048 4.01333 9.4048Z" fill="#778E97"/>
                <path d="M12.0157 21.1392C11.7213 21.1392 11.4824 20.9003 11.4824 20.6059C11.4824 20.3115 11.7213 20.0726 12.0157 20.0726C16.4603 20.0726 20.0765 16.4563 20.0765 12.0115C20.0765 11.7171 20.3155 11.4781 20.6099 11.4781C20.9043 11.4781 21.1432 11.7171 21.1432 12.0115C21.1432 17.0448 17.0488 21.1392 12.0157 21.1392Z" fill="#778E97"/>
                <path d="M12 24C5.3832 24 0 18.6168 0 12C0 5.3832 5.3832 0 12 0C13.8624 0 15.6483 0.4152 17.3067 1.23413C17.5707 1.36453 17.6789 1.68427 17.5485 1.94853C17.4184 2.21253 17.0987 2.32107 16.8341 2.19067C15.324 1.4448 13.6973 1.06667 12 1.06667C5.97147 1.06667 1.06667 5.97147 1.06667 12C1.06667 18.0285 5.97147 22.9333 12 22.9333C18.0285 22.9333 22.9333 18.0285 22.9333 12C22.9333 9.89333 22.3331 7.84827 21.1976 6.08613C21.0379 5.8384 21.1093 5.50827 21.3571 5.3488C21.6048 5.1896 21.9347 5.26053 22.0944 5.50827C23.3408 7.4432 24 9.688 24 12C24 18.6168 18.6168 24 12 24Z" fill="#BCC3C6"/>
                <path d="M19.7808 5.308C19.4864 5.308 19.2475 5.06907 19.2475 4.77467V2.1424C19.2475 1.848 19.4864 1.60907 19.7808 1.60907C20.0752 1.60907 20.3141 1.848 20.3141 2.1424V4.77467C20.3141 5.06934 20.0752 5.308 19.7808 5.308Z" fill="#778E97"/>
                <path d="M21.0968 3.99199H18.4645C18.1701 3.99199 17.9312 3.75306 17.9312 3.45866C17.9312 3.16426 18.1701 2.92532 18.4645 2.92532H21.0968C21.3912 2.92532 21.6301 3.16426 21.6301 3.45866C21.6301 3.75306 21.3915 3.99199 21.0968 3.99199Z" fill="#778E97"/>
                </svg>
            </a>

            <!-- Transfer -->
            <a
            href="{{ route('customerKmToKmTransfer') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/transfer/*') ? 'bg-menu' : ''}} outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            x-tooltip.placement.right="'Transfer'"
            >
                <svg width="28" height="30" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.1957 16.1361L14.624 15.5605C14.6094 15.5551 14.5943 15.5501 14.5793 15.5458C13.8253 15.3245 13.2354 14.7779 12.9611 14.0462C12.7293 13.4276 12.7519 12.7564 13.0252 12.1554C13.2985 11.5544 13.7895 11.0956 14.4077 10.8639C15.6839 10.3857 17.1122 11.0347 17.5904 12.3105C17.7297 12.6812 18.1423 12.8689 18.5127 12.7295C18.883 12.5906 19.071 12.1776 18.9321 11.8073C18.4224 10.448 17.2301 9.54222 15.8902 9.32589V8.21163C15.8902 7.81622 15.5692 7.4953 15.1738 7.4953C14.7784 7.4953 14.4575 7.81622 14.4575 8.21163V9.36493C14.2723 9.40468 14.0875 9.45375 13.9048 9.52216C12.9281 9.88821 12.1527 10.6128 11.7211 11.5623C11.2895 12.5118 11.2533 13.5723 11.6197 14.549C12.0506 15.6987 12.9725 16.5591 14.152 16.9133L15.724 17.4889C15.7387 17.4942 15.7533 17.4989 15.7684 17.5035C16.5223 17.7249 17.1122 18.2718 17.3866 19.0032C17.8651 20.2793 17.2157 21.7073 15.9399 22.1858C15.6892 22.28 15.4331 22.3291 15.1792 22.3399C15.1774 22.3399 15.176 22.3395 15.1742 22.3395C15.172 22.3395 15.1702 22.3402 15.1681 22.3402C14.1326 22.3796 13.1409 21.7614 12.7573 20.7396C12.6187 20.3692 12.2057 20.1823 11.835 20.3202C11.4647 20.4591 11.277 20.8721 11.4159 21.2424C11.9256 22.602 13.1172 23.51 14.4575 23.726V24.8381C14.4575 25.2335 14.7784 25.5544 15.1738 25.5544C15.5692 25.5544 15.8902 25.2335 15.8902 24.8381V23.6862C16.0753 23.6464 16.2601 23.5963 16.4428 23.5279C18.4586 22.7718 19.4836 20.5168 18.7283 18.5007C18.297 17.3506 17.3748 16.4899 16.1957 16.1361Z" fill="#667D86"/>
                <path d="M23.1409 3.17511H6.31423L7.85936 1.62998C8.13909 1.35025 8.13909 0.896811 7.85936 0.617083C7.57963 0.337356 7.12584 0.337356 6.84647 0.617083L4.07928 3.38463C4.04597 3.41794 4.01588 3.45483 3.98938 3.49423C3.97756 3.51178 3.96968 3.53077 3.95965 3.54903C3.94711 3.5716 3.9335 3.59344 3.92347 3.6178C3.9138 3.64144 3.90807 3.66579 3.90091 3.69015C3.89482 3.71056 3.88694 3.73026 3.88264 3.7514C3.86438 3.84416 3.86438 3.93943 3.88264 4.03184C3.88694 4.05297 3.89482 4.07267 3.90091 4.09309C3.90807 4.11744 3.9138 4.1418 3.92347 4.16544C3.9335 4.18943 3.94711 4.21128 3.95965 4.2342C3.96968 4.25247 3.97756 4.27145 3.98938 4.289C4.01588 4.3284 4.04561 4.36529 4.07928 4.3986L6.84647 7.16615C6.98615 7.3062 7.16953 7.37604 7.35291 7.37604C7.5363 7.37604 7.71968 7.3062 7.85936 7.16615C8.13909 6.88642 8.13909 6.43299 7.85936 6.15326L6.31423 4.60813H23.1409C26.229 4.60813 28.7412 7.12031 28.7412 10.2084C28.7412 13.2962 26.229 15.8083 23.1409 15.8083C22.7455 15.8083 22.4246 16.1293 22.4246 16.5247C22.4246 16.9201 22.7455 17.241 23.1409 17.241C27.0187 17.241 30.1738 14.0859 30.1738 10.2081C30.1738 6.33019 27.0187 3.17511 23.1409 3.17511Z" fill="#7F969F"/>
                <path d="M26.6165 28.6515L23.8486 25.8836C23.5689 25.6038 23.1154 25.6038 22.8357 25.8836C22.556 26.1633 22.556 26.6167 22.8357 26.8965L24.3808 28.4416H7.20678C4.11867 28.4416 1.60649 25.9291 1.60649 22.8409C1.60649 19.7528 4.11867 17.241 7.20678 17.241C7.6022 17.241 7.92311 16.9201 7.92311 16.5247C7.92311 16.1293 7.6022 15.8083 7.20678 15.8083C3.32892 15.8083 0.173828 18.9634 0.173828 22.8413C0.173828 26.7195 3.32892 29.8746 7.20678 29.8746H24.3805L22.8354 31.4194C22.5556 31.6988 22.5556 32.1525 22.8354 32.4323C22.9754 32.5723 23.1588 32.6422 23.3422 32.6422C23.5255 32.6422 23.7086 32.5723 23.8486 32.4323L26.6169 29.6644C26.7512 29.5301 26.8268 29.3478 26.8268 29.1579C26.8268 28.9681 26.7508 28.7858 26.6165 28.6515Z" fill="#7F969F"/>
                </svg>
            </a>
            
            <!-- Rewards -->
            <a
            href="{{ route('customerRewardHistory') }}"
            class="flex h-11 w-11 items-center justify-center rounded-lg {{ request()->is('customer/reward/*') ? 'bg-menu' : ''}}  outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            x-tooltip.placement.right="'Rewards'"
            >
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.1771 11.4019H10.8229C10.4627 11.4019 10.1699 11.1088 10.1699 10.7488V8.9224C10.1699 8.5624 10.4629 8.26934 10.8229 8.26934H13.1771C13.5371 8.26934 13.8299 8.5624 13.8299 8.9224C13.8299 9.2168 14.0688 9.45574 14.3632 9.45574C14.6576 9.45574 14.8965 9.2168 14.8965 8.9224C14.8965 7.97414 14.1251 7.20267 13.1771 7.20267H12.5333V6.26667C12.5333 5.97227 12.2944 5.73334 12 5.73334C11.7056 5.73334 11.4667 5.97227 11.4667 6.26667V7.20294H10.8229C9.87466 7.20294 9.1032 7.9744 9.1032 8.92267V10.7491C9.1032 11.6973 9.87466 12.4691 10.8229 12.4691H13.1771C13.1776 12.4691 13.1779 12.4691 13.1784 12.4691C13.5376 12.4699 13.8299 12.7624 13.8299 13.1221V14.9485C13.8299 15.3088 13.5368 15.6016 13.1771 15.6016H10.8229C10.4627 15.6016 10.1699 15.3085 10.1699 14.9485C10.1699 14.6541 9.93093 14.4152 9.63653 14.4152C9.34213 14.4152 9.1032 14.6541 9.1032 14.9485C9.1032 15.8968 9.87466 16.6683 10.8229 16.6683H11.4667V17.7333C11.4667 18.0277 11.7056 18.2667 12 18.2667C12.2944 18.2667 12.5333 18.0277 12.5333 17.7333V16.6677H13.1771C14.1253 16.6677 14.8965 15.896 14.8965 14.948V13.1216C14.8965 12.1733 14.1253 11.4019 13.1771 11.4019Z" fill="#778E97"/>
                <path d="M4.01333 9.4048C3.94853 9.4048 3.8824 9.39307 3.81866 9.36773C3.54453 9.26 3.4096 8.9504 3.51706 8.67627C4.50986 6.14853 6.55573 4.2072 9.13013 3.34987C9.40906 3.25627 9.71146 3.408 9.80453 3.68747C9.8976 3.96693 9.7464 4.26907 9.46693 4.36187C7.19333 5.11893 5.3864 6.8336 4.50986 9.06613C4.42746 9.27627 4.2264 9.4048 4.01333 9.4048Z" fill="#778E97"/>
                <path d="M12.0157 21.1392C11.7213 21.1392 11.4824 20.9003 11.4824 20.6059C11.4824 20.3115 11.7213 20.0726 12.0157 20.0726C16.4603 20.0726 20.0765 16.4563 20.0765 12.0115C20.0765 11.7171 20.3155 11.4781 20.6099 11.4781C20.9043 11.4781 21.1432 11.7171 21.1432 12.0115C21.1432 17.0448 17.0488 21.1392 12.0157 21.1392Z" fill="#778E97"/>
                <path d="M12 24C5.3832 24 0 18.6168 0 12C0 5.3832 5.3832 0 12 0C13.8624 0 15.6483 0.4152 17.3067 1.23413C17.5707 1.36453 17.6789 1.68427 17.5485 1.94853C17.4184 2.21253 17.0987 2.32107 16.8341 2.19067C15.324 1.4448 13.6973 1.06667 12 1.06667C5.97147 1.06667 1.06667 5.97147 1.06667 12C1.06667 18.0285 5.97147 22.9333 12 22.9333C18.0285 22.9333 22.9333 18.0285 22.9333 12C22.9333 9.89333 22.3331 7.84827 21.1976 6.08613C21.0379 5.8384 21.1093 5.50827 21.3571 5.3488C21.6048 5.1896 21.9347 5.26053 22.0944 5.50827C23.3408 7.4432 24 9.688 24 12C24 18.6168 18.6168 24 12 24Z" fill="#BCC3C6"/>
                <path d="M19.7808 5.308C19.4864 5.308 19.2475 5.06907 19.2475 4.77467V2.1424C19.2475 1.848 19.4864 1.60907 19.7808 1.60907C20.0752 1.60907 20.3141 1.848 20.3141 2.1424V4.77467C20.3141 5.06934 20.0752 5.308 19.7808 5.308Z" fill="#778E97"/>
                <path d="M21.0968 3.99199H18.4645C18.1701 3.99199 17.9312 3.75306 17.9312 3.45866C17.9312 3.16426 18.1701 2.92532 18.4645 2.92532H21.0968C21.3912 2.92532 21.6301 3.16426 21.6301 3.45866C21.6301 3.75306 21.3915 3.99199 21.0968 3.99199Z" fill="#778E97"/>
                </svg>
            </a>

            
        </div>
        <!-- Bottom Links -->
        <div class="flex flex-col items-center space-y-3 py-3">
            <!-- Profile -->
            <div
                x-data="usePopper({placement:'right-end',offset:12})"
                @click.outside="if(isShowPopper) isShowPopper = false"
                class="flex"
                >
            <button
                    @click="isShowPopper = !isShowPopper"
                    x-ref="popperRef"
                    class="avatar h-12 w-12"
                    >
                    @if (Auth::user()->profile_path)
                        <img
                            class="rounded-full"
                            src="{{ config('app.url') }}/storage/profile/{{ Auth::user()->profile_path }}"
                            alt="avatar"
                        />
                    @else
                        <img
                            class="rounded-full"
                            src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"
                            alt="avatar"
                        />
                    @endif
                <span
                    class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"
                    >
                </span>
            </button>
            <div
                :class="isShowPopper && 'show'"
                class="popper-root fixed"
                x-ref="popperRoot"
                >
                <div
                    class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700"
                    >
                <div
                    class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800"
                    >
                    <div class="avatar h-14 w-14">
                    @if (Auth::user()->profile_path)
                        <img
                            class="rounded-full"
                            src="{{ config('app.url') }}/storage/profile/{{ Auth::user()->profile_path }}"
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
                    <a
                        href="#"
                        class="truncate text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                        >
                        {{ Auth::user()->name }}
                    </a>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                        User ID: {{ Auth::user()->login_id }}
                    </p>
                    </div>
                </div>
                <div class="flex flex-col pt-2 pb-5">
                    <a
                    href="{{ route('customerProfileSettings') }}"
                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                    >
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4.5 w-4.5"
                            fill="none"
                            viewbox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                            >
                        <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                        </svg>
                    </div>
                    <div>
                        <h2
                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                            >
                        Profile
                        </h2>
                        <div
                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                            >
                        Your profile setting
                        </div>
                    </div>
                    </a>
                    <div class="mt-3 px-4">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
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
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                />
                        </svg>
                        <span>Logout
                        </span>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Sidebar Panel -->
    <div class="sidebar-panel">
        <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750 menu-shadow">
            <!-- Sidebar Panel Header -->
            <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
            <h1 class="text-base tracking-wider text-white text-2xl">
                <strong>Kryptomusk</strong>
            </h1>
            <button @click="$store.global.isSidebarExpanded = false" class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewbox="0 0 24 24"
                    stroke="currentColor"
                    >
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"
                        />
                </svg>
            </button>
            </div>
            @php
                $menuItem1 = request()->is('customer/fund/*');
                $menuItem2 = request()->is('customer/activations/*');
                $menuItem3 = request()->is('customer/affiliate/*');
                $menuItem4 = request()->is('customer/withdrawal/*');
                $menuItem5 = request()->is('customer/profit/*');
                $menuItem6 = request()->is('customer/transfer/*');
                $menuItem7 = request()->is('customer/reward/*');
                
                $menuItem1 ? $activeMenu = "menu-item-1" : 
                ($menuItem2 ? $activeMenu = "menu-item-2" : 
                ($menuItem3 ? $activeMenu = "menu-item-3" : 
                ($menuItem4 ? $activeMenu = "menu-item-4" : 
                ($menuItem5 ? $activeMenu = "menu-item-5" : 
                ($menuItem6 ? $activeMenu = "menu-item-6" :  
                ($menuItem7 ? $activeMenu = "menu-item-7" : $activeMenu = null))))))
                
            @endphp
            <!-- Sidebar Panel Body -->
            <div
                x-data="{expandedItem:'<?php echo $activeMenu; ?>'}"
                class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
                x-init="$el._x_simplebar = new SimpleBar($el);"
                >
                <ul class="flex flex-1 flex-col font-inter">
                    <li class="border-t px-4 py-2" x-init="$el.scrollIntoView({block: 'center'})">
                        <a
                            href="{{ route('dashboard') }}"
                            class="flex py-2 text-lg font-medium tracking-wide {{ request()->is('customer/dashboard') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-colors duration-300 ease-in-out dark:text-accent-light"
                            >
                            Dashboard
                        </a>
                    </li>

                    <li class="border-t px-4 py-2" x-data="accordionItem('menu-item-1')">
                        <a
                            :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-lg tracking-wide {{ request()->is('customer/fund/*') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                            href="javascript:void(0);"
                            >
                            <span>Manage My Funds</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                    />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    href="{{ route('customerAddFund') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/fund/create') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Add Fund</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerPendingFundList') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/fund/pending') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Pending Fund Transactions</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerConfirmedFundList') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/fund/confirmed') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Confirmed Fund Transactions</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="border-t px-4 py-2" x-data="accordionItem('menu-item-2')">
                        <a
                            :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-lg tracking-wide {{ request()->is('customer/activations/*') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                            href="javascript:void(0);"
                            >
                            <span>Activations</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                    />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    href="{{ route('customerActivateAccount') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/activations/create') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Activate Account</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerMyActivationList') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/activations/my') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>My Activations</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerAffiliateActivationList') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/activations/affiliate') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Affiliate Activations</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="border-t px-4 py-2" x-data="accordionItem('menu-item-3')">
                        <a
                            :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-lg tracking-wide {{ request()->is('customer/affiliate/*') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                            href="javascript:void(0);"
                            >
                            <span>Affiliate</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                    />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    href="{{ route('customerMemberTree') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/affiliate/tree') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Member Tree</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerDirectMembers') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/affiliate/direct') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>My Direct Members</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerAllMembers') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/affiliate/all') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>All Memebers View</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="border-t px-4 py-2" x-data="accordionItem('menu-item-4')">
                        <a
                            :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-lg tracking-wide {{ request()->is('customer/withdrawal/*') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                            href="javascript:void(0);"
                            >
                            <span>Withdrawal</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                    />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    href="{{ route('customerWithdrawWorkingProfit') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/withdrawal/working-profit') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Working Profit</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerWithdrawRoiProfit') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/withdrawal/roi-profit') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>ROI Profit</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerWithdrawWorkingProfitReport') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/withdrawal/report/working-profit') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Working Profit Reports</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerWithdrawRoiProfitReport') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/withdrawal/report/roi-profit') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>ROI Profit Reports</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="border-t px-4 py-2" x-data="accordionItem('menu-item-5')">
                        <a
                            :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-lg tracking-wide {{ request()->is('customer/profit/*') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                            href="javascript:void(0);"
                            >
                            <span>Income</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                    />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    href="{{ route('customerDirectMembersProfit') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/profit/direct-members') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Direct Members Profit</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerRoiIncomeProfit') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/profit/roi') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>ROI Income Profit</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerBinaryProfit') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/profit/binary') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Binary Profit</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="border-y px-4 py-2" x-data="accordionItem('menu-item-6')">
                        <a
                            :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-lg tracking-wide {{ request()->is('customer/transfer/*') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                            href="javascript:void(0);"
                            >
                            <span>Transfer</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewbox="0 0 24 24"
                                stroke="currentColor"
                                >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                    />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    href="{{ route('customerKmToKmTransfer') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/transfer/km-to-km') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>KM to KM Transfer</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerRoiToKmTransfer') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/transfer/roi-to-km') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>ROI to KM Transfer</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerWorkingToKmTransfer') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/transfer/working-to-km') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Working to KM Transfer</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customerTransferReport') }}"
                                    class="flex items-center justify-between p-2 text-base tracking-wide {{ request()->is('customer/transfer/report/transfer') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                                    >
                                    <div class="flex items-center space-x-2">
                                    <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                            >
                                    </div>
                                    <span>Transfer Report</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="border-t px-4 py-2" x-data="accordionItem('menu-item-7')">
                        <a
                            :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'"
                            class="flex items-center justify-between py-2 text-lg tracking-wide {{ request()->is('customer/reward/*') ? 'text-primary font-semibold' : 'text-slate-500'}} outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50"
                            href="{{ route('customerRewardHistory') }}"
                            >
                            <span>Rewards</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>