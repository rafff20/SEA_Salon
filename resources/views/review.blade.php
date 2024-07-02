<x-layout>
    <x-slot:title>Customer Reviews</x-slot:title>
    <body class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-semibold text-center mb-8">Customer Reviews</h1>

            <!-- success message -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- form review -->
            <form action="{{ route('ratings.store') }}" method="POST" id="reviewForm" class="bg-white p-6 rounded-lg shadow-md mb-8">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Customer Name:</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Star Rating (1-5):</label>
                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        <span id="selectedRating">Select Rating</span>
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <input type="hidden" id="rating" name="rating" required>
                    
                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            @for ($i = 1; $i <= 5; $i++)
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-value="{{ $i }}">
                                        @for ($j = 1; $j <= $i; $j++)
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-block w-4 h-4">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"/>
                                            </svg>
                                        @endfor
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="review" class="block text-sm font-medium text-gray-700">Comment:</label>
                    <textarea id="review" name="review" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit Review</button>
            </form>

            <!-- Container to display reviews -->
            <div id="reviewsContainer" class="grid grid-cols-1 gap-4">
                @foreach ($ratings as $rating)
                    <div class="bg-gray-200 rounded-lg p-8 text-center">
                        <p class="font-bold uppercase">{{ $rating->name }}</p>
                        <p class="text-xl font-light italic text-gray-700">{{ $rating->review }}</p>
                        <div class="flex items-center justify-center space-x-2 mt-4">
                            @for ($i = 0; $i < $rating->rating; $i++)
                                <svg class="text-yellow-500 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const dropdownButton = document.getElementById('dropdownHoverButton');
                const dropdown = document.getElementById('dropdownHover');
                const selectedRating = document.getElementById('selectedRating');
                const ratingInput = document.getElementById('rating');
                const dropdownItems = dropdown.querySelectorAll('a[data-value]');

                dropdownButton.addEventListener('click', function (event) {
                    event.preventDefault();
                    dropdown.classList.toggle('hidden');
                });

                dropdownItems.forEach(item => {
                    item.addEventListener('click', function (event) {
                        event.preventDefault();
                        const value = this.getAttribute('data-value');
                        selectedRating.textContent = `${value} Star${value > 1 ? 's' : ''}`;
                        ratingInput.value = value;
                        dropdown.classList.add('hidden');
                    });
                });

                document.addEventListener('click', function (event) {
                    if (!dropdown.contains(event.target) && !dropdownButton.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            });
        </script>
    </body>
</x-layout>
