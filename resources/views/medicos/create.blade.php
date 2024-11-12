@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Nuevo Médico</h1>

        <!-- Formulario de creación -->
        <form action="{{ route('medicos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <input type="text" name="especialidad" id="especialidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar Médico</button>
        </form>
    </div>
@endsection
