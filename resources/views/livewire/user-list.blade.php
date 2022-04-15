<div>
    <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">

        @if ( count($all_users))
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">All User</h5>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                View all
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($all_users->sortByDesc('total_visits') as $user)
                        <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$user->name}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{$user->email}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ $user->total_visits <= 1 ? "$user->total_visits time" : "$user->total_visits times" }}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        @else
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">No User Found!</h5>
        @endif


    </div>
</div>


