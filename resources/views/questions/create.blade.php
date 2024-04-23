<x-app-layout>

    <div class="container">
        <h1>Add Question</h1>

        <form action="{{ route('quizzes.questions.store', $quiz->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="answer1" class="form-label">Answer 1</label>
                <input type="text" name="answer1" id="answer1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="answer2" class="form-label">Answer 2</label>
                <input type="text" name="answer2" id="answer2" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="answer3" class="form-label">Answer 3</label>
                <input type="text" name="answer3" id="answer3" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="answer4" class="form-label">Answer 4</label>
                <input type="text" name="answer4" id="answer4" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="solution" class="form-label">Solution</label>
                <select name="solution" id="solution" class="form-control" required>
                    <option value="1">Answer 1</option>
                    <option value="2">Answer 2</option>
                    <option value="3">Answer 3</option>
                    <option value="4">Answer 4</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-app-layout>
