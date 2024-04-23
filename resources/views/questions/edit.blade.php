</x-app-layout>

<div class="container">
    <h1>Edit Question</h1>

    <form action="{{ route('quizzes.questions.update', [$quiz->id, $question->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name="question" id="question" class="form-control" value="{{ $question->question }}"
                required>
        </div>
        <div class="mb-3">
            <label for="answer1" class="form-label">Answer 1</label>
            <input type="text" name="answer1" id="answer1" class="form-control" value="{{ $question->answer1 }}"
                required>
        </div>
        <div class="mb-3">
            <label for="answer2" class="form-label">Answer 2</label>
            <input type="text" name="answer2" id="answer2" class="form-control" value="{{ $question->answer2 }}"
                required>
        </div>
        <div class="mb-3">
            <label for="answer3" class="form-label">Answer 3</label>
            <input type="text" name="answer3" id="answer3" class="form-control" value="{{ $question->answer3 }}"
                required>
        </div>
        <div class="mb-3">
            <label for="answer4" class="form-label">Answer 4</label>
            <input type="text" name="answer4" id="answer4" class="form-control" value="{{ $question->answer4 }}"
                required>
        </div>
        <div class="mb-3">
            <label for="solution" class="form-label">Solution</label>
            <select name="solution" id="solution" class="form-control" required>
                <option value="1" {{ $question->solution == 1 ? 'selected' : '' }}>Answer 1</option>
                <option value="2" {{ $question->solution == 2 ? 'selected' : '' }}>Answer 2</option>
                <option value="3" {{ $question->solution == 3 ? 'selected' : '' }}>Answer 3</option>
                <option value="4" {{ $question->solution == 4 ? 'selected' : '' }}>Answer 4</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</x-app-layout>
