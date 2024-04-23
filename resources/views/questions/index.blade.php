<x-app-layout>

    <div class="container">
        <h1>{{ $quiz->title }} Questions</h1>
        <a class="btn btn-primary" href="{{ route('quizzes.show', $quiz->id) }}">Back to Quiz</a>
        <a class="btn btn-success" href="{{ route('quizzes.questions.create', $quiz->id) }}">Add Question</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>
                            <a href="{{ route('quizzes.questions.show', [$quiz->id, $question->id]) }}"
                                class="btn btn-info">View</a>
                            <a href="{{ route('quizzes.questions.edit', [$quiz->id, $question->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <form action="{{ route('quizzes.questions.destroy', [$quiz->id, $question->id]) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
