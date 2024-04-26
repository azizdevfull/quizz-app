<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">{{ $quiz->title }} Questions</h1>
        <a href="{{ route('admin.quizzes.index') }}"
            class="inline-block bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600">Back to Quizzes</a>
        <a href="{{ route('admin.quizzes.questions.create', $quiz->id) }}"
            class="inline-block bg-green-500 text-white px-4 py-2 rounded mt-4 ml-4 hover:bg-green-600">Add Question</a>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Question</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $question->question }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('admin.quizzes.questions.show', [$quiz->id, $question->id]) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">View</a>
                            <a href="{{ route('admin.quizzes.questions.edit', [$quiz->id, $question->id]) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 ml-2">Edit</a>
                            <form action="{{ route('admin.quizzes.questions.destroy', [$quiz->id, $question->id]) }}"
                                method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2"
                                    onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
