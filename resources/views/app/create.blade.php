@extends('master')


@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Novo Usuário</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Books</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">new book</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="nav">

            @if($errors->all() or $error ?? '')
                @foreach($errors->all() as $error)
                    <div class="message message-orange">
                        <p class="icon-asterisk">{{$error}}</p>
                    </div>
                @endforeach
                <div class="message message-orange">
                    <p class="icon-asterisk">{{$error}}</p>
                </div>
            @endif

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                </li>
            </ul>

            <form class="app_form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="nav_tabs_content">
                    <div id="data">

                        <label class="label">
                            <span class="legend">*Nome:</span>
                            <input type="text" name="name" placeholder="Nome Completo" value=""/>
                        </label>

                        <label class="label">
                            <span class="legend">*E-mail:</span>
                            <input type="email" name="email" placeholder="Digite seu e-mail" value=""/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Senha:</span>
                                <input type="password" name="password" placeholder="Digite sua senha" value=""/>
                            </label>
                            <label class="label">
                                <span class="legend">*Confirma Senha:</span>
                                <input type="password" name="password_confirmation" placeholder="Confirme sua senha" value=""/>
                            </label>
                        </div>

                    <div class="text-right mt-2">
                        <a href="{{route('users.index')}}" class="btn btn-large btn-red">Cancelar
                        </a>
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar usuário
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
