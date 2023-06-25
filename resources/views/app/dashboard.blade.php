@extends('master')

@section('content')
<div>
    <section>
        <header>
            <h2>Dashboard</h2>
        </header>

        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->value}}</td>
                <td>
                    <a href="{{Route('book.edit', $book->id)}}">Editar</a>
                    <a href="{{Route('book.destroy', $book->id)}}">Deletar</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection
