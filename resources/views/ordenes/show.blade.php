<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Ordenes') }} --}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalles de la Orden</h2>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">ID de la Orden:</label>
                    <p class="mt-1 text-gray-900">{{ $orden->id }}</p>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Vehículo:</label>
                    <p class="mt-1 text-gray-900">{{ $orden->vehiculos->placa }} - {{ $orden->vehiculos->propietario }}</p>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Tipo de Orden:</label>
                    <p class="mt-1 text-gray-900">{{ $orden->tipo_orden }}</p>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Fecha:</label>
                    <p class="mt-1 text-gray-900">{{ $orden->fecha }}</p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('ordenes.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>

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
            <div class="px-4 py-5 sm:p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalles de la Orden</h2>

                <!-- Existing order details here -->

                <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-6">Agregar Nuevo Item</h3>
                <form action="{{ route('items.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="orden_id" value="{{ $orden->id }}">

                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="valor" class="block text-sm font-medium text-gray-700">Valor</label>
                        <input type="number" name="valor" id="valor" class="mt-1 block w-full" required>
                    </div>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Agregar Item</button>
                </form>

                <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-6">Listado de Items</h3>
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orden->items as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->descripcion }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->cantidad }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->valor }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este ítem?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>