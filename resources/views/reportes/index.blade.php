<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('') }} --}}
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
    
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Reporte de Órdenes</h1>
    
        <div class="mb-4">
            <form action="{{ route('reportes.index') }}" method="GET" class="flex space-x-4 items-end">
                <div>
                    <label for="fecha_desde" class="block text-sm font-medium text-gray-700">Fecha Desde</label>
                    <input type="date" id="fecha_desde" name="fecha_desde" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ request('fecha_desde') }}">
                </div>
                <div>
                    <label for="fecha_hasta" class="block text-sm font-medium text-gray-700">Fecha Hasta</label>
                    <input type="date" id="fecha_hasta" name="fecha_hasta" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ request('fecha_hasta') }}">
                </div>
                <div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Filtrar</button>
                    <button onclick="cleanFilter()" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Limpiar</button>
                </div>
            </form>
        </div>
    
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Vehículo ID</th>
                    <th class="px-4 py-2 border">Tipo de Orden</th>
                    <th class="px-4 py-2 border">Fecha</th>
                    <th class="px-4 py-2 border">Ítems</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                    <tr>
                        <td class="px-4 py-2 border">{{ $orden->id }}</td>
                        <td class="px-4 py-2 border">{{ $orden->vehiculo_id }}</td>
                        <td class="px-4 py-2 border">{{ $orden->tipo_orden }}</td>
                        <td class="px-4 py-2 border">{{ $orden->fecha }}</td>
                        <td class="px-4 py-2 border">
                            <table class="min-w-full bg-gray-100 border">
                                <thead>
                                    <tr>
                                        <th class="px-2 py-1 border">Descripción</th>
                                        <th class="px-2 py-1 border">Cantidad</th>
                                        <th class="px-2 py-1 border">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($orden->items->isEmpty())
                                        <tr>
                                            <td class="px-2 py-1 border" colspan="3">No hay ítems para esta orden.</td>
                                        </tr>
                                    @else
                                        @foreach ($orden->items as $item)
                                            <tr>
                                                <td class="px-2 py-1 border">{{ $item->descripcion }}</td>
                                                <td class="px-2 py-1 border">{{ $item->cantidad }}</td>
                                                <td class="px-2 py-1 border">${{ number_format($item->valor, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const cleanFilter = () => {
            const from = document.getElementById('fecha_desde')
            const to = document.getElementById('fecha_hasta')

            from.value = ''
            to.value = ''
        }
    </script>
</x-app-layout>