
<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-purple-400">
                Student Management System
            </p>
            <h2 class="mt-2 text-2xl font-bold text-white">
                Modifier un étudiant
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-3xl">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white">Modifier étudiant</h1>
            <p class="mt-2 text-gray-400">
                Modifiez les informations de cet étudiant.
            </p>
        </div>

        <div class="rounded-2xl border border-white/10 bg-[#11111b] p-6 shadow-xl sm:p-8">

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 p-4 text-red-300">
                    <p class="mb-2 font-semibold">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="list-inside list-disc space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/students/'.$student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-5">
                    <div>
                        <label for="last_name" class="mb-2 block text-sm font-medium text-gray-300">
                            Nom
                        </label>
                        <input
                            id="last_name"
                            type="text"
                            name="last_name"
                            value="{{ old('last_name', $student->last_name) }}"
                            required
                            class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/20"
                        >
                    </div>

                    <div>
                        <label for="first_name" class="mb-2 block text-sm font-medium text-gray-300">
                            Prénom
                        </label>
                        <input
                            id="first_name"
                            type="text"
                            name="first_name"
                            value="{{ old('first_name', $student->first_name) }}"
                            required
                            class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/20"
                        >
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-300">
                            Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $student->email) }}"
                            required
                            class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/20"
                        >
                    </div>

                    <div>
                        <label for="phone" class="mb-2 block text-sm font-medium text-gray-300">
                            Téléphone
                        </label>
                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone', $student->phone) }}"
                            class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white placeholder-gray-500 focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/20"
                        >
                    </div>

                    <div>
                        <label for="birth_date" class="mb-2 block text-sm font-medium text-gray-300">
                            Date de naissance
                        </label>
                        <input
                            id="birth_date"
                            type="date"
                            name="birth_date"
                            value="{{ old('birth_date', $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->format('Y-m-d') : '') }}"
                            class="w-full rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-white focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/20"
                        >
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <button
                        type="submit"
                        class="flex-1 rounded-xl bg-purple-600 px-6 py-3 font-semibold text-white transition hover:bg-purple-700"
                    >
                        Enregistrer les modifications
                    </button>

                    <a
                        href="{{ url('/students') }}"
                        class="flex-1 rounded-xl border border-white/10 bg-white/5 px-6 py-3 text-center font-semibold text-gray-300 transition hover:bg-white/10"
                    >
                        Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>