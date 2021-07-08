

@extends('layout.site')

@section('titulo', 'Cadastrar')

@section('conteudo')

  <div class="container">
    <h3 class="center">Cadastre-se</h3>
    <div class="row">
      
      <form action="{{ route('site.cadastro.cadastrar') }}" method="post">
        {{ csrf_field() }}

        <div class="input-field">
          <input type="text" name="nome">
          <label>Nome</label>
        </div>

        <div class="input-field">
          <input type="text" name="email">
          <label>E-mail</label>
        </div>

        <div class="input-field">
          <input type="password" name="senha">
          <label>Senha</label>
        </div>

        <div class="input-field">
          <input type="password" name="confirmarSenha">
          <label>Confirmar senha</label>
        </div>

        <div class="row center">
          <button class="btn deep-orange">Cadastrar</button>
        </div>
      </form>

      <div class="row center">
        <p>Já tem uma conta? <a style="color: #ff5722" href="{{route('site.login')}}">Clique aqui para entrar</a></p>
      </div>

    </div>

  </div>
  

@endsection