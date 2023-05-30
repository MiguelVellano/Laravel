@extends('layouts.app')
@section('content')
@section('title','Editar '. $users->name)
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center">
            {{ __('Alterar o Usuário - ' . $users->name ) }}
        </h2>
    </div>
</header>

    <div id="news-create-container" class="col-md-6 offset-md-3">
        <form action="/users/update/{{$users->id}}" method="POST" enctype="multipart/form-data">
            @csrf   
            @method('PUT')
        <div class="form-group">
            <label for="title">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Usuário" value="{{$users->name}}"/>
        </div>
        <div class="form-group">
            <label for="title">E-mail:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email de Usuário" value="{{$users->email}}"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Usuário">
        </form>
    </div>

@endsection
