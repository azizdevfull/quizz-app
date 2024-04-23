<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Quiz Result</h1>
        <h2 class="text-xl font-semibold mb-2">Quiz: {{ $quiz->title }}</h2>
        <h3 class="text-lg font-medium mb-4">Your Score: {{ $score }}%</h3>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Question
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Correct Answer
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Your Answer
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($questions as $question)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $question->question }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $question['answer' . $question->solution] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $question['answer' . $answers[$question->id]] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('quizzes.index') }}"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Back to
            Quizzes</a>
    </div>
</x-app-layout>
