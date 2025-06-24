<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Listado de Equipos</h1>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modelo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($equipos as $equipo)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $equipo->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $equipo->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $equipo->tipoEquipo->nombre ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $equipo->marca }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $equipo->modelo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="{{ route('equipos.show', $equipo->id) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('equipos.editar', $equipo->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No hay equipos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
