@extends('adminlte::page')

@section('title','Perfil')

@section('content_header')
<h1>Perfil</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Perfil</li>
</ol>
@stop

@section('content')
@include('admin.includes.alerts')
<div class="container">
    <form class="form-horizontal" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <fieldset>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Nome   
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-user-circle"></i></span>
                        <input type="text" value="{{ auth()->user()->name }}" name="name" placeholder="Nome" class="form-control" >
                    </div>
                </div>
            </div>
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Email
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                        <input type="text" value="{{ auth()->user()->email }}" name="email" placeholder="E-mail"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Senha
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-key"></i></span>
                        <input type="password"  name="password" placeholder="*******" class="form-control">
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cadastrar"></label>
            <div class="col-md-8">
                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Atualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
