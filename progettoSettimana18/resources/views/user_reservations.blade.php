<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Le tue prenotazioni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">



                    @if ($reservations->count() > 0)
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($reservations as $reservation)
                                <div class="col text-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">{{ $reservation->course->title }}</h5>
                                            <p class="card-text">
                                                <strong>Giorno:</strong> {{ $reservation->course->date }}<br>
                                                <strong>Orario:</strong> {{ $reservation->course->start_time }} -
                                                {{ $reservation->course->end_time }}
                                            </p>
                                            <p class="card-text">
                                                @if ($reservation->is_pending == 1)
                                                    <span class="badge bg-warning text-dark w-75 mt-2">In attesa di
                                                        conferma</span>
                                                @else
                                                    <span class="badge bg-success w-75 mt-2">Confermata</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <form method="POST"
                                                action="{{ route('reservations.destroy', $reservation->id) }}"
                                                onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-dark w-100">Annulla</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            Non ci sono prenotazioni!
                        </div>
                    @endif





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
