<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Reporte de Incidencias</h1>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Técnico</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prioridad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Reporte</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($incidencias as $incidencia)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->equipo->nombre ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->tecnico->nombre ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->prioridad }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->estado }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->fecha_reporte }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                        <a href="#" class="text-blue-600 hover:underline">Ver</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">No hay incidencias registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>