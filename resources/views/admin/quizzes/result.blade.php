<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Quiz Result</h1>
        <h3 class="text-3xl font-bold mb-8 text-center">Score {{ $score }}%</h3>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-3 px-6 text-left">Question</th>
                    <th class="py-3 px-6 text-left">Your Answer</th>
                    <th class="py-3 px-6 text-left">Correct Answer</th>
                    <th class="py-3 px-6 text-left">Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userAnswers as $questionId => $answerData)
                    <tr>
                        <td class="py-4 px-6 border border-gray-300">{{ $answerData['question'] }}</td>
                        <td class="py-4 px-6 border border-gray-300">{{ $answerData['submitted_answer'] }}</td>
                        <td class="py-4 px-6 border border-gray-300">{{ $answerData['correct_answer'] }}</td>
                        <td class="py-4 px-6 border border-gray-300">
                            @if ($answerData['submitted_answer'] == $answerData['correct_answer'])
                                <span class="text-green-600 font-semibold">Correct!</span>
                            @else
                                <span class="text-red-600 font-semibold">Incorrect</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-center mt-8">
            <a href="{{ route('quizzes.index') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">Back
                to Quizzes</a>
        </div>
    </div>
</x-app-layout>
