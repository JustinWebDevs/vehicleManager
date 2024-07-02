<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-3xl font-bold mb-4">Bienvenido al VehicleMager</h1>
            <p class="text-gray-700 mb-6">¡Hola, {{ Auth::user()->name }}! Nos alegra verte de nuevo.</p>
        </div>
    </div>
</x-app-layout>
