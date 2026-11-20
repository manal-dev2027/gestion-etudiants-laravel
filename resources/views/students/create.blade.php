
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>

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
            font-size: 26px;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 18px #0000000d;
        }

        h2 {
            color: #681f32;
            margin-top: 0;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #a83250;
        }

        .add-button {
            background: #a83250;
            color: white;
            border: none;
            padding: 13px 22px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 15px;
        }

        .add-button:hover {
            background: #681f32;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #681f32;
            text-decoration: none;
        }

        .errors {
            background: #ffe5e5;
            color: #a00000;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            .form-box {
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

    <div class="form-box">

        <h2>Ajouter un étudiant</h2>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="last_name"
                       value="{{ old('last_name') }}" required>
            </div>

            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="first_name"
                       value="{{ old('first_name') }}" required>
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email"
                       value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="phone"
                       value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label>Date de naissance :</label>
                <input type="date" name="birth_date"
                       value="{{ old('birth_date') }}">
            </div>

            <button type="submit" class="add-button">
                Ajouter l'étudiant
            </button>

        </form>

        <a href="{{ url('/students') }}" class="back">
            ← Retour à la liste des étudiants
        </a>

    </div>

</div>

</body>
</html>
