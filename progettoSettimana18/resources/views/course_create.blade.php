<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aggiungi un corso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo Corso</label>
                                <input type="text" class="form-control rounded" name="title" value="{{ old('title') }}"  required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <input type="text" class="form-control rounded" name="description" value="{{ old('description') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Giorno</label>
                                <select class="form-select" name="date" required>
                                    <option value="Lunedì">Lunedì</option>
                                    <option value="Martedì">Martedì</option>
                                    <option value="Mercoledì">Mercoledì</option>
                                    <option value="Giovedì">Giovedì</option>
                                    <option value="Venerdì">Venerdì</option>
                                    <option value="Sabato">Sabato</option>
                                    <option value="Domenica">Domenica</option>
                                </select>
                            </div>

                            <div class="mb-3 d-flex justify-content-start">
                                <div class="w-25">
                                    <label for="start_time" class="form-label">Ora di inizio</label>
                                    <input type="time" id="start_time" name="start_time" class="form-control" required>
                                </div>
                                <div class="w-25 ms-3">
                                    <label for="end_time" class="form-label">Ora di fine</label>
                                    <input type="time" id="end_time" name="end_time" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-dark my-2 w-100">Aggiungi corso</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
