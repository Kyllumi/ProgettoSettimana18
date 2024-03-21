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

                    <table class="table table-striped table-hover">
                    <thead class="table-light align-middle text-center">
                                <tr>
                                <th scope="col">Corso</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Giorno</th>
                                <th scope="col">Orario inizio</th>
                                <th scope="col">Orario fine</th>
                                <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider text-center align-middle">
                                @if($courses)
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->description}}</td>
                                            <td>{{ $course->date }}</td>
                                            <td>{{ $course->start_time }}</td>
                                            <td>{{ $course->end_time }}</td>
                                            <td>
                                                @if ($user && $user->is_admin == 0)
                                                <a type="button" class="btn btn-outline-warning my-2 w-100" href="{{ route('reservations.create', ['course_id' => $course->id]) }}">Iscriviti</a>
                                                    
                                                @else
                                                    <a type="button" class="btn btn-outline-primary my-2 w-100" href="/courses/{{$course->id}}">Dettagli</a>
                                                    <a type="button" class="btn btn-outline-success my-2 w-100" href="/courses/{{$course->id}}/edit">Modifica</a>

                                                    <form method="POST" action="{{ route('courses.destroy', $course->id) }}" onsubmit="return confirm('Sei sicuro di voler eliminare questo corso?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger my-2 w-100">Elimina</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
