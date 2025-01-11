<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="wERkg2KZveINWjR7XQlwpNLXfAoiEVmKS8KooEG-Lrc" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        APMI
    </title>
    <meta name="description" content="Simple landind page" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, #ABCAE3 0%, #ABCAE3 100%);



        }
    </style>
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-50 top-0 mb-0 lg:ml-0 text-white bg-white">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-2 lg:pl-2 flex items-center">
                <img class="lg:w-12 lg:h-8 md:w-8 md:h-8 h-6 w-6 pr-2" src="{{ asset('img/main/emirat_logo.png') }}"
                    alt="">
                <a class="toggleColour text-blue-400 no-underline hover:no-underline  text-xl lg:text-2xl"
                    href="#">
                    <!--Icon from: http://www.potlabicons.com/ -->

                    MOPH PRIVATE INSTITUTES
                </a>
            </div>
            <div class="block lg:hidden pr-0">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-0 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0  z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="javascript:void(0)" id="student_btn">Student</a>

                        <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="javascript:void(0)" id="home_btn">Home</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                            href="#about">About</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                            href="#contact">Contact</a>
                    </li>
                </ul>
                <a id="navAction" href="{{ route('UserLogin') }} "
                    class="mx-auto lg:mx-0 hover:underline bg-white gradient  font-bold rounded-full mt-4 lg:mt-0 py-2 px-4 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Login
                </a>
            </div>
        </div>
        <!-- <hr class="border-b border-gray-100 opacity-25 my-0 py-0" /> -->
    </nav>

 <section   class='main-content cls-main'>
    <!--Hero-->
    <div class="pt-12 h-fit z-30">
        <div class="w-full mx-0 px-0">
            <!--Left Col-->
            <!-- <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
          <p class="uppercase tracking-loose w-full">What business are you?</p>
          <h1 class="my-4 text-5xl font-bold leading-tight">
            Main Hero Message to sell yourself!
          </h1>
          <p class="leading-normal text-2xl mb-8">
            Sub-hero message, not too long and not too short. Make it just right!
          </p>
          <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Subscribe
          </button>
        </div> -->
            <!--Right Col-->
            <div class="w-full md:w-full lg:w-full">
                <img class="w-screen lg:w-full" src="{{ asset('img/main/imagemain.png') }}" />
            </div>
        </div>
    </div>
    <div class="relative -mt-8 md:-mt-24 lg:-mt-32">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                        opacity="0.100000001"></path>
                    <path
                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                        opacity="0.100000001"></path>
                    <path
                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                        id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                    </path>
                </g>
            </g>
        </svg>
    </div>
    <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h3 class="w-full my-2  text-xl lg:text-4xl font-bold leading-tight text-center text-gray-800">
                <p>د عامی روغتیا وزارت د خصــوصی علومو د انسټیټوټونو ریاست</p>
                <p>وزارت صحـت عامه ریاست انستیتوت های علوم صحی خصوصی</p>
                <p>MoPH Diroctory of private midical institutes</p>
            </h3>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-5/6 sm:w-1/2 p-6">
                    <h3 class="lg:text-3xl text-sm text-gray-800 font-bold leading-none mb-3">
                        We are committed to providing quality health services throughout the country
                    </h3>
                    <p class="text-gray-600 mb-8">
                        Alhaj Dr Qalandar 'Ibad'
                        <br />
                        Acting Minister of Ministry of Public Health
                        <br />
                        <br />

                        Images from:

                        <a class="text-pink-500 underline" href="https://moph.gov.af/">MOPH</a>
                    </p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-5/6 sm:h-64 lg:h-64 mx-auto rounded-md" viewBox="0 0 1177 598.5"
                        src="{{ asset('img/main/minister.jpg') }}" />


                </div>
            </div>
            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6 ">
                    <img class="w-5/6 sm:h-64 mx-auto rounded-md shadow-outline"
                        src="{{ asset('img/main/isahaq.jpeg') }}">


                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            {{-- this titlte --}}
                        </h3>
                        <p class="text-gray-600 mb-8">
                            Mawlawi Mohammad Isahaq 'SahibZada'
                            {{-- --}}
                            <br />
                            Financial and administrative Deputy Minister
                            <br />
                            <br />
                            Images from:

                            <a class="text-pink-500 underline" href="https://moph.gov.af/">MOPH</a>
                        </p>
                    </div>
                </div>

            </div>
            <div class="flex flex-wrap">
                <div class="w-5/6 sm:w-1/2 p-6">
                    <h3 class="lg:text-3xl text-sm text-gray-800 font-bold leading-none mb-3">
                        {{-- <title></title> --}}
                    </h3>
                    <p class="text-gray-600 mb-8">
                        Dr Aminullah 'Matin'
                        <br />
                        General head of human resources Directory
                        <br />
                        <br />

                        Images from:

                        <a class="text-pink-500 underline" href="https://moph.gov.af/">MOPH</a>
                    </p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-5/6 sm:h-64 lg:h-64 mx-auto rounded-md" viewBox="0 0 1177 598.5"
                        src="{{ asset('img/main/matin.jpeg') }}" />


                </div>
            </div>
        </div>
    </section>
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Services
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">

                        </p>
                        <div class="w-full font-bold text-xl text-gray-800 px-6">
                            Curriculums
                        </div>
                        <p class="text-gray-800 text-base px-6 mb-5">
                            Each institute is given a curriculum and will develop its system according to it, which is
                            one of the important goals of this system.
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                    <div class="flex items-center justify-start">
                        {{-- <button
                            class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Action
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">

                        </p>
                        <div class="w-full font-bold text-xl text-gray-800 px-6">
                            Teachers
                        </div>
                        <p class="text-gray-800 text-base px-6 mb-5">
                            Eliminating non-professional professors from institutes is a big problem that we have been
                            facing for several years, but this system helps us to eliminate this problem.
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                    <div class="flex items-center justify-center">
                        {{-- <button
                            class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Action
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">

                        </p>
                        <div class="w-full font-bold text-xl text-gray-800 px-6">
                            Students
                        </div>
                        <p class="text-gray-800 text-base px-6 mb-5">
                            In recent years, a large number of students have obtained diplomas without going to the
                            institute, but we are trying to eliminate this problem forever through the system.
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                    <div class="flex items-center justify-end">
                        {{-- <button
                            class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Action
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#f8fafc">
                    <path
                        d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                    </path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                    <g
                        transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <section id='about' class="container mx-auto text-center py-6 mb-12">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
            About
        </h2>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <h3 class="my-4 text-3xl leading-tight">
            The Directory of private medical institute is government office for control of all institutes which is
            related to ministry of public health
            .
        </h3>
        {{-- <a
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Login
        </a> --}}
    </section>
    <!--Footer-->
    <footer class="bg-white" id='contact'>
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 text-black">
                    <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                        href="#">
                        <!--Icon from: http://www.potlabicons.com/ -->
                        MOPH Private Institutes
                    </a>
                </div>

                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Phone</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <mobile class="no-underline hover:underline text-gray-800 hover:text-pink-500">
                                0767028775 </mobile>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Email </p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <email class="no-underline hover:underline text-gray-800 hover:text-pink-500">
                                Wahidsafi.198@gmail.com</email>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="https://www.facebook.com/profile.php?id=61551624227751&mibextid=LQQJ4d"
                                class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </footer>
</section>


    {{-- studnet search part --}}
<section class="main-content cls-student">


    <div class="min-h-screen flex flex-col items-center">
        <img src="{{ asset('img/minlogo.png') }}" alt="Logo" class="w-24 mt-16 mb-4">
        <div class="flex items-center mb-4">
            <input type="text" placeholder="Search" id='searchbox' class="w-64 px-4 py-2 border  text-black rounded-l-lg">
            <button id='search_btn' class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg">
                Search
            </button>
        </div>
        <span class='text-red-600 mb-4' id='searchbox_error'></span>

        <div class="text-center">
            <h2 class="text-lg font-semibold mb-2">Student Details</h2>
            <div class="max-w-xs mx-auto">
              
           
                    <table class="  border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-200 px-4 py-2">Name</th>
                                <th class="border-b border-gray-200 px-4 py-2">Father's Name</th>
                                <th class="border-b border-gray-200 px-4 py-2">Last Name</th>
                                <th class="border-b border-gray-200 px-4 py-2">Institute</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-b border-gray-200 px-4 py-2" id='name_td'></td>
                                <td class="border-b border-gray-200 px-4 py-2" id='fname_td'></td>
                                <td class="border-b border-gray-200 px-4 py-2" id='lname_td'></td>
                                <td class="border-b border-gray-200 px-4 py-2" id='institute_td'></td>
                              
                            </tr>
                         
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
    
    
</section>


    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
   
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" >


<script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener("scroll", function() {
        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        // if (scrollpos > 0) {
        //     // header.classList.add("bg-white");
        //     navaction.classList.remove("bg-white");
        //     navaction.classList.add("gradient");
        //     navaction.classList.remove("text-gray-800");
        //     navaction.classList.add("text-white");
        //     //Use to switch toggleColour colours
        //     for (var i = 0; i < toToggle.length; i++) {
        //         toToggle[i].classList.add("text-gray-800");
        //         toToggle[i].classList.remove("text-white");
        //     }
        //     header.classList.add("shadow");
        //     navcontent.classList.remove("bg-gray-100");
        //     navcontent.classList.add("bg-white");
        // } else {
        //     // header.classList.remove("bg-white");
        //     header.classList.add("bg-sky-100");
        //     navaction.classList.remove("gradient");
        //     navaction.classList.add("bg-white");
        //     navaction.classList.remove("text-white");
        //     navaction.classList.add("text-gray-800");
        //     //Use to switch toggleColour colours
        //     for (var i = 0; i < toToggle.length; i++) {
        //         toToggle[i].classList.add("text-white");
        //         toToggle[i].classList.remove("text-gray-800");
        //     }

        //     header.classList.remove("shadow");
        //     navcontent.classList.remove("bg-white");
        //     navcontent.classList.add("bg-gray-100");
        // }
    });
</script>
<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }
    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>


<script>
    $(document).ready(function () {

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
        
        $('.main-content').hide();
        $('#home_btn').hide();
        $('.main-content.cls-main').show();
       
        // student btn event
        $('#student_btn').click(function (e) { 
            e.preventDefault();
            $('.main-content').hide();
            $('.main-content.cls-student').show();
            $('#student_btn').hide();
            $('#home_btn').show();



            
         });


        //  home btn event
        $('#home_btn').click(function (e) { 
            e.preventDefault();
            $('.main-content').hide();
            $('.main-content.cls-main').show();
            $('#student_btn').show();
            $('#home_btn').hide();
            
        });
        // search btn event 
        $('#search_btn').click(function (e) { 
            e.preventDefault();
            searchid=$('#searchbox').val();
            $.ajax({

                
                type: "POST",
                url: "{{route('search_student')}}",
                data:{id: searchid},
                success: function (response) {
                    
                  
                    


               if(response.message){
                $('#searchbox').addClass('border-red-500');
                $('#searchbox_error').html(response.message);
                $('#name_td').html('');
                    $('#fname_td').html('');
                    $('#lname_td').html('');
                    $('#institute_td').html('');
               }else{
                $('#name_td').html(response.student_name);
                    $('#fname_td').html(response.f_name);
                    $('#lname_td').html(response.l_name);
                    $('#institute_td').html(response.Institute_name);
                    $('#searchbox').removeClass('border-red-500');
                
                $('#searchbox_error').html('');


               }
                    
                },
                error : function (error){
                 
                    if(error.responseJSON.errors.id){
                      
                    $('#searchbox').addClass('border-red-500');
                    

                    $('#searchbox_error').html(error.responseJSON.errors.id)

                }
                  
                }
            });
            
        });




    });
</script>

</html>
