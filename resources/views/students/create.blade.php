<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-purple-400">
                Student Management System
            </p>
            <h2 class="mt-2 text-2xl font-bold text-white">
                Nouvel étudiant
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-4xl space-y-8">

        {{-- Page heading --}}
        <div>
            <h1 class="text-3xl font-extrabold text-white">
                Ajouter un étudiant
            </h1>
            <p class="mt-2 text-sm text-gray-400">
                Remplissez les informations ci-dessous pour inscrire un nouvel étudiant.
            </p>
        </div>

        {{-- Form card --}}
        <div class="overflow-hidden rounded-2xl border border-white/10 bg-[#151522] shadow-xl">

            <div class="border-b border-white/10 px-8 py-6">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-600/20 text-2xl text-purple-400">
                        ♙
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">
                            Informations personnelles
                        </h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Les champs marqués * sont obligatoires.
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-8">

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 p-5 text-sm text-red-300">
                        <p class="mb-2 font-bold">Veuillez corriger les erreurs suivantes :</p>
                        <ul class="list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Last name --}}
                        <div>
                            <label for="last_name" class="mb-2 block text-sm font-semibold text-gray-300">
                                Nom <span class="text-purple-400">*</span>
                            </label>
                            <input
                                id="last_name"
                                type="text"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="Entrez le nom"
                                required
                                class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20"
                            >
                        </div>

                        {{-- First name --}}
                        <div>
                            <label for="first_name" class="mb-2 block text-sm font-semibold text-gray-300">
                                Prénom <span class="text-purple-400">*</span>
                            </label>
                            <input
                                id="first_name"
                                type="text"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="Entrez le prénom"
                                required
                                class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20"
                            >
                        </div>

                        {{-- Email --}}
                        <div class="md:col-span-2">
                            <label for="email" class="mb-2 block text-sm font-semibold text-gray-300">
                                Adresse email <span class="text-purple-400">*</span>
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="exemple@email.com"
                                required
                                class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20"
                            >
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="mb-2 block text-sm font-semibold text-gray-300">
                                Téléphone
                            </label>
                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="+212 6XX XX XX XX"
                                class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20"
                            >
                        </div>

                        {{-- Birth date --}}
                        <div>
                            <label for="birth_date" class="mb-2 block text-sm font-semibold text-gray-300">
                                Date de naissance
                            </label>
                            <input
                                id="birth_date"
                                type="date"
                                name="birth_date"
                                value="{{ old('birth_date') }}"
                                max="{{ date('Y-m-d') }}"
                                class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-gray-300 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20"
                            >
                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-col-reverse gap-3 border-t border-white/10 pt-6 sm:flex-row sm:justify-end">

                        <a href="{{ url('/students') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-white/10 px-6 py-3 text-sm font-semibold text-gray-300 transition hover:bg-white/5 hover:text-white">
                            Annuler
                        </a>

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-purple-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500">
                            <span>＋</span>
                            Ajouter l'étudiant
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
