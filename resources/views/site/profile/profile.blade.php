@extends('site.layouts.app')

@section('title', 'Meu Perfil')


@section('content')
<div class="form-group">
    <h1>
    @if (auth()->user()->image !=null)
        <img src="{{ url('storage/users/'.auth()->user()->image)}}" alt="{{auth()->user()->name}}" style="max-width: 50px">
    @endif
    Meu Perfil</h1>
</div>

    @include('admin.includes.alerts')

<form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name"></label>
    <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="Nome" class="form-control">
    </div>
    <div class="form-group">
        <label for="email"></label>
        <input type="email" name="email" value="{{auth()->user()->email}}" placeholder="E-mail" class="form-control">
    </div>
    <div class="form-group">
        <label for="password"></label>
        <input type="password" name="password" placeholder="Senha" class="form-control">
    </div>
    <div class="form-group">
        <label for="image"></label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Atualizar Perfil</button>
    </div>    
</form>

@endsection