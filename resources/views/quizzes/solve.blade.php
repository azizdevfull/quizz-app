<x-app-layout>

    <div class="container">
        <h1>Solve Quiz: {{ $quiz->title }}</h1>
        <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
            @csrf
            @foreach ($questions as $question)
                <h3>{{ $question->question }}</h3>
                @foreach (range(1, 4) as $option)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="{{ $question->id }}_{{ $option }}" value="{{ $option }}" required>
                        <label class="form-check-label" for="{{ $question->id }}_{{ $option }}">
                            {{ $question['answer' . $option] }}
                        </label>
                    </div>
                @endforeach
                <hr>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
