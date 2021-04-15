@extends('layouts.master')

@section('content')
<section class="tareas-section">
<div class="container-fluid mb-4">
	<div class="row d-flex justify-content-center px-5 pt-5">
		<div class="col-md-4">
			<button type="button" class="btn btn-primary btn-crear-p" data-bs-toggle="modal" data-bs-target="#modalTarea">
  				<ion-icon name="add-circle-outline"></ion-icon>
  				Crear Nueva Tarea
			</button>
		</div>
	</div>
</div>
		
<div class="modal fade" id="modalTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Tarea</h5>
        <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal" aria-label="Close"><ion-icon name="close-outline"></ion-icon></button>
      </div>

      <form method="POST" action="{{ route('tareas.store') }}">
	      <div class="modal-body">
	        
	      	<!-- Nuestro campo de protección de formulario -->
			{{ csrf_field() }}

			<!-- Campos de formulario -->
			<div class="form-group mb-3">
				<label class="w-100">Nombre de tarea</label><br>
				<input class="form-control" type="text" name="name" placeholder="Nombre de Tarea">
			</div>
			<div class="form-group mb-3">
				<label class="w-100">Descripción</label>
				<textarea class="form-control" name="description"></textarea>
			</div>
			<div class="form-group mb-3">
				<label class="w-100">Modalidad</label>
				<select class="form-control" name="modality">
					<option value="Individual">Individual</option>
					<option value="Por Equipo">Por Equipo</option>
					<option value="Parejas">Parejas</option>
					<option value="Asistencia Externa">Asistencia Externa</option>
				</select>
			</div>

			<!-- Este método usa más recursos (es menos óptima)-->
			{{--
			@php
				$proyectos = \App\Models\Proyect::all();
			@endphp
			--}} 

			<div class="form-group mb-3">
				<label class="w-100">Proyectos</label>
				<select class="form-control" name="project_id">
					@foreach($proyectos as $proyecto)
						<option value="{{ $proyecto->id }}">{{ $proyecto->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group mb-3">
				<label class="w-100">Fecha de entrega</label>
				<input class="form-control" type="date" name="due_date">
			</div>
	      </div>

	      <div class="modal-footer d-flex justify-content-center">
		        <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-light col-4">Guardar</button>
		  </div>
  	</form>
    </div>
  </div>
</div>
	
	

<div class="container">
	<div class="row d-flex justify-content-center mb-4">
	    <div class="col col-md-10">

	        <div class="card proyectos-card">
	            <h5 class=card-header>Listado de Proyectos</h5>
	            <div class="card-body">
	                <p class="card-text">Aqui se muestran los proyectos pendientes ¡A trabajar!</p>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-md-10">
			<div class="card">
				

	<table class="table tareas-table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tarea</th>
	      <th scope="col">Descripción</th>
	      <th scope="col">Modalidad</th>
	      <th scope="col">Fecha de Entrega</th>
	      <th scope="col">Estado</th>
	      <th scope="col">Acciones</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($tareas as $tarea)
	    <tr>
	      <th scope="row">{{ $tarea->id }}</th>
	      <td>{{ $tarea->name }}</td>
	      <td>{{ $tarea->description }}</td>
	      <td>{{ $tarea->modality }}</td>
	      <td>{{ $tarea->due_date }}</td>
	      <td>
	      	@if($tarea->is_completed == false)
	      	<span class="badge incompleto">INCOMPLETO</span>
	      	@else
	      	<span class="badge completo">COMPLETADO</span>
	      	@endif      
	      </td>
	      <td>
	      	<form method="POST" class="row accion w-100" action="{{ route('completar.tarea', $tarea->id )}}">
				{{ csrf_field() }}
				@if($tarea->is_completed == true)	
				<button class="descompletar" type="submit">Descompletar</button>
				@else
				<button class="completar" type="submit">Completar</button>
				@endif
			</form>
	      	<a href="{{ route('tareas.show', $tarea->id) }}" class="row accion w-100 verdetalletarea">Ver detalles</a>
	      	<a href="javascript:void(0)" class="btn btn-sm btn-light row accion w-100" data-bs-toggle="modal" data-bs-target="#editarTarea_{{ $tarea->id }}">
	  			Editar
			</a>
			<form method="POST" class="row accion w-100 borrarbtn" action="{{ route('tareas.destroy', $tarea->id )}}">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}	
				<button class="btn btn-sm" type="submit">Borrar</button>
			</form>
	    </td>
	    </tr>

	    <div class="modal fade" id="editarTarea_{{ $tarea->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Editar Tarea</h5>
	        <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal" aria-label="Close"><ion-icon name="close-outline"></ion-icon></button>
	      </div>
	      <form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
	      <div class="modal-body">
	        
	      	<!-- Nuestro campo de protección de formulario -->
			{{ csrf_field() }}
			{{ method_field('PUT') }}	

			<!-- Campos de formulario -->
			<div class="form-group mb-3">
				<label class="w-100">Nombre de tarea</label><br>
				<input class="form-control" type="text" name="name" placeholder="Nombre de Tarea" value="{{ $tarea->name }}">
			</div>
			
			<div class="form-group mb-3">
				<label class="w-100">Descripción</label>
				<textarea class="form-control" name="description">{{ $tarea->description }}</textarea>
			</div>
			<div class="form-group mb-3">
				<label class="w-100">Modalidad</label>
				<select class="form-control" name="modality">
					<option selected="selected">{{ $tarea->modality }}</option>
					<option value="Individual">Individual</option>
					<option value="Por Equipo">Por Equipo</option>
					<option value="Parejas">Parejas</option>
					<option value="Asistencia Externa">Asistencia Externa</option>
				</select>
			</div>

			<div class="form-group mb-3">
				<label class="w-100">Proyectos</label>
				<select class="form-control" name="project_id">
					@foreach($proyectos as $proyecto)
						<option value="{{ $proyecto->id }}">{{ $proyecto->name }}</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group mb-3">
				<label class="w-100">Fecha de entrega</label>
				<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
			</div>

	      </div>
	      <div class="modal-footer d-flex justify-content-center">
		  	<button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal">Cancelar</button>
		  	<button type="submit" class="btn btn-light col-4">Guardar</button>
		  </div>
	  </form>
	    </div>
	  </div>
	</div>
	    	@endforeach
	  </tbody>
	</table>
			</div>
		</div>
	</div>
</div>
</section>
@endsection