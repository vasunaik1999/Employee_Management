<x-app-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex flex-col p-2">
                    <h1 class="text-4xl">Dashboard</h1>

                    <div class="py-6">
                        <h5>Welcome {{ Auth::user()->name }}!</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>