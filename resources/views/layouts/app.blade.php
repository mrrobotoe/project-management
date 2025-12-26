@php
    $options = [];

    $teams = auth()->user()->teams;
    foreach($teams as $team) {
        $options[] = (object) ['label' => $team->name, 'value' => $team->name];
    }

    $selectedOption = (object) [
        'label' => auth()->user()->currentTeam->name,
        'value' => auth()->user()->currentTeam->name
    ]


@endphp

    <!DOCTYPE html>
<html x-cloak x-data lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="$store.darkMode.on ? 'dark' : 'light'">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script type="module">
            if (!("anchorName" in document.documentElement.style)) {
                import("https://unpkg.com/@oddbird/css-anchor-positioning");
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-background">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-background dark:bg-neutral-900 shadow-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                        {{ $header }}
                        <div>
                            <x-ui.combobox :list-options="$options" :selected-option="$selectedOption" name="teams" id="team">
                                <template x-for="(item, index) in options" x-bind:key="item.value">
                                    <form method="POST" action="{{ route('team.set-current', auth()->user()->current_team_id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-ui.combobox.item item="item" />
                                    </form>
                                </template>
                            </x-ui.combobox>
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            // if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            //     document.documentElement.classList.add('dark');
            // } else {
            //     document.documentElement.classList.remove('dark');
            // }
            //
            document.addEventListener('alpine:init', () => {
                Alpine.store('darkMode', {
                    on: Alpine.$persist(false).as('darkMode_on'),
                    toggle() {
                        this.on = ! this.on
                    }
                })
            })
        </script>

    </body>
</html>
