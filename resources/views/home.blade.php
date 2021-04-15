@extends('layouts.master')

@section('content')
<section class="home-section">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <a  href="{{ route('proyectos.index') }}" class="sin-estilo-home col-md-5 w-25">
                <div class="home-button-p justify-content-center px-5 py-5">
                    <div class="row home-button-item justify-content-center">
                        <h1>Proyectos</h1>
                    </div>
                    <div class="justify-content-center row">
                        <img src="{{ asset('img/proyectoimg.png') }}" class="home-img" alt="Example image" loading="lazy">
                    </div>
                </div>
            </a>
            <a  href="{{ route('tareas.index') }}" class="sin-estilo-home col-md-5 w-25">
                <div class="home-button-t justify-content-center px-5 py-5">
                    <div class="row home-button-item justify-content-center">
                        <h1>Tareas</h1>
                    </div>
                    <br>
                    <div class="justify-content-center row">
                        <img src="{{ asset('img/tareaimg.png') }}" class="home-img" alt="Example image" loading="lazy">
                    </div>
                </div>
            </a>
        </div>
        <div class="row justify-content-center pt-4">
            <div class="justify-content-center sin-estilo-home ancho-user dropdown">
                <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="sin-estilo-home">
                    <div class="home-button-u px-5 py-5 row">
                        <div class="col-4 user-title">
                            <p>Perfil {{ Auth::user()->name }}</p>
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('img/user.jpg') }}" class="home-img-u" alt="Example image" loading="lazy">
                        </div>
                    </div>
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body cerrar-sesion">
                        <a class="cerrar-sesion" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
