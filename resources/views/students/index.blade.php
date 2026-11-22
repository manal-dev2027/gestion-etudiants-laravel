```blade
<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-purple-400">
                Student Management System
            </p>
            <h2 class="mt-2 text-2xl font-bold text-white">
                Gestion des étudiants
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl space-y-8">

        {{-- Page heading --}}
        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-3xl font-extrabold text-white">
                    Liste des étudiants
                </h1>
                <p class="mt-2 text-sm text-gray-400">
                    Consultez et gérez les informations des étudiants.
                </p>
            </div>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('students.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-purple-600 px-5 py-3 font-semibold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500">
                    <span class="text-xl">＋</span>
                    Ajouter un étudiant
                </a>
            @endif
        </div>

        {{-- Success message --}}
        @if(session('success'))
            <div class="rounded-xl border border-green-500/20 bg-green-500/10 px-5 py-4 text-sm font-medium text-green-400">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search and table --}}
        <div class="overflow-hidden rounded-2xl border border-white/10 bg-[#151522] shadow-xl">

            <div class="flex flex-col gap-4 border-b border-white/10 p-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white">Tous les étudiants</h3>
                    <p class="mt-1 text-sm text-gray-400">
                        Retrouvez rapidement un étudiant.
                    </p>
                </div>

                <form action="{{ url('/students') }}" method="GET"
                      class="flex w-full gap-2 sm:max-w-md">
                    <input
                        type="text"
                        name="search"
                        placeholder="Nom, prénom ou email..."
                        value="{{ $search ?? '' }}"
                        class="min-w-0 flex-1 rounded-xl border border-white/10 bg-[#0b0b12] px-4 py-3 text-sm text-white placeholder-gray-500 outline-none transition focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20"
                    >

                    <button type="submit"
                            class="rounded-xl bg-purple-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-purple-500">
                        Rechercher
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left">
                    <thead class="bg-white/[0.03]">
                        <tr class="text-xs uppercase tracking-wider text-gray-400">
                            <th class="px-6 py-4 font-semibold">ID</th>
                            <th class="px-6 py-4 font-semibold">Nom</th>
                            <th class="px-6 py-4 font-semibold">Prénom</th>
                            <th class="px-6 py-4 font-semibold">Email</th>
                            <th class="px-6 py-4 font-semibold">Téléphone</th>
                            <th class="px-6 py-4 font-semibold">Date de naissance</th>
                            <th class="px-6 py-4 font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/5">
                        @forelse ($students as $student)
                            <tr class="transition hover:bg-white/[0.03]">
                                <td class="px-6 py-5 text-sm text-purple-400">
                                    #{{ $student->id }}
                                </td>

                                <td class="px-6 py-5 text-sm font-semibold text-white">
                                    {{ $student->last_name }}
                                </td>

                                <td class="px-6 py-5 text-sm text-gray-300">
                                    {{ $student->first_name }}
                                </td>

                                <td class="px-6 py-5 text-sm text-gray-400">
                                    {{ $student->email }}
                                </td>

                                <td class="px-6 py-5 text-sm text-gray-400">
                                    {{ $student->phone ?: '—' }}
                                </td>

                                <td class="px-6 py-5 text-sm text-gray-400">
                                    {{ $student->birth_date ?: '—' }}
                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('students.show', $student->id) }}"
                                           class="rounded-lg border border-purple-500/20 bg-purple-500/10 px-3 py-2 text-xs font-semibold text-purple-300 transition hover:bg-purple-500/20">
                                            Voir
                                        </a>

                                        @if(auth()->user()->role === 'admin')
                                            <a href="{{ route('students.edit', $student->id) }}"
                                               class="rounded-lg border border-blue-500/20 bg-blue-500/10 px-3 py-2 text-xs font-semibold text-blue-300 transition hover:bg-blue-500/20">
                                                Modifier
                                            </a>

                                            <form action="{{ route('students.destroy', $student->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-lg border border-red-500/20 bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-400 transition hover:bg-red-500/20">
                                                    Supprimer
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-16 text-center">
                                    <p class="text-lg font-semibold text-gray-300">
                                        Aucun étudiant trouvé
                                    </p>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Essayez une autre recherche.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($students, 'links'))
                <div class="border-t border-white/10 px-6 py-4">
                    {{ $students->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
```