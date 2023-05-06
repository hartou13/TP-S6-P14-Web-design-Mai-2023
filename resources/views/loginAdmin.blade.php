<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href={{ secure_url('style/bootstrap/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{secure_url('style/fonts/fontawesome-all.min.css')}}>
    <link rel="stylesheet" href={{secure_url('style/css/styles.min.css')}}>
</head>

<body style="background-image: url('{{ secure_url('style/images/wp.jpg') }}')">
    <section class="login-dark">
        <form action="/login" method="post">
            @csrf
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration"><i class="fas fa-brain"></i></div>
            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" value="adm1@gmail.com"></div>
            <div class="mb-3"><input class="form-control" type="password" name="mdp" placeholder="Password" value="adm1"></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Log In</button></div>
        </form>
    </section>
    <script src= {{secure_url('style/bootstrap/js/bootstrap.min.js')}}></script>
</body>

</html>
