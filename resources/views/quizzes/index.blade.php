<x-app-layout>
    <h1 class="text-3xl font-bold mb-8 text-center">Quizzes</h1>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($quizzes as $quiz)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">{{ $quiz->title }}</h2>
                <a href="{{ route('quizzes.solve', $quiz->id) }}"
                    class="block w-full text-center bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">
                    Solve Quiz
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
