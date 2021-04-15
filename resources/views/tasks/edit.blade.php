@extends('layouts.master')

@section('content')
<section class="tareas-section d-flex justify-content-center">
	<div class="edit-form col-10">
	<form method="POST" class="px-4 py-4" action="{{ route('tareas.update', $tarea->id) }}">
				<!-- Nuestro campo de protección de usuario -->
				{{ csrf_field() }}
				{{ method_field('PUT')}}
				<!-- Campos del formulario -->
				<div class="form-group mb-3">
						<label class="edit-title">Nombre de tarea</label>
						<input class="form-control" type="text" name="name" placeholder="Nombre de Tarea" value="{{ $tarea->name }}">	
				</div>
				<div class="form-group mb-3">
						<label class="edit-title">Descripción</label>
						<textarea class="form-control" name="description">{{ $tarea->description }}</textarea>
				</div>
				<div class="form-group mb-3">
					<label class="edit-title">Modalidad</label>
					<select class="form-control" name="modality">
						<option selected="selected">{{ $tarea->modality }}</option>
						<option value="Individual">Individual</option>
						<option value="Por Equipo">Por Equipo</option>
						<option value="Parejas">Parejas</option>
						<option value="Asistencia Externa">Asistencia Externa</option>
					</select>
				</div>
				<div class="form-group mb-3">
						<label class="edit-title">Fecha de Entrega</label>
						<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
				</div>
				<!-- Guardar formulario -->
				<button type="submit" class="btn btn-edit-guardar">Guardar</button>
	</form>
	</div>
</section>
@endsection