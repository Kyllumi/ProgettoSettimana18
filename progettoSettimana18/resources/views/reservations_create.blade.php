<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Iscrizione corso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    @if ($course)
                        <h3 class="font-semibold text-lg mb-4">{{ $course->title }}</h3>
                        <p class="mb-4">{{ $course->description }}</p>
                        <p><strong>Giorno:</strong> {{ $course->date }}</p>
                        <p><strong>Orario inizio:</strong> {{ $course->start_time }}</p>
                        <p><strong>Orario fine:</strong> {{ $course->end_time }}</p>

                        <form method="post" action="{{ route('reservations.store') }}" enctype="multipart/form-data" id="reservationForm">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <input type="hidden" name="is_pending" value="1">
                            <button type="submit" class="btn btn-outline-warning mt-4 w-100">Conferma iscrizione</button>
                        </form>
                    @else
                        <p>Nessun corso selezionato.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
