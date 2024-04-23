<x-app-layout>

    <div class="container">
        <h1>Quiz Result</h1>
        <h2>Quiz: {{ $quiz->title }}</h2>
        <h3>Your Score: {{ $score }}%</h3>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question['answer' . $question->solution] }}</td>
                        <td>{{ $question['answer' . $answers[$question->id]] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('quizzes.index') }}" class="btn btn-primary">Back to Quizzes</a>
    </div>
</x-app-layout>
