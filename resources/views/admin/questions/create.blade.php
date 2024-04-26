<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Add Question</h1>
        <a href="{{ route('admin.quizzes.questions.index', $quiz->id) }}"
            class=" text-blue-500 font-bold py-2 px-4 rounded">
            Back
        </a>
        <form action="{{ route('admin.quizzes.questions.store', $quiz->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                <input type="text" name="question" id="question"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="answer1" class="block text-sm font-medium text-gray-700">Answer 1</label>
                <input type="text" name="answer1" id="answer1"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="answer2" class="block text-sm font-medium text-gray-700">Answer 2</label>
                <input type="text" name="answer2" id="answer2"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="answer3" class="block text-sm font-medium text-gray-700">Answer 3</label>
                <input type="text" name="answer3" id="answer3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="answer4" class="block text-sm font-medium text-gray-700">Answer 4</label>
                <input type="text" name="answer4" id="answer4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="solution" class="block text-sm font-medium text-gray-700">Solution</label>
                <select name="solution" id="solution"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                    <option value="1">Answer 1</option>
                    <option value="2">Answer 2</option>
                    <option value="3">Answer 3</option>
                    <option value="4">Answer 4</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Create
            </button>
        </form>
    </div>
</x-app-layout>
