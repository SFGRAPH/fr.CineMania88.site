<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet"> 
    <script>
        function togglePasswordVisibility(id) {
            var input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Réinitialiser le mot de passe</h2>
        <form action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $email ?? old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Nouveau mot de passe:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <input type="checkbox" onclick="togglePasswordVisibility('password')"> Afficher le mot de passe
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                <input type="checkbox" onclick="togglePasswordVisibility('password_confirmation')"> Afficher le mot de passe
            </div>
            <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>
</html>
