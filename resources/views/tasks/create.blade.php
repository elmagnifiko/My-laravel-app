@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Ajouter une nouvelle tâche</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de la tâche :</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </form>
        </div>
    </div>
@endsection
