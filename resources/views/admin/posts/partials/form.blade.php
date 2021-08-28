@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf

<input type="text" name="title" placeholder="Título" id="title" value="{{ $post->title ?? old('title') }}">
<input type="text" name="content" placeholder="Descrição" id="content" value="{{ $post->content ?? old('content') }}">
<button type="submit">Enviar</button>