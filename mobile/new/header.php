<style>
    .group:hover .group-hover\:visible {
        visibility: visible;
    }

    .group2:hover .group2-hover\:visible {
        visibility: visible;
    }

    .left-20 {
        left: 5rem;
    }

    .w-24 {
        width: 6rem;
    }
</style>
<header>
    <nav id="header"
        class="z-10 py-0 ease-out duration-300 flex flex-wrap items-center justify-between w-full text-lg text-gray-700 fixed top-0 | md:py-0">

        <div class="ml-4">
            <a href="/">
                <img id="logo" class="w-32 | md:w-auto ease-out duration-300" src="/images/logo.svg" alt="logo" />
            </a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block mr-4"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

        <div class="hidden w-full md:flex md:items-center md:w-auto bg-white | md:bg-transparent " id="menu">
            <ul class="pt-4 text-[13px] text-gray-700 md:flex md:justify-between md:pt-0 font-bold font-raleway">

                <li class="px-4 border-0 border-b border-gray-300 border-solid py-2 | md:border-0 md:py-0">
                    <a class="md:p-4 py-2 block hover:text-[#DFA128]" href="/mobile">
                        MOBILE
                    </a>
                </li>
                <li class="px-4 group border-0 border-b border-gray-300 border-solid py-2 | md:border-0 md:py-0">
                    <a class="md:p-4 py-2 block hover:text-[#DFA128]" href="#">
                        BORROW
                    </a>
                    <div
                        class="absolute w-full border-0 border-t border-[#DFA128] border-solid bg-white
                   transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg | md:w-auto">
                        <a href="https://app.vidalia.com.ph/login">
                            <div class="py-2 px-4 hover:bg-gray-200">E-Commerce Loan</div>
                        </a>
                        <a href="https://app.vidalia.com.ph/login">
                            <div class="py-2 px-4 hover:bg-gray-200">Small Business Loan</div>
                        </a>
                        <a href="https://app.vidalia.com.ph/login">
                            <div class="py-2 px-4 hover:bg-gray-200">Business Loan</div>
                        </a>

                        <a href="https://app.vidalia.com.ph/login">
                            <div class="py-2 px-4 hover:bg-gray-200">Personal Loan</div>
                        </a>

                        <a href="https://app.vidalia.com.ph/login">
                            <div class="py-2 px-4 hover:bg-gray-200">Salary Loan</div>
                        </a>
                        <a href="https://app.vidalia.com.ph/login">

                            <div class="py-2 px-4 hover:bg-gray-200">Lite Loan</div>
                        </a>

                    </div>
                </li>
                <li class="px-4 border-0 border-b border-gray-300 border-solid py-2 | md:border-0 md:py-0">
                    <a class="md:p-4 py-2 block hover:text-[#DFA128]" href="/loans">
                        LOANS
                    </a>
                </li>
                <li class="px-4 border-0 border-b border-gray-300 border-solid py-2 | md:border-0 md:py-0">
                    <a class="md:p-4 py-2 block hover:text-[#DFA128]" href="/help">
                        HELP
                    </a>
                </li>
                <li class="px-4 border-0 border-b border-gray-300 border-solid py-2 | md:border-0 md:py-0">
                    <a class="md:p-4 py-2 block hover:text-[#DFA128]" href="https://app.vidalia.com.ph/login">
                        LOGIN
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');
    const nav = document.querySelector('#header');
    const logo = document.querySelector('#logo');

    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    // Nav bar color change when scroll
    window.onscroll = () => {

        if (this.scrollY <= 10) {
            nav.classList.remove("bg-white");
            menu.classList.remove("text-white");
            nav.classList.remove("shadow-lg");
            logo.classList.add("w-32");
            logo.classList.remove("w-24");
        } else {
            nav.classList.add("bg-white");
            menu.classList.add("text-white");
            nav.classList.add("shadow-lg");
            logo.classList.remove("w-32");
            logo.classList.add("w-24");
        }
    }
</script>