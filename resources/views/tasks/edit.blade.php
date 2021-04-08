<!DOCTYPE html>
<html>
<head>
	<title></title>
@extends('layouts.master')

@section('content')
	<!-- <form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
		<!-- Nuestro campo de protección de usuario 
		{{ csrf_field() }}
		{{ method_field('PUT')}}
		<!-- Campos del formulario 
		<label>Nombre de tarea</label>
		<input type="text" name="name" placeholder="Nombre de Tarea" value="{{ $tarea->name }}">
		<br>
		<br>
		<label>Descripción</label>
		<textarea name="description">{{ $tarea->description }}</textarea>
		<br>
		<br>
		<label>Fecha de Entrega</label>
		<input type="date" name="due_date" value="{{ $tarea->due_date }}">
		<br>
		<button type="submit">Guardar Tarea</button>
	</form>-->
	<form method="POST" class="px-4" action="{{ route('tareas.update', $tarea->id) }}">
				<!-- Nuestro campo de protección de usuario -->
				{{ csrf_field() }}
				{{ method_field('PUT')}}
				<!-- Campos del formulario -->
				<div class="form-group mb-3">
						<label>Nombre de tarea</label>
						<input class="form-control" type="text" name="name" placeholder="Nombre de Tarea" value="{{ $tarea->name }}">	
				</div>
				<div class="form-group mb-3">
						<label>Descripción</label>
						<textarea class="form-control" name="description">{{ $tarea->description }}</textarea>
				</div>
				<div class="form-group mb-3">
						<label>Fecha de Entrega</label>
						<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
				</div>
				<!-- Guardar formulario -->
				<button type="submit" class="btn btn-primary">Guardar Tarea</button>
			</form>
@endsection