
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f4f2;
            color: #332b2b;
        }

        header {
            background: #681f32;
            color: white;
            padding: 25px 40px;
        }

        header h1 {
            margin: 0;
            font-size: 27px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .top h2 {
            color: #681f32;
        }

        .add {
            background: #a83250;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 8px;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 18px #0000000d;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            background: #681f32;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #eee5e5;
        }

        tr:hover td {
            background: #fff7f7;
        }

        .delete {
            background: #a83250;
            color: white;
            border: none;
            padding: 9px 12px;
            border-radius: 6px;
            cursor: pointer;
        }

        .success {
            background: #e4f4e8;
            color: #216b37;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        @media (max-width: 600px) {
            .top {
                align-items: flex-start;
                flex-direction: column;
            }

            header {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<header>
    <h1>Gestion des étudiants</h1>
</header>

<div class="container">

    <div class="top">
    <h2>Liste des étudiants</h2>

    <a class="add" href="{{ route('students.create') }}">
        + Ajouter un étudiant
    </a>
</div>

<form action="{{ url('/students') }}" method="GET"
      style="display:flex; gap:10px; margin:20px 0;">

    <input
        type="text"
        name="search"
        placeholder="Rechercher par nom, prénom ou email..."
        value="{{ $search ?? '' }}"
        style="flex:1; padding:12px; border:1px solid #ddd; border-radius:8px;"
    >

    <button type="submit"
        style="background:#681f32; color:white; border:0; padding:12px 20px; border-radius:8px; cursor:pointer;">
        Rechercher
    </button>
</form>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-box">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date de naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->birth_date }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="details">
                               Voir détails
                           </a>
                            <form action="{{ route('students.destroy', $student->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">
                                @csrf
                                @method('DELETE')
                                <button class="delete" type="submit">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Aucun étudiant pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
