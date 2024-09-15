<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-center h-screen">
    <div class="flex flex-col items-center space-y-4"> <!-- Flex column and vertical spacing -->
        <div>
            Hello {{ Auth::user()->name }}
        </div>
        <div style="padding:30px;">
            <img 
            src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
            alt="Profile Photo" 
            style="
                width: 15rem; 
                height: 15rem; 
                object-fit: cover; 
                border-radius: 9999px; 
                border: 2px solid #d1d5db; /* Adjust the color and size as needed */
            "  
            >
        </div>
        
        <div>
            Hello everyone
        </div>
        <div>
            You're logged in!
        </div>
    </div>
</div>
        </div>
        
    </div>
</x-app-layout>