<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Corsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($user && $user->is_admin == 1)
                        <a class="btn btn-outline-dark my-3 w-100" href="/courses/create">Aggiungi un nuovo corso</a>
                    @endif

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @if ($courses)
                            @foreach ($courses as $course)
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title text-center fw-bold fs-3">{{ $course->title }}</h5>
                                            <p class="card-text my-3">{{ $course->description }}</p>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Giorno:</strong> {{ $course->date }}
                                                </li>
                                                <li class="list-group-item"><strong>Orario inizio:</strong>
                                                    {{ $course->start_time }}</li>
                                                <li class="list-group-item"><strong>Orario fine:</strong>
                                                    {{ $course->end_time }}</li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            @if ($user && $user->is_admin == 0)
                                                <a type="button" class="btn btn-outline-warning my-2 w-100"
                                                    href="/courses/{{ $course->id }}">Iscriviti</a>
                                            @else
                                                <div class="d-flex justify-content-between w-100" role="group"
                                                    aria-label="Azioni">
                                                    <a type="button" class="btn btn-outline-primary"
                                                        href="/courses/{{ $course->id }}">Dettagli</a>
                                                    <a type="button" class="btn btn-outline-success"
                                                        href="/courses/{{ $course->id }}/edit">Modifica</a>
                                                    <form method="POST"
                                                        action="{{ route('courses.destroy', $course->id) }}"
                                                        onsubmit="return confirm('Sei sicuro di voler eliminare questo corso?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger">Elimina</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
