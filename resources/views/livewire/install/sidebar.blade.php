<ol class="space-y-4 w-72">

    @for ($i = 0; $i < count($links); $i++)
        @php $link = $links[$i]; @endphp


        <li>
            <a href="{{ route($link['route']) }}"
                class="w-full block p-4 text-blue-700 border rounded-lg @if (route($link['route']) == $current) border-blue-100 bg-green-50 @endif" role="alert">
                <div class="flex items-center justify-between">
                    <span class="sr-only">{{ $link['title'] }}</span>
                    <h3 class="font-medium">{{ $i + 1 . '. ' . $link['title'] }}</h3>

                    @if (route($link['route']) == $current)
                        <svg class="rtl:rotate-180 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    @endif

                </div>
            </a>
        </li>
    @endfor

</ol>
