<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    <div class="logoContainer">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logoLogin">
    </div>

    <div class="container" id="loginContainer">
        <h2>Login Interface Administration</h2>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <input type="checkbox" onclick="togglePasswordVisibility('password')"> Afficher le mot de passe
            </div>
            <div class="buttonContainer">
                <button id="submitLogin" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <div class="mt-3">
            <a href="{{ route('admin.password.request') }}">Mot de passe oublié ?</a>
        </div>
    </div>
</body>
</html>

