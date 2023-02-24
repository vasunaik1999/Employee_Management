<x-app-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="block p-4 bg-slate-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="grid grid-cols-2 ">
                        <div class="flex justify-start">
                            <h1 class="text-xl">My Daily Updates</h1>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('dashboard.daily-updates.create') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2"><i class="fa-solid fa-list-check mr-2"></i> Add Update</a>
                            <!-- @role('superadmin|admin')
                            <a href="{{ route('dashboard.daily-updates.check-index') }}" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2"><i class="fa-regular fa-circle-check mr-2"></i> Check Updates</a>
                            @endrole -->
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
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Daily Updates</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Display tasks -->
                <div class="block p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="dataTable">
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
                                            <a href="{{ route('dashboard.daily-updates.edit', $dailyUpdate->id) }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg px-3 py-2 text-center mr-1 mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('dashboard.daily-updates.show', $dailyUpdate->id) }}" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg px-3 py-2 text-center mr-2 mb-2"><i class="fa-solid fa-circle-info"></i></a>
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
    @push('bottom-scripts')
    <script>
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>
    @endpush
</x-app-layout>