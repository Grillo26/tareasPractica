@extends('app')

@section('content')
<br>
    <div class = "container w-25 border p-4">
       
        <form action="{{ route('todos') }}" method="POST">
            @csrf

            @if (session('success'))
            <h6 class="alert alert-success"> {{ session('success')}} </h6>           
            @endif

            @error('title')
            <h6 class="alert alert-danger"> {{ $message}} </h6>           
            @enderror

            
            <div class="mb-3">
                <label for="title" class="form-label">Título de la tarea</label>
                <input type="text" name="title" class="form-control">
                <div id="textHelp" class="form-text">Crea una nueva tarea para realizar.</div>
            </div>
    
            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>
    </div>
@endsection