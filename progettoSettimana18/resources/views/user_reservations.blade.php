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
                            <th scope="col">Corso</th>
                            <th scope="col">Giorno</th>
                            <th scope="col">Orario</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center align-middle">
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->course->title}}</td>
                                        <td>{{ $reservation->course->date}}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservation->course->start_time)->format('H')}}:00 - {{ \Carbon\Carbon::parse($reservation->course->end_time)->format('H')}}:00</td>
                                        @if($reservation->is_pending == 1)
                                            <td>In attesa di conferma</td>
                                        @else 
                                            <td>Confermata</td>
                                        @endif
                                        <td>
                                            <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}" onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-dark my-2 w-100">Annulla</button>
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
