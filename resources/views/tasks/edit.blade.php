@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Modifier une tâche</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
