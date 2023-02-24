<x-app-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="block p-4 bg-slate-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="grid grid-cols-2 ">
                        <div class="flex justify-start">
                            <h1 class="text-xl">Tags</h1>
                        </div>
                    </div>
                </div>

                <!-- Breadcrumb -->
                <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('dashboard.notes.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Notes</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Tags</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- tags -->
                <div class="block p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex flex-col items-center h-min bg-gray-300 dark:bg-gray-800">
                        <div class="w-full my-8 p-8 items-center bg-white rounded-2xl shadow-xl overflow-hidden sm:max-w-4xl hover:shadow-xl dark:bg-gray-500">
                            <!-- <h1 class="mr-2 text-2xl text-gray-800 font-bold sm:text-4xl dark:text-gray-100">Hi Simon👋</h1>
                            <p class="mt-2 text-gray-600 dark:text-gray-200">Lets get familiar with your interests so that we can recommend your
                                resources accordingly.</p> -->
                            <form method="POST" action="{{ route('dashboard.notes.tags.store', $notes->id) }}" class="mt-4">
                                @csrf
                                <div class="flex flex-col items-center mt-1 text-sm sm:flex-row sm:space-y-0 sm:space-x-4">
                                    <div class="w-full sm:mb-2">
                                        <label for="tag_name">
                                            <span class="ml-2 text-sm text-gray-800 sm:text-base dark:text-gray-200">Enter the Tags</span>
                                            <input id="tag_name" name="tag_name" minlength="3" class="mt-1 py-3 px-5 w-full border-2 border-purple-300 rounded-2xl outline-none placeholder:text-gray-400 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer dark:bg-gray-500 dark:text-gray-200 dark:placeholder:text-gray-300 dark:invalid:text-pink-300 dark:border-gray-400" type="text" placeholder="Type something" />
                                            <p class="ml-2 text-xs text-pink-700 invisible peer-invalid:visible dark:text-gray-200">less than 3
                                                characters</p>
                                        </label>
                                    </div>
                                    <button type="submit" class="w-full text-center py-3 px-8 text-sm font-medium bg-purple-500 text-gray-100 rounded-2xl cursor-pointer sm:w-min hover:bg-purple-700 hover:text-gray-50 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-50 mb-4 sm:mb-0">
                                        <span>Add</span>
                                    </button>
                                </div>
                            </form>

                            <div class='px-2 pt-2 pb-11 mb-3 flex flex-wrap rounded-lg bg-purple-200 dark:bg-gray-400'>
                                <!-- display tags -->
                                @if(empty($tags->first()))
                                <span class="inline-flex items-center text-purple-900">
                                    <span class="w-2 h-2 mr-1 ml-2 bg-purple-900 rounded-full"></span>
                                    No Tags Found! Please Add Tags.
                                </span>
                                @else
                                @foreach($tags as $tag)
                                <span class="flex flex-wrap pl-4 pr-2 py-2 m-1 justify-between items-center text-sm font-medium rounded-xl cursor-pointer bg-purple-500 text-gray-200 hover:bg-purple-600 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100">
                                    {{$tag->tag_name}}
                                    <form method="POST" action="{{ route('dashboard.notes.tags.destroy', $tag->id) }}" onsubmit="return confirm('Are you sure?');" class="h-5 w-5 ml-3 hover:text-gray-300">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa-solid fa-circle-xmark text-white text-xl"></i>
                                        </button>
                                    </form>
                                </span>
                                @endforeach

                                @endif
                            </div>

                        </div>
                    </div>

                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

                        body {
                            font-family: 'Poppins', sans-serif;
                        }
                    </style>
                </div>

            </div>
        </div>
    </div>
    @push('bottom-scripts')
    @endpush
</x-app-layout>