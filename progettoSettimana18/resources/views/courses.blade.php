<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Corsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @if($courses)
                    @foreach($courses as $course)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h3 class="font-semibold text-lg mb-2">{{ $course->title }}</h3>
                                <p class="mb-4">{{ $course->description }}</p>
                                <ul class="list-disc list-inside mb-4">
                                    <li><strong>Giorno:</strong> {{ $course->date }}</li>
                                    <li><strong>Orario inizio:</strong> {{ \Carbon\Carbon::parse($course->start_time)->format('H') }}:00</li>
                                    <li><strong>Orario fine:</strong> {{ \Carbon\Carbon::parse($course->end_time)->format('H') }}:00</li>
                                </ul>
                                <div class="flex justify-between">
                                    @if ($user && $user->is_admin == 0)
                                        <a href="/courses/{{$course->id}}" class="btn btn-outline-warning w-1/2">Iscriviti</a>
                                    @else
                                        <a href="/courses/{{$course->id}}" class="btn btn-outline-info w-1/2">Dettagli</a>
                                        <a href="/courses/{{$course->id}}" class="btn btn-outline-danger w-1/2">Elimina</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
