<x-layouts.app :title="__('Info Alumno')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            
            <x-alerta :titulo="$alumno->nombre">
                <ul>
                    <li>Elemento 1</li>
                    <li>Elemento 2</li>
                    <li>Elemento 3</li>
                </ul>
            </x-alerta>

            <x-alerta titulo="Segunda alerta" />
                {{-- Otra cosa --}}
            {{-- </x-alerta> --}}

            <h1>{{ $alumno->nombre }}</h1>

            <ul>
                <li>Correo: {{ $alumno->correo }}</li>
                <li>Código: {{ $alumno->codigo }}</li>
            </ul>
            <hr>
            
            <h2>Materias a las que está inscrito</h2>
            <ul>
                @foreach ($alumno->secciones as $seccion)
                    <li>{{ $seccion->nombre }} - {{ $seccion->seccion }}</li>
                @endforeach
            </ul>

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <form action="{{ route('alumno.actualizar-secciones', $alumno) }}" method="POST">
                        @csrf

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm/6 font-medium text-gray-900">Country</label>
                            <div class="mt-2 grid grid-cols-1">
                            <select id="country" name="country" autocomplete="country-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                            </div>
                        </div>

                        <select name="seccion_id[]" id="seccion_id" multiple>
                            @foreach ($secciones as $seccion)
                                <option value="{{ $seccion->id }}" @selected(array_search($seccion->id, $alumno->secciones->pluck('id')->toArray()) !== false)>
                                    {{ $seccion->nombre }} - {{ $seccion->seccion }}
                                </option>
                            @endforeach
                        </select>
                        <br>
                        {{-- <input type="hidden" name="alumno_id" value="{{ $alumno->id }}"> --}}
                        <button type="submit" class="btn btn-primary">Inscribir</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>