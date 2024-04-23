<x-app-layout>

    <div class="container">
        <h1>Create Quiz</h1>

        <form action="{{ route('quizzes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-app-layout>
