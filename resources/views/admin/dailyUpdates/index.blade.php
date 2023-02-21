<x-app-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="block p-4 bg-slate-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="grid grid-cols-2 ">
                        <div class="flex justify-start">
                            <h1 class="text-xl">Daily Updates</h1>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('dashboard.daily-updates.create') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2"><i class="fa-solid fa-list-check mr-2"></i> Add Daily update</a>
                        </div>
                    </div>
                </div>

                <!-- Display tasks -->
                <div class="block p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Task Brief
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dailyUpdates as $key => $dailyUpdate)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{$key + 1}}
                                    </th>
                                    <td class="px-6 py-4">
                                        <!-- format('d M Y') to get in form of Jan -->
                                        <i class="fa-solid fa-calendar-days mr-2"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d', $dailyUpdate->date)->format('d F Y')}}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{$dailyUpdate->task_brief}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($dailyUpdate->status == 0)
                                        <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                            <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                            Not Checked
                                        </span>
                                        @else
                                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                            Checked
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('dashboard.daily-updates.edit', $dailyUpdate->id) }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg px-3 py-2 text-center mr-2 mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form method="POST" action="{{ route('dashboard.daily-updates.destroy', $dailyUpdate->id) }}" onsubmit="return confirm('Are you sure?');" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg px-3 py-2 text-center mr-2 mb-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>