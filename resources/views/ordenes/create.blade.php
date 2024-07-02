<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Ordenes') }} --}}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="mb-4 p-4 border border-red-400 bg-red-100 text-red-700 rounded mx-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 p-4 border border-green-400 bg-green-100 text-green-700 rounded mx-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-6 sm:p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Orden</h2>

                <form action="{{ route('ordenes.store') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label for="vehiculo_id" class="block text-sm font-medium text-gray-700">Vehículo</label>
                        <select name="vehiculo_id" id="vehiculo_id" class="form-select mt-1 block w-full" required>
                            @foreach($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }} - {{ $vehiculo->propietario }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="tipo_orden" class="block text-sm font-medium text-gray-700">Tipo de Orden</label>
                        <select name="tipo_orden" id="tipo_orden" class="form-select mt-1 block w-full" required>
                            <option value="Correctivo">Correctivo</option>
                            <option value="Preventivo">Preventivo</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mt-6">
                        <a href="{{route('ordenes.index')}}" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Crear Orden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>