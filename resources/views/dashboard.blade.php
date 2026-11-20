<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des étudiants
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                @if(auth()->user()->role === 'admin')
                <a href="{{ url('/students/create') }}"                       
                       class="bg-white p-10 rounded-xl shadow text-center hover:shadow-lg transition">
                        <h3 class="text-xl font-bold text-gray-800">
                            Ajouter un étudiant
                        </h3>
                        <p class="mt-3 text-gray-600">
                            Ajouter un nouvel étudiant
                        </p>
                    </a>
                @endif

                <a href="{{ url('/students') }}"
                   class="bg-white p-10 rounded-xl shadow text-center hover:shadow-lg transition">
                    <h3 class="text-xl font-bold text-gray-800">
                        Liste des étudiants
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Consulter et rechercher les étudiants
                    </p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
