<x-app-layout>
    <!-- component -->
    <h1 class="text-3xl font-bold mb-4">Quizzes</h1>
    <button id="openModal"
        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-block mb-4">
        Add Quiz
    </button>
    <section class="container px-4 mx-auto">
        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 light:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 light:divide-gray-700">
                            <thead class="bg-gray-50 light:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 light:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <input type="checkbox"
                                                class="text-blue-500 border-gray-300 rounded light:bg-gray-900 light:ring-offset-gray-900 light:border-gray-700">
                                            <button class="flex items-center gap-x-2">
                                                <span>Id</span>
                                            </button>
                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 light:text-gray-400">
                                        Title
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 light:text-gray-400">
                                        Show
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 light:text-gray-400">
                                        Edit
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 light:text-gray-400">
                                        Manage Questions
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 light:text-gray-400">
                                        Solve
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 light:text-gray-400">
                                        Delete
                                    </th>


                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 light:divide-gray-700 light:bg-gray-900">
                                @foreach ($quizzes as $quiz)
                                    <tr>
                                        <td
                                            class="px-4 py-4 text-sm font-medium text-gray-700 light:text-gray-200 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <input type="checkbox"
                                                    class="text-blue-500 border-gray-300 rounded light:bg-gray-900 light:ring-offset-gray-900 light:border-gray-700">

                                                <span>{{ $quiz->id }}</span>
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 light:text-gray-300 whitespace-nowrap">
                                            {{ $quiz->title }}</td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <a href="{{ route('admin.quizzes.show', $quiz->id) }}"
                                                class="text-sm font-normal">
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 light:bg-gray-800">
                                                    Show
                                                </div>
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <a href="{{ route('admin.quizzes.edit', $quiz->id) }}"
                                                class="text-sm font-normal">
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 light:bg-gray-800">
                                                    Edit
                                                </div>
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <a href="{{ route('admin.quizzes.questions.index', $quiz->id) }}"
                                                class="text-sm font-normal">
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 light:bg-gray-800">
                                                    Manage Questions
                                                </div>
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <a href="{{ route('quizzes.solve', $quiz->id) }}"
                                                class="text-sm font-normal">
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 light:bg-gray-800">
                                                    Solve
                                                </div>
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this quiz?')"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Check if there are multiple pages to display --}}
        @if ($quizzes->lastPage() > 1)
            <div class="flex items-center justify-between mt-6">
                {{-- Previous Page Link --}}
                @if ($quizzes->onFirstPage())
                    <span class="px-5 py-2 text-sm text-gray-400 bg-white border rounded-md cursor-not-allowed">
                        <span class="flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                            <span>Previous</span>
                        </span>
                    </span>
                @else
                    <a href="{{ $quizzes->previousPageUrl() }}"
                        class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 light:bg-gray-900 light:text-gray-200 light:border-gray-700 light:hover:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5 rtl:-scale-x-100">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>
                        <span>Previous</span>
                    </a>
                @endif

                {{-- Pagination Links --}}
                <div class="flex items-center gap-x-3">
                    @for ($i = 1; $i <= $quizzes->lastPage(); $i++)
                        <a href="{{ $quizzes->url($i) }}"
                            class="px-2 py-1 text-sm rounded-md {{ $quizzes->currentPage() === $i ? 'text-blue-500 bg-blue-100' : 'text-gray-500 hover:bg-gray-100' }}">
                            {{ $i }}
                        </a>
                    @endfor
                </div>

                {{-- Next Page Link --}}
                @if ($quizzes->hasMorePages())
                    <a href="{{ $quizzes->nextPageUrl() }}"
                        class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 light:bg-gray-900 light:text-gray-200 light:border-gray-700 light:hover:bg-gray-800">
                        <span>Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5 rtl:-scale-x-100">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                @else
                    <span class="px-5 py-2 text-sm text-gray-400 bg-white border rounded-md cursor-not-allowed">
                        <span class="flex items-center gap-x-2">
                            <span>Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </span>
                    </span>
                @endif
            </div>
        @endif

    </section>

    <div id="quizModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <!-- Modal Content -->
        <div class="bg-white p-8 rounded shadow-lg max-w-md">
            <h2 class="text-lg font-bold mb-4">Create Quiz</h2>

            <!-- Quiz Form -->
            <form action="{{ route('admin.quizzes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:bg-blue-600">Create</button>
                    <button id="closeModal" type="button"
                        class="ml-4 text-gray-600 hover:text-gray-800">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // JavaScript to handle modal opening and closing
        const openModalButton = document.getElementById('openModal');
        const closeModalButton = document.getElementById('closeModal');
        const modal = document.getElementById('quizModal');

        // Open modal when "Add Quiz" button is clicked
        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Close modal when "Cancel" button is clicked
        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal content
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
