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

                    <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data"
                        id="courseForm">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo Corso</label>
                            <input type="text" class="form-control rounded" name="title"
                                value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <input type="text" class="form-control rounded" name="description"
                                value="{{ old('description') }}" required>
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

                        <div class="d-flex gap-3">
                            <div class="mb-3 w-50">
                                <label for="start_time" class="form-label">Ora di inizio</label>
                                <select class="form-select" name="start_time" required>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div>

                            <div class="mb-3 w-50">
                                <label for="end_time" class="form-label">Ora di fine</label>
                                <select class="form-select" name="end_time" required>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                    <option value="21:00">21:00</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-dark my-2 w-100">Aggiungi corso</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
