@extends('admin.layouts.app')

@section('title', 'Visualizando post')

@section('content')
<h1>Detalhes do Post {{ $post->title }}</h1>

<ul>
    <li><b>Título:</b> {{ $post->title }}</li>
    <li><b>Conteúdo:</b> {{ $post->content }}</li>
</ul>

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar o Post</button>
</form>
@endsection