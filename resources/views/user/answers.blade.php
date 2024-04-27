<!-- resources/views/user/my-answers.blade.php -->

<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">My Answers</h1>

        @if ($answersByQuiz->isEmpty())
            <p class="text-center text-gray-600">You haven't submitted any answers yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($answersByQuiz as $quizId => $answers)
                    @php
                        $quiz = $answers->first()->quiz;
                        $totalQuestions = count($answers);
                        $totalCorrect = 0;
                    @endphp

                    @foreach ($answers as $answer)
                        @if ($answer->is_correct)
                            @php $totalCorrect++; @endphp
                        @endif
                    @endforeach

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold mb-4">{{ $quiz->title }}</h2>
                        <p class="text-sm text-gray-600 mb-2">Questions: {{ $totalQuestions }}</p>
                        <p class="text-sm text-gray-600 mb-4">Score:
                            {{ round(($totalCorrect / $totalQuestions) * 100, 2) }}%</p>
                        <div class="flex justify-center">
                            <a href="{{ route('my-answers.show', $quiz->id) }}"
                                class="text-blue-600 font-semibold hover:text-blue-700 transition duration-300 ease-in-out">View
                                Answers</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
