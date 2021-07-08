@extends('layout.site')

@section('titulo', 'Entrar')

@section('conteudo')

  <div class="container">
    <h3 class="center">Entrar</h3>
    <div class="row">
      
      <form action="{{ route('site.login.entrar') }}" method="post">
        {{ csrf_field() }}

        <div class="input-field">
          <input type="text" name="email">
          <label>E-mail</label>
        </div>

        <div class="input-field">
          <input type="password" name="senha">
          <label>Senha</label>
        </div>

        <div class="row center">
          <button class="btn deep-orange">Entrar</button>
        </div>
      </form>

      <div class="row center">
        <a href="{{route('site.cadastro')}}"><button class="btn blue">Cadastre-se</button></a>
      </div>

    </div>

  </div>
  

@endsection