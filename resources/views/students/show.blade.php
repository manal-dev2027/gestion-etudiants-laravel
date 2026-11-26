<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-purple-400">
                Student Management System
            </p>
            <h2 class="mt-2 text-2xl font-bold text-white">
                Fiche étudiant
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-5xl space-y-8">

        {{-- Page heading --}}
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-3xl font-extrabold text-white">
                    Profil de l'étudiant
                </h1>
                <p class="mt-2 text-sm text-gray-400">
                    Consultez les informations détaillées de cet étudiant.
                </p>
            </div>

            <a href="{{ url('/students') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/10 px-5 py-3 text-sm font-semibold text-gray-300 transition hover:bg-white/5 hover:text-white">
                ← Retour à la liste
            </a>
        </div>

        {{-- Student profile card --}}
        <div class="overflow-hidden rounded-2xl border border-white/10 bg-[#151522] shadow-xl">

            {{-- Profile header --}}
            <div class="relative overflow-hidden border-b border-white/10 bg-gradient-to-r from-purple-950/60 to-[#151522] px-8 py-10">
                <div class="flex flex-col items-center gap-5 sm:flex-row sm:items-center">

                    <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl border border-purple-400/30 bg-purple-600/20 text-4xl font-extrabold text-purple-300 shadow-lg shadow-purple-900/20">
                        {{ strtoupper(substr($student->first_name, 0, 1)) }}
                    </div>

                    <div class="text-center sm:text-left">
                        <p class="text-xs font-semibold uppercase tracking-widest text-purple-400">
                            Étudiant
                        </p>

                        <h2 class="mt-2 text-2xl font-extrabold text-white sm:text-3xl">
                            {{ $student->first_name }} {{ $student->last_name }}
                        </h2>

                        <p class="mt-2 text-sm text-gray-400">
                            Identifiant étudiant : #{{ $student->id }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Student information --}}
            <div class="p-8">
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-white">
                        Informations personnelles
                    </h3>
                    <p class="mt-1 text-sm text-gray-400">
                        Coordonnées et renseignements de l'étudiant.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                    {{-- Last name --}}
                    <div class="rounded-xl border border-white/10 bg-[#0b0b12] p-5">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Nom
                        </p>
                        <p class="mt-2 text-base font-semibold text-white">
                            {{ $student->last_name }}
                        </p>
                    </div>

                    {{-- First name --}}
                    <div class="rounded-xl border border-white/10 bg-[#0b0b12] p-5">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Prénom
                        </p>
                        <p class="mt-2 text-base font-semibold text-white">
                            {{ $student->first_name }}
                        </p>
                    </div>

                    {{-- Email --}}
                    <div class="rounded-xl border border-white/10 bg-[#0b0b12] p-5">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Adresse email
                        </p>
                        <p class="mt-2 break-all text-base font-semibold text-purple-300">
                            {{ $student->email }}
                        </p>
                    </div>

                    {{-- Phone --}}
                    <div class="rounded-xl border border-white/10 bg-[#0b0b12] p-5">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Téléphone
                        </p>
                        <p class="mt-2 text-base font-semibold text-white">
                            {{ $student->phone ?: 'Non renseigné' }}
                        </p>
                    </div>

                    {{-- Birth date --}}
                    <div class="rounded-xl border border-white/10 bg-[#0b0b12] p-5 md:col-span-2">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Date de naissance
                        </p>
                        <p class="mt-2 text-base font-semibold text-white">
                            {{ $student->birth_date ?: 'Non renseignée' }}
                        </p>
                    </div>

                </div>

                {{-- Actions --}}
                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-white/10 pt-6 sm:flex-row sm:justify-end">

                    <a href="{{ url('/students') }}"
                       class="inline-flex items-center justify-center rounded-xl border border-white/10 px-6 py-3 text-sm font-semibold text-gray-300 transition hover:bg-white/5 hover:text-white">
                        Retour à la liste
                    </a>

                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('students.edit', $student->id) }}"
                           class="inline-flex items-center justify-center gap-2 rounded-xl bg-purple-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500">
                            ✎ Modifier les informations
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
