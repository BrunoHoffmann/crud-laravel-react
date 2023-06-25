<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    {{-- <link rel="stylesheet" href="{{url(mix('backend/assets/css/reset.css'))}}"/>
    <link rel="stylesheet" href="{{url(mix('backend/assets/css/boot.css'))}}"/>
    <link rel="stylesheet" href="{{url(mix('backend/assets/css/login.css'))}}"/> --}}
    <link rel="icon" type="image/png" href="backend/assets/images/favicon.png"/>


    <title>Criar usuario</title>

    <meta name="csrf-token" content="{{csrf_token() }}">
</head>
<body>

<div></div>

<div>
    <div>
        <article>
            <header>
                <h1>Register</h1>
            </header>

            <form name="login" action="{{route('register.do')}}" method="post" autocomplete="off">
                @csrf
                <label>
                    <span>Name:</span>
                    <input type="text" name="name" placeholder="John john" required/>
                </label>
                <label>
                    <span>E-mail:</span>
                    <input type="email" name="email" placeholder="admin@admin.com" required/>
                </label>

                <label>
                    <span>Senha:</span>
                    <input type="password" name="password" placeholder="**************" required/>
                </label>

                <label>
                    <span>Confirmação de senha:</span>
                    <input type="password" name="password_confirmation" placeholder="**************" required/>
                </label>

                <button>Create</button>
            </form>

            <a href="{{ route('login') }}">login</a>
        </article>
    </div>
</div>
</body>
</html>
