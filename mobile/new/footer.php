<style>
    .scrollToTopBtn {
        background-color: black;
        border: none;
        color: white;
        cursor: pointer;
        font-size: 18px;
        line-height: 48px;
        width: 48px;

        /* place it at the bottom right corner */
        position: fixed;
        bottom: 20px;
        right: 20px;
        /* keep it at the top of everything else */
        z-index: 100;
        /* hide with opacity */
        opacity: 0;
        /* also add a translate effect */
        transform: translateY(100px);
        /* and a transition */
        transition: all 0.5s ease;
    }
    .showBtn {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<div class="w-full bg-[#333333] p-4 py-12">
    <div class="container mx-auto | md:flex">
        <div class="w-full mb-4 | md:mb-0 md:w-4/12">
            <div class="text-[14px] text-white font-semibold grid grid-cols-2 gap-6">

                <a href="/" class="text-[18px]">Home</a>
                <a href="/contact" class="text-[18px]">Contact Us</a>
                <a href="/invest" class="text-[18px]">Invest</a>
                <a href="/terms" class="text-[18px]">Terms</a>
                <a href="/loans" class="text-[18px]">Loans</a>
                <a href="/blog" class="text-[18px]">Blog</a>
                <a href="/careers" class="text-[18px]">Careers</a>
                <a href="/privacy" class="text-[18px]">Privacy</a>
                <a href="/loan-calculator" class="text-[18px]">Loan Calculator</a>
                <a href="/help" class="text-[18px]">Help</a>
                <a href="/sitemap" class="text-[18px]">Sitemap</a>

            </div>
        </div>
        <div class="w-full | md:w-8/12">
            <div class="text-[14px] text-gray-300">
                <p>Since 2008, we've helped thousands of Filipinos get easy access to short term financing in
                    the forms of personal loan, salary loan and small business loan.</p>
                <br>
                <p>Through our website, We offer different type of loans in our platform. We make it easy and
                    convenient for you to avail of our financial products.</p>
            </div>
        </div>

    </div>

    <div class="container mx-auto">
        <div class="border-t border-solid border-gray-500 my-6"></div>
    </div>

    <div class="container mx-auto | md:flex">
        <div class="w-full mb-4 | md:mb-0 md:w-4/12">
            <div class="flex flex-col text-[14px]  text-white font-semibold gap-6">
                <div>
                    <div class="text-[10px] text-gray-300">
                        CALL US:
                    </div>
                    <div class="text-[20px]">8518 0112 PLDT</div>
                </div>

                <div>
                    <diwv class="text-[10px] text-gray-300">
                        CELLPHONE:
                    </diwv>
                    <div class="text-[20px]">0939 927 2375 SMART</div>
                </div>

                <div>
                    <div class="text-[10px] text-gray-300">
                        CELLPHONE:
                    </div>
                    <div class="text-[20px]">0917 328 4072 GLOBE</div>
                </div>
            </div>
        </div>
        <div class="w-full | md:w-8/12">
            <div class="flex justify-between md:justify-end gap-4 text-[14px] text-gray-300">
                <div> 
                    <div class="text-[14px] text-gray-300 mb-2">
                        Vidalia Mobile App
                    </div>
                    <a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" target="_blank">
                        <img style="margin: -2px;width: 115px; border-radius: 21px;margin-top: -5px;"
                            src="/images/mobile-app-google-play.png?2022-08-30" alt="mobile app google play logo">
                    </a>
                </div>
                <div>
                    <img src="/images/amazon_web_services.jpg?2022-08-30" alt="amazon web services logo"
                        class="mb-4 rounded-md">
                    <div class="flex gap-2">
                        <a href="https://www.facebook.com/VidaliaLending" target="_blank"
                            class="w-8 h-8 bg-[#3B5998] text-white flex rounded-md">
                            <i class="m-auto fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.facebook.com/VidaliaLending" target="_blank"><small
                                class="footer-fb-text"><strong>Like us</strong><br>on Facebook</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full bg-[#DDDDDD] p-4 py-12">

    <div class="container mx-auto | md:flex">
        <div class="w-full | md:w-4/12">
            <div class="text-[14px]">
                Copyright © 2008-<?php echo @date("Y"); ?> Vidalia Lending Corp.
                All Rights Reserved.
            </div>
        </div>
        <div class="w-full | md:w-8/12">
            <div class="text-[14px]">
                <p>Vidalia Lending Corp. is regulated by Securities and Exchange Commission (SEC) with License
                    No.
                    CS200813771 and Certificate of Authority No. 279 issued October 2008. Incorporated with
                    registered office at 6/F Aster Business Center Mandala Park, 312 Shaw Boulevard, Mandaluyong
                    City Metro Manila 1550
                 </p>
                <br>
                <p>
                    Please study the terms and conditions in the Disclosure Statement before proceeding with the
                    loan transaction
                </p>
            </div>
        </div>
    </div>
</div>
<!-- <div class="w-full flex bg-[#333333]">
    
<div class="w-full flex bg-[#DDDDDD]">
    <div class="mx-auto w-10/12 md:w-7/12">
        <div class="py-8">
            <div class="flex flex-col md:flex-row gap-4 md:gap-12">
                <div class="text-[14px] md:w-4/12">
                    Copyright © 2008-<?php echo @date("Y"); ?> Vidalia Lending Corp.
                    All Rights Reserved.
                </div>
                <div class="text-[14px] md:w-8/12">
                    <p>Vidalia Lending Corp. is regulated by Securities and Exchange Commission (SEC) with License
                        No.
                        CS200813771 and Certificate of Authority No. 279 issued October 2008. Incorporated with
                        registered office at 6/F Aster Business Center Mandala Park, 312 Shaw Boulevard, Mandaluyong
                        City Metro Manila 1550
                     </p>
                    <br>
                    <p>
                        Please study the terms and conditions in the Disclosure Statement before proceeding with the
                        loan transaction
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> -->

<button class="scrollToTopBtn hover:bg-[#DFA128]" title="Go to Top"><i class="fa-solid fa-angle-up"></i></button>

<script>
    const scrollToTopBtn = document.querySelector(".scrollToTopBtn");
    const rootElement = document.documentElement;

    function handleScroll() {
        // Do something on scroll
        var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
        if (rootElement.scrollTop / scrollTotal > 0.8) {
            // Show button
            scrollToTopBtn.classList.add("showBtn");
        } else {
            // Hide button
            scrollToTopBtn.classList.remove("showBtn");
        }
    }

    function scrollToTop() {
        // Scroll to top logic
        rootElement.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
    scrollToTopBtn.addEventListener("click", scrollToTop);
    document.addEventListener("scroll", handleScroll);
</script>