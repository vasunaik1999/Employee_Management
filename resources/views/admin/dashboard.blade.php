<x-app-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex flex-col p-2">
                    <h1 class="text-4xl font-extrabold">Dashboard</h1>

                    <div class="py-6">
                        <h3 class="mb-4 text-xl font-extrabold text-gray-900 dark:text-white"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Welcome {{ Auth::user()->name }}!</span></h3>
                    </div>

                    <!-- component -->
                    <div class="block p-4  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <div class="flex flex-wrap mb-2">
                            <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                                <div class="bg-green-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i class="fa-solid fa-2x fa-calendar-check text-white"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">My Updates</h5>
                                            <h3 class="text-white text-3xl">{{$myUpdates}} <span class="text-green-400"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                                <div class="bg-orange-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i class="fa-solid fa-layer-group fa-2x fa-fw text-white"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">My Categories</h5>
                                            <h3 class="text-white text-3xl">{{$myCategories}} <span class="text-orange-400"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @role('superadmin')
                    <div class="mt-4 block p-4  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <div class="flex flex-wrap mb-2">
                            <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                                <div class="bg-blue-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Total Users</h5>
                                            <h3 class="text-white text-3xl">{{$totalUsers}} <span class="text-blue-400 mf-2"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                                <div class="bg-yellow-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i class="fa-solid fa-user-gear fa-2x fa-fw text-white"></i></div>
                                        <div class="flex-1 text-right pr-1">
                                            <h5 class="text-white">Total Admins</h5>
                                            <h3 class="text-white text-3xl">{{$totalAdmins}} <span class="text-yellow-400"><i class="fas fa-caret-up"></i></span></h3> <!-- <i class="fas fa-caret-up"></i>s-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                                <div class="bg-purple-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i class="fa-solid fa-user-secret fa-2x fa-fw text-white"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Total Superadmins</h5>
                                            <h3 class="text-white text-3xl">{{$totalSuperadmins}} <span class="text-purple-400"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                                <div class="bg-pink-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i class="fa-solid fa-address-book fa-2x fa-fw text-white"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Roles</h5>
                                            <h3 class="text-white text-3xl">{{$totalRoles}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                                <div class="bg-red-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i class="fa-solid fa-file-prescription fa-2x fa-fw text-white"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Permissions</h5>
                                            <h3 class="text-white text-3xl">{{$totalPermissions}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>