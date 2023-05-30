@can ('user')
    <!--Enviar para a home-->
@elsecan('admin')
    @extends('layouts.app')
    @section('content')
    @section('title','Usuários')
    
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center">
                
            @if($search)
              {{ __('Buscando Usuário: ' . $search)}}
              @else
              {{ __('Lista de Usuários') }}
              @endif
            </h2>
        </div>
    </header>
    
    <ul class="menu">
      <li><a href="#tab1">Criar Usuário</a></li>
      <li><a href="#tab2">Lista de Usuários</a></li>
    </ul>
    
    <article>
      <section id="tab1" class="abas"> 
        <div id="news-create-container" class="col-md-6 offset-md-3">
          <form action="/users/edit" method="POST">
              @csrf   
          <div class="form-group">
              <label for="title">Nome:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Usuário"/>
          </div>
          <div class="form-group">
              <label for="title">E-mail:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email de Usuário" />
          </div>
          <div class="form-group">
              <label for="title">Senha:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Senha" />
          </div>
          <input type="submit" class="btn btn-primary" value="Cadastrar Usuário">
          </form>
      </div>
    </section>
    <section id="tab2" class="abas" class="active">
      <div class="tile">
        <div class="table-responsive">
          <table class="table table-striped">
            <div id="search-container" class="col-md-12">
                <h1>Busque pelo Usuário:</h1>
                <form action="/users/edit/" method="GET">
                  <input type="text" name="search" id="search" class="form-control" placeholder="Procurar por Usuário"/>
                </form>
            </div>  
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @if($user->id>1)
                  <a href="/users/alter/{{$user->id}}" class="btn btn-info edit-btn">Alterar</a>
                  <form action="/users/{{$user->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger delete-btn" onclick=" return confirm('Deseja mesmo apagar o usuário selecionado?')">Deletar</button>
                    </form>
                    @endif
                    @endforeach
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
        @if($search)

        @else
          {!! $users->links() !!}
        @endif
      </div>
    </section>

    @endsection
@endcan