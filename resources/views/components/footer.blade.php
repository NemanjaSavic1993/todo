<!-- variabla topTasks se kreira u boot metodi AppServiceProvider -->

<footer class="bg-primary">
    <div class="container">
        <div class="row">
            <h5>Latest 3 tasks</h5>
            @foreach($topTasks as $task)
                <div class="col-md-4 text-center">
                    <a href="{{ route('tasks.show', $task->id) }}" class="text-white link-underline link-underline-opacity-0">{{ $task->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
</footer>