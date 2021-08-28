<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function index() {
        $posts = Post::get(); // traz todos os registros 
        return view('admin.posts.index', compact('posts')); // compact('NOME_DA_VARIAVEL') interpola na view a variavel NOME_DA_VARIAVEL
    }

    public function create() {
        return view('admin.posts.create'); // retorna o metodo view para exibir um arquivo .blade.php dentro da pasta "views"
    }

    public function store(StoreUpdatePost $request) {
        Post::create($request->all()); // Salva o registro com base no que veio da request. Só funciona caso os NAME dos form seja o mesmo nome que os campos no banco
        return redirect()->route('posts.index')->with('message', 'Post criado com sucesso!'); // with para passar uma session rapida         
    }

    public function show($id) {
        // Post::where('id', $id)->get(); // Retorna a collection com todos os dados com base no where
        // $post = Post::where('id', $id)->first(); // Retorna apenas o 1 registro dessa clausula where
        // Post::find($id); // Retorna um unico registro com base no parametro
        if(!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id) {
        if(!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post deletado com sucesso!');
    }

    public function edit($id) {
        if(!$post = Post::find($id)) {
            return redirect()->back(); // redirect pra pagina que solicitou esse metodo
        }

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id) {
        if(!$post = Post::find($id)) {
            return redirect()->back(); // redirect pra pagina que solicitou esse metodo
        }

        $post->update($request->all());

        return redirect()->route('posts.index')->with('message', 'Post atualizado com sucesso!');
    }

    public function search(Request $request) {
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->get();
        return view('admin.posts.index', compact('posts'));
    }
    
}
