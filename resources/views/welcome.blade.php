@extends('layouts.app')
@section('title')
    Welcome
@endsection
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
    <body>
        <!-- Carousel -->
        <div id="animation-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="img/santiagoCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 hover:shadow-hg dark:hover:shadow-black/30" alt="santiagoIMG">
                    <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <h5 class="text-xl text-shadow: 1px 1px 1px #000">Santiago</h5>
                        <p>
                            "La Capital"
                        </p>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="img/antofagastaCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="antofagastaIMG">
                    <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <h5 class="text-xl text-shadow: 1px 1px 1px #000">Antofagasta</h5>
                        <p>
                            "La Perla del Norte Grande"
                        </p>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                    <img src="img/calamaCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="calamaIMG">
                    <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <h5 class="text-xl text-shadow: 1px 1px 1px #000">Calama</h5>
                        <p>
                            "Tierra de Sol y Cobre"
                        </p>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="img/viña.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="viñaIMG">
                    <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <h5 class="text-xl text-shadow: 1px 1px 1px #000">Viña del Mar</h5>
                        <p>
                            "La ciudad jardín"
                        </p>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="img/desiertoCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="desiertoIMG">
                    <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <h5 class="text-xl text-shadow: 1px 1px 1px #000">Desierto de Atacama</h5>
                        <p>
                            "El desierto más árido del mundo"
                        </p>
                    </div>
                </div>
            </div>
            <!-- Slider pagination -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <!-- End Carousel -->

        <!-- Section 1 -->



        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
@endsection
