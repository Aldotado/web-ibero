@extends('layouts.master')

@section('content')
	<div class="mx-4">
		<a href="{{ route('tareas.index') }}" class="btn btn-primary">Regresar</a>

		<hr>

		<div class="card mb-4">
			<h5 class="card-header">Tarea {{ $tarea->id }}</h5>	
			<div class="card-body">
				<h5 class="card-title">{{ $tarea->name }}</h5>
				<p class="card-text">{{ $tarea->description }}</p>	
			</div>
			<div class="card-body">	
				<p>Fecha de entrega: {{ $tarea->due_date }}</p>
			</div>
		</div>

		<!-- <h4>{{ $tarea->name }}</h4>
		<p>{{ $tarea->description }}</p>
		<p>Fecha de entrega: {{ $tarea->due_date }}</p>-->

		<a href="{{route('tareas.edit', $tarea->id )}}" class="btn btn-secondary mb-4">EDITAR TAREA</a>

		<form method="POST" action="{{ route('tareas.destroy', $tarea->id)}}">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button type="submit" class="btn btn-danger">BORRAR REGISTRO</button>
		</form>
	</div>
	
@endsection