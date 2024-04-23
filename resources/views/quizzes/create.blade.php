<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Create Quiz</h1>

        <form action="{{ route('quizzes.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <button type="submit"
                class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:bg-blue-600">Create</button>
        </form>
    </div>
</x-app-layout>
