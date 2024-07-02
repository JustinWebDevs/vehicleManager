<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipos de Vehiculos') }}
        </h2>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <table class="w-full text-sm text-left rtl:text-right text-gray-800">
                <thead class="text-xs text-gray-900 uppercase bg-gray-5 text-center">
                    <tr>
                        <th class="px-6 py-3">
                            ID
                        </th>
                        <th class="px-6 py-3">
                            Nombre
                        </th>
                        
                    </tr>
                </thead>
                @foreach ($tiposVehiculos as $item)
                    <tr class="odd:bg-white even:bg-gray-50 text-center">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$item->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->nombre}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>