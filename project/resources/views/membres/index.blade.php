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
                        <th class="w-1/8 px-2 py-1">NOMBRE</th>
                        <th class="w-1/8 px-2 py-1">APELLIDOS</th>
                        <th class="w-1/8 px-2 py-2">EMAIL</th>
                        {{--                        <th class="w-1/9 px-2 py-2">IMAGEN</th>--}}
                        {{--                        <th class="w-1/9 px-2 py-2">CV</th>--}}
                        <th class="w-1/4 px-6 py-2">DESCRIPCION</th>
                        <th class="w-1/5 px-2 py-2">ACCIONES</th>
                    </tr>

                    <tbody>
                    @foreach ($membres as $membre)
                        <tr>
                            <td class="hidden">{{ $membre->id }}</td>
                            <td class="w-1/8 px-2 py-1 text-center">{{ $membre->name }}</td>
                            <td class="w-1/8 px-2 py-1 text-center">{{ $membre->last_name }}</td>
                            <td class="w-1/8 px-2 py-2 text-center">{{ $membre->email }}</td>
                            <td class="hidden"><img alt="" src="/imagen/{{ $membre->image_path }}" width="40%"
                                                    class="w-full"></td>
                            <td class="hidden"><img alt="" src="/cv/{{ $membre->cv_path }}" width="40%" class="w-full">
                            </td>
                            <td class="hidden">{{ $membre->links }}</td>
                            <td class="w-1/8 px-2 py-2 text-center">{{ $membre->description }}</td>
                            <td class=" px-4 py-2">
                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                    <a href="{{ route('membres.edit', $membre->id) }}"
                                       class="rounded bg-green-500 text-white font-bold py-2 px-2 mr-4">Editar</a>
                                    <form action="{{ route('membres.destroy', $membre->id) }}" method="POST"
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
                    {!! $membres->links() !!}
                </div>

            </div>
            <div class="py-8">
                <a href="{{ route('membres.create') }}"
                   class="bg-cyan-500 px-5 py-3 rounded-lg text-gray-200 font-semibold hover:bg-cyan-700 transition duration-200 ease-in-out
                              mt-4 mb-4">
                    Crear
                </a>
            </div>
            <script>
                (function () {
                    'use strict';
                    // Debemos crear la clase formEliminar dentro del form del botón borrar
                    // Recordar que cada registro a eliminar está contenido en un form
                    let forms = document.querySelectorAll('.formEliminar');
                    Array.prototype.slice.call(forms).forEach(function (form) {
                        form.addEventListener('submit', function (event) {
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
