<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Membres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="w-1/8 px-2 py-1">TITULO</th>
                            <th class="w-1/8 px-2 py-1">RESUMEN PROYECTO</th>
                            <th class="w-1/8 px-2 py-2">RESULTADOS</th>
                        </tr>

                    <tbody>
                        @foreach ($projectes as $projecte)
                            <tr>
                                <td class="hidden">{{ $projecte->id }}</td>
                                <td class="w-1/8 px-2 py-1 text-center">{{ $projecte->title }}</td>
                                <td class="w-1/8 px-2 py-1 text-center">{{ $projecte->text_projecte }}</td>
                                <td class="w-1/8 px-2 py-2 text-center">{{ $projecte->text_resultat }}</td>
                                <td class=" px-4 py-2">
                                    <div class="flex justify-center rounded-lg text-lg" role="group">
                                        <a href="{{ route('projecte.edit', $projecte->id) }}"
                                            class="rounded bg-green-500 text-white font-bold py-2 px-2 mr-4">Editar</a>
                                        <form action="{{ route('projecte.destroy', $projecte->id) }}" method="POST"
                                            class="formEliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="rounded bg-red-500 text-white font-bold py-2 px-2 ">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>


                <div>
                    {!! $projectes->links() !!}
                </div>

            </div>
            <div class="py-8">
                <a href="{{ route('projectes.create') }}"
                    class="bg-cyan-500 px-5 py-3 rounded-lg text-gray-200 font-semibold hover:bg-cyan-700 transition duration-200 ease-in-out
                              mt-4 mb-4">
                    Crear
                </a>
            </div>
            <script>
                (function() {
                    'use strict';
                    // Debemos crear la clase formEliminar dentro del form del botón borrar
                    // Recordar que cada registro a eliminar está contenido en un form
                    let forms = document.querySelectorAll('.formEliminar');
                    Array.prototype.slice.call(forms).forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            event.preventDefault();
                            event.stopPropagation();
                            Swal.fire({
                                title: "¿Confirmar la eliminación de este registro?",
                                icon: "info",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Confirmar"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit();
                                    Swal.fire({
                                        title: "Eliminado!",
                                        text: "El registro se ha eliminado.",
                                        icon: "success"
                                    });
                                }
                            });
                        }, false);
                    });
                })();
            </script>

        </div>

    </div>


</x-app-layout>