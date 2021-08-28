@extends('admin.layouts.app')

@section('name', 'Criar novo post')

@section('content')
<h2>Criar novo post</h2>

<form action="{{ route('posts.store') }}" method="post">            

    @include('admin.posts.partials.form')
</form>
@endsection