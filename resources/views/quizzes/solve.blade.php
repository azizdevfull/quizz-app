{{-- solve blade --}}
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Solve Quiz: {{ $quiz->title }}</h1>
        <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
            @csrf
            @foreach ($questions as $question)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4">{{ $question->question }}</h3>
                    @foreach (range(1, 4) as $option)
                        <label class="flex items-center mb-4 cursor-pointer">
                            <input type="radio" name="{{ $question->id }}" id="{{ $question->id }}_{{ $option }}"
                                value="{{ $option }}"
                                class="form-radio h-5 w-5 text-blue-600 focus:ring-2 focus:ring-blue-400" required>
                            <span class="ml-3 text-lg text-gray-800">{{ $question['answer' . $option] }}</span>
                        </label>
                    @endforeach
                </div>
                <hr class="my-8 border-t border-gray-300">
            @endforeach
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">Submit
                    Answers</button>
            </div>
        </form>
    </div>
</x-app-layout>
