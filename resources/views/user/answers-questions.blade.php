<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Quiz: {{ $quiz->title }}</h1>

        @if ($answers->isEmpty())
            <p class="text-center text-gray-600">You haven't submitted any answers yet.</p>
        @else
            @php
                $totalQuestions = $answers->count();
                $totalCorrect = $answers
                    ->filter(function ($answer) {
                        return $answer->is_correct;
                    })
                    ->count();
                $scorePercentage = ($totalCorrect / $totalQuestions) * 100;
            @endphp

            <p class="text-lg font-semibold mb-4 text-center">Score: {{ round($scorePercentage, 2) }}%</p>

            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-4 text-left">Question</th>
                            <th class="py-3 px-4 text-left">Your Answer</th>
                            <th class="py-3 px-4 text-left">Is Correct</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answer)
                            <tr class="border-b border-gray-300">
                                <td class="py-3 px-4">{{ $answer->question->question }}</td>
                                <td class="py-3 px-4">{{ $answer->answer }}</td>
                                <td class="py-3 px-4">
                                    @if ($answer->is_correct)
                                        <span class="text-green-600 font-semibold">Correct</span>
                                    @else
                                        <span class="text-red-600 font-semibold">Incorrect</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
