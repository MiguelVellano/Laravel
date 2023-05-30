@extends('layouts.app')
@section('content')
@section('title','Editar '. $news->title)
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center">
            {{ __('Alterar Notícia - ' . $news->title ) }}
        </h2>
    </div>
</header>

    <div id="news-create-container" class="col-md-6 offset-md-3">
        <form action="/news/update/{{$news->id}}" method="POST" enctype="multipart/form-data">
            @csrf   
            @method('PUT')
        <div class="form-group">
            <label for="image">Imagem da Notícia:</label>
            <img src="/images/news/{{$news->image}}" alt="{{$news->title}}" class="image-preview">
            <input type="file" class="form-control-file" id="image" name="image"/>
        </div>
        <div class="form-group">
            <label for="title">Notícia:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título da Notícia" value="{{$news->title}}"/>
        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Descrição da Notícia">{{$news->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Autor:</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Autor" value="{{$news->author}}"/>
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="{{$news->city}}"/>
        </div>
        <div class="form-group">
            <label for="title">Data:</label>
            <input type="date" class="form-control" id="date_published" name="date_published" placeholder="Data" value="{{$news->date_published}}"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Notícia">
        </form>
    </div>

@endsection
