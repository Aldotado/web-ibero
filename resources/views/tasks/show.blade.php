@extends('layouts.master')

@section('content')
<section class="tareas-section">
	<div class="mx-4">
		<a href="{{ route('tareas.index') }}" class="btn btn-primary mt-4 btn-regresar">Regresar</a>

		<hr>

		<div class="card mb-4">
			<div class="card-body row">
				<h5 class="card-title">{{ $tarea->name }}</h5>
				<p class="card-text">{{ $tarea->name }}</p>	
			</div>
			<div class="card-body row">	
				<h5 class="card-title">Descripción</h5>
				<p class="card-text">{{ $tarea->description }}</p>
			</div>
			<div class="card-body row">	
				<h5 class="card-title">Modalidad</h5>
				<p class="card-text">{{ $tarea->modality }}</p>
			</div>
			<div class="card-body row">	
				<h5 class="card-title">Fecha de entrega</h5>
				<p class="card-text">{{ $tarea->due_date }}</p>
			</div>
			<div class="card-body row">	
				<h5 class="card-title">Estado</h5>
				@if($tarea->is_completed == false)
	      		<p class="card-text">Incompleta</p>
	      		@else
	      		<p class="card-text">Completada</p>
	      		@endif
			</div>
		</div>

		<!-- <h4>{{ $tarea->name }}</h4>
		<p>{{ $tarea->description }}</p>
		<p>Fecha de entrega: {{ $tarea->due_date }}</p>-->

		<a href="{{route('tareas.edit', $tarea->id )}}" class="btn btn-editar mb-4 text-light">Editar</a>

		<form method="POST" class="" action="{{ route('tareas.destroy', $tarea->id)}}">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button type="submit" class="btn btn-borrar text-light">Borrar</button>
		</form>
	</div>
</section>
@endsection