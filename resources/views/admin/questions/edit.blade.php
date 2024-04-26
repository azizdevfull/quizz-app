<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="mb-4">
            <a href="{{ route('admin.quizzes.questions.index', $quiz->id) }}"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4">Back to
                Quizzes</a>
        </div>

        <h1 class="text-2xl font-bold mb-4">Edit Question</h1>

        <form action="{{ route('admin.quizzes.questions.update', [$quiz->id, $question->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                <input type="text" name="question" id="question"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ $question->question }}" required>
            </div>
            <div class="mb-4">
                <label for="answer1" class="block text-sm font-medium text-gray-700">Answer 1</label>
                <input type="text" name="answer1" id="answer1"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ $question->answer1 }}" required>
            </div>
            <div class="mb-4">
                <label for="answer2" class="block text-sm font-medium text-gray-700">Answer 2</label>
                <input type="text" name="answer2" id="answer2"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ $question->answer2 }}" required>
            </div>
            <div class="mb-4">
                <label for="answer3" class="block text-sm font-medium text-gray-700">Answer 3</label>
                <input type="text" name="answer3" id="answer3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ $question->answer3 }}" required>
            </div>
            <div class="mb-4">
                <label for="answer4" class="block text-sm font-medium text-gray-700">Answer 4</label>
                <input type="text" name="answer4" id="answer4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ $question->answer4 }}" required>
            </div>
            <div class="mb-4">
                <label for="solution" class="block text-sm font-medium text-gray-700">Solution</label>
                <select name="solution" id="solution"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                    <option value="1" {{ $question->solution == 1 ? 'selected' : '' }}>Answer 1</option>
                    <option value="2" {{ $question->solution == 2 ? 'selected' : '' }}>Answer 2</option>
                    <option value="3" {{ $question->solution == 3 ? 'selected' : '' }}>Answer 3</option>
                    <option value="4" {{ $question->solution == 4 ? 'selected' : '' }}>Answer 4</option>
                </select>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
