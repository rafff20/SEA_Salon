<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section id="home" class="py-5 bg-white">
        <div class="container flex flex-wrap items-center justify-center mx-auto mt-10 md:px12 md:flex-row pl-5">
            <div class="mb-14 lg:mb-0 lg:w-1/2">
                <h1 class="max-w-xl text-[2.9rem] leading-none text-gray-900 font-extrabold font-sans text-center lg:text-5xl lg:text-left lg:leading-tight mb-5">
                    SEA Salon
                </h1>
                <h2 class="max-w-xl text-justify text-xl text-primary lg:text-left lg:max-w-md mb-8 font-extrabold">“Beauty and Elegance Redefined”</h2>  

                <div class="flex justify-center mt-14 lg:justify-start">
                    <button type="button" class="text-white bg-indigo-600 font-medium rounded-lg px-5 py-4 text-center hover:bg-indigo-500 hover:drop-shadow-md transition duration-300 ease-in-out">
                        <a href="/reservation">Reservation</a>
                    </button>
                    <button type="button" class="text-gray-900 ml-4 bg-gray-200 font-medium rounded-lg px-5 py-4 text-center hover:bg-gray-300 hover:drop-shadow-md transition duration-300 ease-in-out">
                        <a href="/review">Review</a>
                    </button>
                </div>
            </div>
            <div class="lg:w-1/2 ">
                <img src="./img/image1.jpg" alt="" class="rounded-md pr-5">
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="bg-black rounded-md">
                <h2 class="text-3xl font-bold text-white text-center mb-8 rounded-md py-4">Our Services</h2>
            </div>
            
    
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-white duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Haircuts and Styling</h3>
                    <p class="text-gray-700 leading-relaxed text-justify">
                        Our expert stylists offer a wide range of haircuts and styling services to suit your preferences and enhance your look.
                    </p>
                </div>
    
                <div class="bg-white p-6 rounded-lg shadow-md text-justify transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Manicure and Pedicure</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Treat yourself to a relaxing manicure and pedicure session with our skilled technicians, leaving your hands and feet looking their best.
                    </p>
                </div>
    
                <div class="bg-gray-100 p-6 rounded-lg shadow-md transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-white duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Facial Treatments</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Experience rejuvenation with our specialized facial treatments, tailored to nourish your skin and restore its natural glow.
                    </p>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Contact Section -->
    <section id="contact" class="py-10 flex items-center justify-center bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Contact Details</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center justify-center">Thomas</h3>
                    <p class="text-gray-700 leading-relaxed flex items-center justify-center">
                        Phone Number: 08123456789
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center justify-center">Sekar</h3>
                    <p class="text-gray-700 leading-relaxed flex items-center justify-center">
                        Phone Number: 08164829372
                    </p>
                </div>
            </div>
            
        </div>
    </section>
    
</x-layout>
