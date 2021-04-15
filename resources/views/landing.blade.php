@extends('layouts.master')

@section('content')
<section class="section-home">
<div class="px-4 pt-5 text-center border-bottom">
  <div class=" landing-main-div mx-5 py-1">
    <h1 class="display-4 fw-bold">¡La Besto App para hacer y organizar tus tareas!</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Aquí podrás hacer uso de una base de datos que te permita administrar tus proyectos y tareas al instante. Evita esas agendas desorganizadas y retrasos en tus trabajos!</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-sm-3">Regístrate Ahora</a>
      </div>
    </div>
  </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src="{{ asset('img/muestra.png') }}" class="img-fluid border redondeada mt-5 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
      </div>
    </div>
</div>
</section>

<div class="container">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal">Planes</h1>
  </div>

  <main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Gratuito</h4>
          </div>
          <div class="card-body">
            <p>Eso pensé. Los jedi no cuentan esa historia, es una leyenda sith. Darth Plagueis era un señor oscuro de los sith tan poderoso y tan sabio </p>
            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light"> al mes</small></h1>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Pro</h4>
          </div>
          <div class="card-body">
            <p>Eso pensé. Los jedi no cuentan esa historia, es una leyenda sith. Darth Plagueis era un señor oscuro de los sith tan poderoso y tan sabio </p>
            <h1 class="card-title pricing-card-title">$100<small class="text-muted fw-light"> al mes</small></h1>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal">Enterprise</h4>
          </div>
          <div class="card-body">
            <p>Eso pensé. Los jedi no cuentan esa historia, es una leyenda sith. Darth Plagueis era un señor oscuro de los sith tan poderoso y tan sabio </p>
            <h1 class="card-title pricing-card-title">$300<small class="text-muted fw-light"> al mes</small></h1>
          </div>
        </div>
      </div>
    </div>

    <h2 class="display-6 text-center mb-4">Comparación de servicios</h2>

    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <th style="width: 34%;"></th>
            <th style="width: 22%;">Gratuita</th>
            <th style="width: 22%;">Premium</th>
            <th style="width: 22%;">Grupal</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th scope="row" class="text-start">Almacenamiento</th>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Configuración</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Recursos externos</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Personalización</th>
            <td></td>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Comunicación</th>
            <td></td>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
@endsection