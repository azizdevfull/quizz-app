<x-app-layout>
    <div class="container">
        <h1>{{ $quiz->title }}</h1>
        <h3>Question: {{ $question->question }}</h3>
        <ul>
            <li>Answer 1: {{ $question->answer1 }}</li>
            <li>Answer 2: {{ $question->answer2 }}</li>
            <li>Answer 3: {{ $question->answer3 }}</li>
            <li>Answer 4: {{ $question->answer4 }}</li>
        </ul>
        <p>Solution: {{ $question->solution }}</p>
        <a class="btn btn-primary" href="{{ route('quizzes.questions.index', $quiz->id) }}">Back to Questions</a>
    </div>
</x-app-layout>
