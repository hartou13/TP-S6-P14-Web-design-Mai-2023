<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/login" method="post">
        @csrf
        <table style="text-align: center">
            <tr>
                <td>Login</td>
                <td>
                    <input type="email" name="email" id="">
                </td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td>
                    <input type="password" name="mdp" id="">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Connexion">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
