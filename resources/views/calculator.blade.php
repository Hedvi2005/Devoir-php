<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Calculatrice Laravel</h1>
    <form action="{{ route('calculate') }}" method="POST">
        @csrf
        <div>
            <label for="number1">Nombre 1 :</label>
            <input type="text" id="number1" name="number1" value="{{ old('number1') }}">
            @error('number1')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="number2">Nombre 2 :</label>
            <input type="text" id="number2" name="number2" value="{{ old('number2') }}">
            @error('number2')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="operation">Opération :</label>
            <select id="operation" name="operation">
                <option value="add" {{ old('operation') == 'add' ? 'selected' : '' }}>Addition</option>
                <option value="subtract" {{ old('operation') == 'subtract' ? 'selected' : '' }}>Soustraction</option>
                <option value="multiply" {{ old('operation') == 'multiply' ? 'selected' : '' }}>Multiplication</option>
                <option value="divide" {{ old('operation') == 'divide' ? 'selected' : '' }}>Division</option>
            </select>
            @error('operation')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Calculer</button>
    </form>

    @isset($result)
        <h2>Résultat : {{ $result }}</h2>
    @endisset
</body>
</html>
