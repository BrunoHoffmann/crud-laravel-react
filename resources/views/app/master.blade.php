<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

    @hasSection('css')
        @yield('css')
    @endif

    <title>CRUD - teste</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"></div>

<div>
    <section>

        <div>
            <a href="{{route('admin.logout')}}">Sair</a>
        </div>

        <div>
            @yield('content')
        </div>
    </section>
</div>

<script src="{{ url(mix('backend/assets/js/jquery.js'))}}"></script>

@hasSection('js')
    @yield('js')
@endif

</body>
</html>
