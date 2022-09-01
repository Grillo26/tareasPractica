@extends('app')

@section('content')
<br>
    <div class = "container w-25 border p-4">
       
        <form action="{{ route('todos-update', ['id' => $todos->id ]) }}" method="POST">
            @method('PATCH')
            @csrf

            @if (session('success'))
            <h6 class="alert alert-success"> {{ session('success')}} </h6>           
            @endif

            @error('title')
            <h6 class="alert alert-danger"> {{ $message}} </h6>           
            @enderror


            <div class="mb-3">
                <label for="title" class="form-label">Título de la tarea</label>
                <input type="text" name="title" class="form-control" value="{{ $todos->title }}">
                <div id="textHelp" class="form-text">Actualiza la tarea.</div>
            </div>
    
            <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
        </form>

    </div>
@endsection