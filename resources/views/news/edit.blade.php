@extends('layouts.app')
@section('content')
@section('title','Editar Notícia')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center">
                {{ __('Edite as Notícias') }}
            </h2>
        </div>
    </header>
    <ul class="menu">
	<li><a href="#tab1">Criar Notícia</a></li>
	<li><a href="#tab2">Lista de Notícias</a></li>
</ul>

<article>
	<section class="abas" id="tab1">            
            <div id="news-create-container" class="col-md-6 offset-md-3">
                <form action="/news" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="image">Imagem da Notícia:</label>
                    <input type="file" class="form-control-file" id="image" name="image" required/>
                </div>
                <div class="form-group">
                    <label for="title">Notícia:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título da Notícia"/>
                </div>
                <div class="form-group">
                    <label for="title">Descrição:</label>
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Descrição da Notícia"></textarea>
                </div>
                <div class="form-group">
                    <label for="title">Autor:</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Autor"/>
                </div>
                <div class="form-group">
                    <label for="title">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Cidade"/>
                </div>
                <div class="form-group">
                    <label for="title">Data:</label>
                    <input type="date" class="form-control" id="date_published" name="date_published" placeholder="Data"/>
                </div>
                <input type="submit" class="btn btn-primary" value="Criar Notícia">
                </form>
            </div>

	</section>
<!--<==---------------------------------------------------------------------------------------==>-->
	<section class="abas" id="tab2" class="active">
    <div class="tile">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Título</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach($news as $new)
            <tr>
              <td>{{$new->id}}</td>
              <td>{{$new->title}}</td>
              <td>
                <div style="display:inline-flex;">
                <a href="/news/alter/{{$new->id}}" class="btn btn-info edit-btn">Alterar</a> 
                <form action="/news/{{$new->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn" onclick=" return confirm('Deseja mesmo apagar o usuário selecionado?')">Deletar</button>
                </form>
                </div>
            </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      {!! $news->links() !!}
    </div>

	</section>
</article>

@endsection
