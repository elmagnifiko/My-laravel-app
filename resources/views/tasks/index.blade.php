<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <!-- ✅ Lien CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Liste des tâches</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Ajouter une tâche</a>

    @if ($tasks->isEmpty())
        <div class="alert alert-info">Aucune tâche disponible.</div>
    @else
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        {{ $task->title }} <br>
                        <small class="text-muted">{{ $task->created_at->format('d/m/Y H:i') }}</small>
                    </span>
                    <span>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm me-2">Modifier</a>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    @endif
</div>

<!-- Optionnel : JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
