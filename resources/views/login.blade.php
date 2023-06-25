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
        @csrf
        <label>
            <span>E-mail:</span>
            <input type="email" name="email" placeholder="email@email.com" required/>
        </label>

        <label>
            <span>Senha:</span>
            <input type="password" name="password" placeholder="*********"/>
        </label>

        <button>Login</button>
    </form>
    <a href="{{ route('register') }}">register</a>
</div>
<script src="{{ url(mix('backend/assets/js/jquery.js'))}}"></script>
<script src="{{ url(mix('backend/assets/js/login.js'))}}"></script>
</body>
</html>
