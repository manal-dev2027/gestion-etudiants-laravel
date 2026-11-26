<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-purple-400">
                Student Management System
            </p>
            <h2 class="mt-2 text-2xl font-bold text-white">
                Mon profil
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-5xl space-y-8">

        {{-- Heading --}}
        <div>
            <h1 class="text-3xl font-extrabold text-white">
                Paramètres du compte
            </h1>
            <p class="mt-2 text-sm text-gray-400">
                Gérez vos informations personnelles et la sécurité de votre compte.
            </p>
        </div>

        {{-- Profile information --}}
        <section class="overflow-hidden rounded-2xl border border-white/10 bg-[#151522] shadow-xl">
            <div class="border-b border-white/10 px-7 py-6">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-600/20 text-2xl text-purple-400">
                        ♙
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">
                            Informations personnelles
                        </h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Modifiez votre nom et votre adresse email.
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-7">
                @include('profile.partials.update-profile-information-form')
            </div>
        </section>

        {{-- Password --}}
        <section class="overflow-hidden rounded-2xl border border-white/10 bg-[#151522] shadow-xl">
            <div class="border-b border-white/10 px-7 py-6">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600/20 text-2xl text-blue-400">
                        ◈
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">
                            Sécurité du compte
                        </h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Changez votre mot de passe pour protéger votre compte.
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-7">
                @include('profile.partials.update-password-form')
            </div>
        </section>

        {{-- Delete account --}}
        <section class="overflow-hidden rounded-2xl border border-red-500/20 bg-[#151522] shadow-xl">
            <div class="border-b border-red-500/10 px-7 py-6">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-500/10 text-2xl text-red-400">
                        !
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-red-400">
                            Supprimer le compte
                        </h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Cette action est définitive.
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-7">
                @include('profile.partials.delete-user-form')
            </div>
        </section>

    </div>
</x-app-layout>
