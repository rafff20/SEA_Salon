
<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
            Welcome, {{ $user->name }}!
        </div>
        
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Your Reservations</h2>
            
            @if ($reservations->isEmpty())
                <p class="text-gray-700">You have no reservations yet.</p>
            @else
                <ul class="divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <li class="py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="text-lg font-semibold">{{ $reservation->service }}</p>
                                    <p class="text-gray-600">Date: {{ \Carbon\Carbon::parse($reservation->datetime)->format('M d, Y') }} | Time: {{ \Carbon\Carbon::parse($reservation->datetime)->format('H:i') }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-layout>
