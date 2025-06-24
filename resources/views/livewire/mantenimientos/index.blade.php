<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Listado de Mantenimientos</h1>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Técnico</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Programada</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($mantenimientos as $mantenimiento)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $mantenimiento->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $mantenimiento->equipo->nombre ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $mantenimiento->tecnico->nombre ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $mantenimiento->tipo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $mantenimiento->fecha_programada }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $mantenimiento->estado }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                        <a href="{{ route('mantenimientos.show', $mantenimiento->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('mantenimientos.editar', $mantenimiento->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">No hay mantenimientos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>