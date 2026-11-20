<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier étudiant</title>

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
            max-width: 650px;
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

        label {
            display: block;
            margin: 15px 0 8px;
            color: #681f32;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #681f32;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        button, .back {
            flex: 1;
            padding: 13px;
            border: none;
            border-radius: 9px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        button {
            background: #681f32;
            color: white;
        }

        .back {
            background: #f3e8ea;
            color: #681f32;
        }

        .errors {
            background: #fce8e8;
            color: #a00000;
            padding: 12px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Modifier étudiant</h1>

    <div class="card">

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/students/'.$student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nom</label>
            <input type="text" name="last_name"
                value="{{ old('last_name', $student->last_name) }}" required>

            <label>Prénom</label>
            <input type="text" name="first_name"
                value="{{ old('first_name', $student->first_name) }}" required>

            <label>Email</label>
            <input type="email" name="email"
                value="{{ old('email', $student->email) }}" required>

            <label>Téléphone</label>
            <input type="text" name="phone"
                value="{{ old('phone', $student->phone) }}">

            <label>Date de naissance</label>
            <input type="date" name="birth_date"
                value="{{ old('birth_date', $student->birth_date) }}">

            <div class="buttons">
                <button type="submit">Enregistrer les modifications</button>

                <a href="{{ url('/students') }}" class="back">Retour</a>
            </div>
        </form>

    </div>
</div>

</body>
</html>