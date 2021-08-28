@extends('admin.layouts.app')

@section('title', 'Editar um post')

@section('content')
<h2>Editar o post <b>{{ $post->title }}</b></h2>

<form action="{{ route('posts.update', $post->id) }}" method="post">            
    
    @method("PUT")

    @include('admin.posts.partials.form')
</form>
@endsection