<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prenotazioni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">



                @if($reservations->count() > 0)
                    <table class="table table-striped table-hover">
                        <thead class="table-light align-middle text-center">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo Corso</th>
                            <th scope="col">Utente</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center align-middle">
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td>{{ $reservation->course->title}}</td>
                                        <td>{{ $reservation->user->name }}</td>
                                        @if($reservation->is_pending == 1)
                                            <td>In attesa di conferma</td>
                                        @else 
                                            <td>Confermata</td>
                                        @endif
                                        <td>
                                            @if($reservation->is_pending == 1)
                                            <a type="button" class="btn btn-outline-success my-2 w-100" href="/reservations/{{$reservation->id}}">Conferma</a>
                                            @else 
                                            <a type="button" class="btn btn-outline-warning my-2 w-100" href="/reservations/{{$reservation->id}}">Annulla</a>
                                            @endif
                                            <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}" onsubmit="return confirm('Sei sicuro di voler eliminare questa prenotazione?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger my-2 w-100">Elimina</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else 
                                    <p>Non ci sono prenotazioni!</p>
                        </tbody>
                    </table>
                    @endif

                





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
