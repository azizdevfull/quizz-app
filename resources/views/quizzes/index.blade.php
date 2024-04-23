<x-app-layout>

    <div class="container">
        <h1>Quizzes</h1>
        <a class="btn btn-success" href="{{ route('quizzes.create') }}">Add Quiz</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }}</td>
                        <td>
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('quizzes.questions.index', $quiz->id) }}" class="btn btn-secondary">Manage
                                Questions</a>
                            <a href="{{ route('quizzes.solve', $quiz->id) }}" class="btn btn-success">Solve</a>
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
