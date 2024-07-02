<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Crear Vehículo') }} --}}
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

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Crear Vehículo</h2>
        <form action="{{ route('vehiculos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="placa" class="block text-gray-700">Placa</label>
                <input type="text" name="placa" id="placa" class="w-full mt-2 p-2 border rounded-md @error('placa') border-red-500 @enderror" value="{{ old('placa') }}">
                @error('placa')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="tipo_vehiculo_id" class="block text-gray-700">Tipo de Vehículo</label>
                <select name="tipo_vehiculo_id" id="tipo_vehiculo_id" class="w-full mt-2 p-2 border rounded-md @error('tipo_vehiculo_id') border-red-500 @enderror">
                    <option value="">Seleccione un tipo</option>
                    @foreach($tiposVehiculos as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_vehiculo_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
                @error('tipo_vehiculo_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="kilometraje" class="block text-gray-700">Kilometraje</label>
                <input type="number" name="kilometraje" id="kilometraje" class="w-full mt-2 p-2 border rounded-md @error('kilometraje') border-red-500 @enderror" value="{{ old('kilometraje') }}">
                @error('kilometraje')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="estado" class="block text-gray-700">Estado</label>
                <select name="estado" id="estado" class="w-full mt-2 p-2 border rounded-md @error('estado') border-red-500 @enderror">
                    <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('estado')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="propietario" class="block text-gray-700">Propietario</label>
                <input type="text" name="propietario" id="propietario" class="w-full mt-2 p-2 border rounded-md @error('propietario') border-red-500 @enderror" value="{{ old('propietario') }}">
                @error('propietario')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="flex justify-end">
                <a href="{{route('vehiculos.index')}}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 mx-2">Cancelar</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Crear</button>
            </div>
        </form>
    </div>

</x-app-layout>