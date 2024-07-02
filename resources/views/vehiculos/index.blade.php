<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipos de Vehículos') }}
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
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('vehiculos.create') }}" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Crear Vehículo
            </a>
            
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-800">
                        <thead class="text-xs text-gray-900 uppercase bg-gray-5 text-center">
                            <tr>
                                <th class="px-6 py-3">
                                    Placa
                                </th>
                                <th class="px-6 py-3">
                                    Tipo vehiculo
                                </th>
                                <th class="px-6 py-3">
                                    Kilometraje
                                </th>
                                <th class="px-6 py-3">
                                    Estado
                                </th>
                                <th class="px-6 py-3">
                                    Propietario
                                </th>
                            </tr>
                        </thead>
                        @foreach ($vehiculos as $item)
                            <tr class="odd:bg-white even:bg-gray-50 text-center">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{$item->placa}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->tipovehiculo->nombre}}
                                </td>
                                <td  class="px-6 py-4">
                                    {{$item->kilometraje}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->estado ? 'Activo' : 'Inactivo'}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->propietario}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>