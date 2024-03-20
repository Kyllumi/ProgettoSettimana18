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
                        {{ __("Ti sei iscritto con successo. Un nostro responsabile ti confermerà la partecipazione al corso.") }}
                        <a type="button" class="btn btn-outline-dark mt-4 w-100" href="/courses">Torna ai corsi</a>
                        <a type="button" class="btn btn-outline-warning my-2 w-100" href="/reservations">Guarda tutte le prenotazioni</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
