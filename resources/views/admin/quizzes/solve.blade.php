<x-app-layout>
    <style>
        .question {
            display: none;
            /* Hide all questions initially */
        }

        .question.active {
            display: block;
            /* Show the active question */
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Solve Quiz: {{ $quiz->title }}</h1>
        <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST" id="quizForm">
            @csrf
            @foreach ($questions as $index => $question)
                <div class="question {{ $index === 0 ? 'active' : '' }}">
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
            @endforeach
            <div class="flex justify-between mt-8">
                <button type="button" onclick="prevQuestion()" class="hidden" id="prevBtn">Previous</button>
                <button type="button" onclick="nextQuestion()" id="nextBtn"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">Next</button>
            </div>
            <div class="flex justify-center mt-8">
                <button type="submit" id="submitBtn"
                    class="hidden bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">Submit
                    Answers</button>
            </div>
        </form>
    </div>

    <script>
        let currentQuestion = 0;
        const questions = document.querySelectorAll('.question');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        function showQuestion(index) {
            questions.forEach((question, idx) => {
                if (idx === index) {
                    question.classList.add('active');
                } else {
                    question.classList.remove('active');
                }
            });

            if (index === 0) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'inline-block';
            }

            if (index === questions.length - 1) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                submitBtn.style.display = 'none';
            }

            currentQuestion = index;
        }

        function nextQuestion() {
            if (currentQuestion < questions.length - 1) {
                showQuestion(currentQuestion + 1);
            }
        }

        function prevQuestion() {
            if (currentQuestion > 0) {
                showQuestion(currentQuestion - 1);
            }
        }

        showQuestion(currentQuestion); // Show the first question initially
    </script>
</x-app-layout>
