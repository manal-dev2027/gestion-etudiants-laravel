<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails étudiant</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: #f8f4f2;
            color: #333;
        }

        .container {
            max-width: 750px;
            margin: auto;
        }

        h1 {
            color: #681f32;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 5px 20px #00000012;
        }

        .profile {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar {
            width: 85px;
            height: 85px;
            margin: auto;
            border-radius: 50%;
            background: #681f32;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: bold;
        }

        .profile h2 {
            color: #681f32;
            margin-bottom: 5px;
        }

        .info {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .info strong {
            color: #681f32;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .buttons a {
            flex: 1;
            text-align: center;
            padding: 13px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
        }

        .back {
            background: #681f32;
            color: white;
        }

        .edit {
            background: #f3e8ea;
            color: #681f32;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Fiche étudiant</h1>

    <div class="card">

        <div class="profile">
            <div class="avatar">
                {{ strtoupper(substr($student->first_name, 0, 1)) }}
            </div>

            <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>
            <p>Étudiant N° {{ $student->id }}</p>
        </div>

        <div class="info">
            <strong>Nom :</strong> {{ $student->last_name }}
        </div>

        <div class="info">
            <strong>Prénom :</strong> {{ $student->first_name }}
        </div>

        <div class="info">
            <strong>Email :</strong> {{ $student->email }}
        </div>

        <div class="info">
            <strong>Téléphone :</strong> {{ $student->phone ?? 'Non renseigné' }}
        </div>

        <div class="info">
            <strong>Date de naissance :</strong>
            {{ $student->birth_date ?? 'Non renseignée' }}
        </div>
        <div class="buttons">
          <a href="{{ route('students.edit', $student->id) }}" class="edit">
            Modifier
          </a>

         <a href="{{ url('/students') }}" class="back">
           Retour
         </a>
</div>

    </div>
</div>
</body>
</html>