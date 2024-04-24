<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Quiz Result</h1>

        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Your Score: {{ $score }} / {{ $totalQuestions }}</h2>

            @foreach ($userAnswers as $questionId => $answerData)
                <div class="mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $answerData['question'] }}</h3>
                    <p>Your Answer: {{ $answerData['submitted_answer'] }}</p>
                    <p>Correct Answer: {{ $answerData['correct_answer'] }}</p>
                    @if ($answerData['submitted_answer'] == $answerData['correct_answer'])
                        <p class="text-green-600 font-semibold">Correct!</p>
                    @else
                        <p class="text-red-600 font-semibold">Incorrect</p>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="flex justify-center">
            <a href="{{ route('quizzes.index') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">Back
                to Quizzes</a>
        </div>
    </div>
</x-app-layout>
