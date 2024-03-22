<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Iscrizione corso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <div class="p-6 text-gray-900">
                                <h3 class="font-semibold text-lg mb-2">{{ $course->title }}</h3>
                                <p class="mb-4">{{ $course->description }}</p>
                                <ul class="list-disc list-inside mb-4">
                                    <li><strong>Giorno:</strong> {{ $course->date }}</li>
                                    <li><strong>Orario inizio:</strong> {{ $course->start_time }}:00</li>
                                    <li><strong>Orario fine:</strong> {{ $course->end_time }}:00</li>
                                </ul>
                            </div>
                            </div>
                            @if ($user && $user->is_admin == 0)
                                <form method="post" action="{{ route('reservations.store') }}" enctype="multipart/form-data" id="reservationForm">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="is_pending" value="1">
                                    <button type="submit" class="btn btn-outline-success mt-4 w-100">Conferma iscrizione</button>
                                </form>
                            @endif
                            <a type="button" class="btn btn-outline-dark mt-4 w-100" href="/courses">Torna ai corsi</a>
                            <a type="button" class="btn btn-outline-warning my-2 w-100" href="/reservations">Guarda tutte le prenotazioni</a>
                        </div>
            </div>
        </div>
    </div>
</x-app-layout>
