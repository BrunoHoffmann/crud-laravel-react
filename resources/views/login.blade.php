<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Sistema CRUD</title>

    <meta name="csrf-token" content="{{csrf_token() }}">
</head>
<body>

<div class="ajax_response"></div>
    <header>
        <h1>Login</h1>
    </header>

    <form name="login" action="{{route('login.do')}}" method="post" autocomplete="off">
        <label>
            <span>E-mail:</span>
            <input type="email" name="email" placeholder="Informe seu e-mail" required/>
        </label>

        <label>
            <span>Senha:</span>
            <input type="password" name="password_check" placeholder="Informe sua senha"/>
        </label>

        <button>Login</button>
    </form>
</div>

{{-- <script src="{{ url(mix('backend/assets/js/jquery.js'))}}"></script>
<script src="{{ url(mix('backend/assets/js/login.js'))}}"></script> --}}

</body>
</html>
