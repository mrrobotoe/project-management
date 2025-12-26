<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">
            {{ __('Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @can('update', $team)
                <div class="p-4 sm:p-8 bg-background shadow-xs sm:rounded-lg border border-border dark:bg-input/40">
                    <div class="max-w-xl">
                        @include('team.partials.edit-team-form')
                    </div>
                </div>
            @endcan

            @can('viewTeamMembers', $team)
                <div class="p-4 sm:p-8 bg-background shadow-xs sm:rounded-lg border border-border dark:bg-input/40">
                    <div class="max-w-xl">
                        @include('team.partials.team-members')
                    </div>
                </div>
            @endcan

            @can('leave', $team)
                <div class="p-4 sm:p-8 bg-background shadow-xs sm:rounded-lg border border-border dark:bg-input/40">
                    <div class="max-w-xl">
                        <form action="{{ route('team.leave', $team) }}" method="POST">
                            @csrf
                            <x-danger-button>Leave team</x-danger-button>
                        </form>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
