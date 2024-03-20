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
                                            <td>{{ \Carbon\Carbon::parse($course->start_time)->format('H') }}:00</td>
                                            <td>{{ \Carbon\Carbon::parse($course->end_time)->format('H') }}:00</td>
                                            <td>
                                                @if ($user && $user->is_admin == 0)
                                                    <a type="button" class="btn btn-outline-warning my-2 w-100" href="/courses/{{$course->id}}">Iscriviti</a>
                                                @else
                                                    <a type="button" class="btn btn-outline-info my-2 w-100" href="/courses/{{$course->id}}">Dettagli</a>
                                                    <a type="button" class="btn btn-outline-danger my-2 w-100" href="/courses/{{$course->id}}">Elimina</a>
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
