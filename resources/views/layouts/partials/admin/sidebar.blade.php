

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="pb-4 space-y-2 font-medium">

            @foreach ($itemsSidebar as $link)
                <li>
                    {!! $link->render() !!}
                </li>
            @endforeach

        </ul>
        {{-- <ul class="pt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            @foreach ($web_pages as $web_page)
                <li>
                    <a href="{{ $web_page['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $web_page['active'] ? ' bg-gray-100 dark:bg-gray-700' : '' }}">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $web_page['icon'] }}"></i>
                        </span>
                        <span class="ms-2">
                            {{ $web_page['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach

        </ul> --}}
    </div>
</aside>
