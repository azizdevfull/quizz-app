<!-- resources/views/user/my-answers.blade.php -->

<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">My Answers</h1>

        @if ($answersByQuiz->isEmpty())
            <p class="text-center text-gray-600">You haven't submitted any answers yet.</p>
        @else
            @foreach ($answersByQuiz as $quizId => $answers)
                @php
                    $quiz = $answers->first()->quiz;
                @endphp
                <h2 class="text-2xl font-bold mb-4">{{ $quiz->title }}</h2>

                <table class="w-full border-collapse border border-gray-300 mb-8">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-6 text-left">Question</th>
                            <th class="py-3 px-6 text-left">Submitted Answer</th>
                            <th class="py-3 px-6 text-left">Correct Answer</th>
                            <th class="py-3 px-6 text-left">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answer)
                            <tr>
                                <td class="py-4 px-6 border border-gray-300">{{ $answer->question->question }}</td>
                                <td class="py-4 px-6 border border-gray-300">{{ $answer->answer }}</td>
                                <td class="py-4 px-6 border border-gray-300">{{ $answer->question->solution }}</td>
                                <td class="py-4 px-6 border border-gray-300">
                                    @if ($answer->is_correct)
                                        <span class="text-green-600 font-semibold">Correct!</span>
                                    @else
                                        <span class="text-red-600 font-semibold">Incorrect</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endif
    </div>
</x-app-layout>
