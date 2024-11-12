@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Médicos</h1>

        <!-- nuevo registro -->
        <a href="{{ route('medicos.create') }}" class="btn btn-success mb-3">Agregar nuevo medico</a>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('medicos.index') }}" method="GET" class="mb-3">
            <input type="text" name="query" placeholder="Buscar médico..." class="form-control"
                style="display: inline-block; width: auto;">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <!-- Mensajes de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tabla de médicos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medicos as $medico)
                    <tr>
                        <td>{{ $medico->nombre }}</td>
                        <td>{{ $medico->especialidad }}</td>
                        <td>{{ $medico->email }}</td>
                        <td>
                            <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No se encontraron médicos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $medicos->appends(['query' => request()->query('query')])->links() }}
    </div>
@endsection
