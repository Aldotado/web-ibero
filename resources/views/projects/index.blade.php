@extends('layouts.app')

@section('content')

<div class="container-fluid mb-4">
	<div class="row align-items-center">
		<div class="col-md-8">
			<div class="title-page px-4 py-5">
				<p class="lead">Esta es una gran aplicación de tareas, utilizala todos los días.</p>
			</div>
		</div>
		<div class="col-md-4">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProyecto">
  				Crear Nuevo Proyecto
			</button>
		</div>
	</div>
</div>
		
<div class="modal fade" id="modalProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="{{ route('proyectos.store') }}">
	      <div class="modal-body">
	        
	      	<!-- Nuestro campo de protección de formulario -->
			{{ csrf_field() }}

			<!-- Campos de formulario -->
			<div class="form-group mb-3">
				<label>Nombre del proyecto</label><br>
				<input class="form-control" type="text" name="name" placeholder="Nombre de Proyecto">
			</div>
			<div class="form-group mb-3">
				<label>Descripción</label>
				<textarea class="form-control" name="description"></textarea>
			</div>

			<div class="form-group mb-3">
				<label>Fecha de entrega</label>
				<input class="form-control" type="date" name="final_date">
			</div>

			<div class="form-group mb-3">
				<label>Color de tarea</label>
				<input class="form-control" type="color" name="hex">
			</div>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
	      </div>
  	</form>
    </div>
  </div>
</div>
	
<div class="container">
    <div class="row">
        <div class="col col-md-12">

            <div class="card">
                <h5 class=card-header>Listado de Proyectos</h5>
                <div class="card-body">
                    <h5 class="card-title">Proyectos Pendientes</h5>
                    <p class="card-text">Este es tu listado de proyectos, ponte a trabajar.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach($proyectos as $proyecto)
    <div class="col-md-4 mt-4">
        <div class="card">
            <div class="line-color" style="height: 5px; width: 100%; background-color: {{$proyecto->hex}}">

            </div>
            <div class="card-body">
                <h4>{{ $proyecto->name }}</h4>
                <p>{{ $proyecto->description }}</p>

            </div>
            <div class="tareas">
                <ul>
                    <li>Tarea 1</li>
                    <li>Tarea 2</li>
                    <li>Tarea 3</li>
                </ul>

            </div>

        </div>
    </div>
</div>
        @endforeach
    </div>
</div>
@endsection