
<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
            Book an Appointment
        </div>
        <form class="py-4 px-6" action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" type="text" name="name" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="email" name="email" value="{{ Auth::user()->email }}" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="phone">
                    Phone Number
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="phone" type="tel" name="phoneNumber" value="{{ Auth::user()->phoneNumber }}" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="date">
                    Date
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="date" type="date" name="date" value="{{ old('date') }}" placeholder="Select a date" required>
                @error('date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="time">
                    Time
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="time" type="time" name="time" value="{{ old('time') }}" placeholder="Select a time" required>
                @error('time')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="service">
                    Service
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="service" name="service" required>
                    <option value="">Select a service</option>
                    <option value="Haircuts and styling" {{ old('service') === 'Haircuts and styling' ? 'selected' : '' }}>Haircuts and styling</option>
                    <option value="Manicure and pedicure" {{ old('service') === 'Manicure and pedicure' ? 'selected' : '' }}>Manicure and pedicure</option>
                    <option value="Facial treatments" {{ old('service') === 'Facial treatments' ? 'selected' : '' }}>Facial treatments</option>
                </select>
                @error('service')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="message">
                    Message
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="message" name="message" rows="4" placeholder="Enter any additional information">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div> --}}
            <div class="flex items-center justify-center mb-4">
                <button
                    class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                    type="submit">
                    Book Appointment
                </button>
            </div>
        </form>
    </div>
</x-layout>
