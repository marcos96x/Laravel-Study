@extends('admin.layouts.app')

@section('title', 'Listagem dos posts')
    

@section('content')
<a href="{{ route('posts.create') }}">Criar Post</a>

<br>
@if (session('message'))
    {{ session('message') }}
@endif
<br>
<form action="{{ route('posts.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="Filtrar">
    <button type="submit">Filtrar</button>
</form>

<hr>
<h1>Posts</h1>

@foreach ($posts as $post)
    <p>
        {{ $post->title }} 
        [ <a href="{{ route('posts.show', $post->id) }}">Ver</a> ]
        [ <a href="{{ route('posts.edit', $post->id) }}">Editar</a> ]
    </p>
@endforeach


@endsection