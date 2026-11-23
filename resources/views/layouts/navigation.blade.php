<div class="flex flex-col h-full min-h-screen px-5 py-8">
    <a href="{{ route('students.index') }}" class="flex items-center gap-3 px-2 mb-12">
        <div class="w-12 h-12 rounded-xl bg-purple-600 flex items-center justify-center shadow-lg shadow-purple-600/30">
            <span class="text-2xl font-extrabold text-white">S</span>
        </div>
        <div>
            <h1 class="text-white font-extrabold text-lg tracking-wider">SMS</h1>
            <p class="text-purple-400 text-xs">Student Management</p>
        </div>
    </a>

    <p class="text-gray-500 text-xs uppercase tracking-widest font-semibold px-3 mb-4">
        Menu principal
    </p>

    <nav class="space-y-2">
        @auth
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-purple-600 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <span class="text-xl">⌂</span>
                <span>Dashboard</span>
            </a>
        @endauth

        <a href="{{ route('students.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('students*') ? 'bg-purple-600 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <span class="text-xl">♧</span>
            <span>Étudiants</span>
        </a>

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('students.create') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition">
                    <span class="text-xl">＋</span>
                    <span>Ajouter un étudiant</span>
                </a>
            @endif
        @endauth
    </nav>

    <div class="mt-auto pt-6 border-t border-white/10">
        @auth
            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-3 px-4 py-3 mb-4 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition">
                <span class="text-xl">♙</span>
                <span>Profil</span>
            </a>

            <div class="flex items-center gap-3 px-2 mb-5">
                <div class="w-10 h-10 shrink-0 rounded-full bg-purple-600 flex items-center justify-center font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-white text-sm font-semibold truncate">{{ Auth::user()->name }}</p>
                    <p class="text-purple-400 text-xs">
                        {{ Auth::user()->role === 'admin' ? 'Administrator' : 'User' }}
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition">
                    <span class="text-xl">⇥</span>
                    <span>Déconnexion</span>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-purple-300 hover:bg-purple-500/10 transition">
                <span class="text-xl">⇥</span>
                <span>Connexion Admin</span>
            </a>
        @endauth
    </div>
</div>
