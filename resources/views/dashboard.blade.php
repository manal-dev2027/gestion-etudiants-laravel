
<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm text-purple-400 font-medium tracking-wider uppercase">
                Student Management System
            </p>
            <h2 class="mt-2 text-2xl font-bold text-white">
                Tableau de bord
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-10">
                <h1 class="text-3xl font-bold text-white">
                    Bienvenue, {{ Auth::user()->name }} 👋
                </h1>
                <p class="mt-2 text-gray-400">
                    Gérez et consultez les informations des étudiants.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @if(auth()->user()->role === 'admin')
                    <a href="{{ url('/students/create') }}"
                       class="group bg-[#151522] border border-white/10 rounded-2xl p-8
                              hover:border-purple-500/50 hover:bg-[#1b1b2b]
                              transition duration-300">

                        <div class="w-14 h-14 rounded-xl bg-purple-600/20
                                    flex items-center justify-center mb-6">
                            <span class="text-3xl">＋</span>
                        </div>

                        <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition">
                            Ajouter un étudiant
                        </h3>

                        <p class="mt-3 text-gray-400 leading-relaxed">
                            Ajouter un nouvel étudiant à la base de données.
                        </p>

                        <p class="mt-6 text-purple-400 font-semibold text-sm">
                            Ajouter maintenant →
                        </p>
                    </a>
                @endif

                <a href="{{ url('/students') }}"
                   class="group bg-[#151522] border border-white/10 rounded-2xl p-8
                          hover:border-purple-500/50 hover:bg-[#1b1b2b]
                          transition duration-300">

                    <div class="w-14 h-14 rounded-xl bg-purple-600/20
                                flex items-center justify-center mb-6">
                        <span class="text-3xl">☷</span>
                    </div>

                    <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition">
                        Liste des étudiants
                    </h3>

                    <p class="mt-3 text-gray-400 leading-relaxed">
                        Consulter, rechercher et visualiser les informations des étudiants.
                    </p>

                    <p class="mt-6 text-purple-400 font-semibold text-sm">
                        Consulter la liste →
                    </p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
