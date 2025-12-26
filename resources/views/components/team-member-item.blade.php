@php
    use Spatie\Permission\Models\Role;
    $options = [];
    $roles = Role::get();

    foreach($roles as $role) {
        $options[] = (object) ['label' => $role->name, 'value' => $role->name, 'id' => $role->name];
    }

    $role = auth()->user()->getRoleNames()->first();
    $selectedOption = (object) [
        'label' => $role,
        'value' => $role
    ]
@endphp
<li class="py-4">
    <div class="flex items-center space-x-2">
        <img src="{{ $member->profilePhotoUrl() }}" alt="{{ $member->name }}" class="size-6 rounded-full"/>
        <div class="text-sm font-semibold text-foreground flex-auto">
            {{ $member->name }} ({{ $member->email }})
        </div>

        @canany(['removeTeamMember', 'changeMemberRole'], [$team, $member])
            <x-ui.dropdown align="right">
                <x-ui.dropdown-trigger>
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </x-ui.dropdown-trigger>

                <x-ui.dropdown-content class="w-48">
                    @can('removeTeamMember', [auth()->user()->currentTeam, $member])
                        <x-ui.dropdown-link>
                            <form action="{{ route('team.members.destroy', [$team, $member]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    {{ __('Remove team member') }}
                                </button>
                            </form>
                        </x-ui.dropdown-link>
                    @endcan

                    @can('changeMemberRole', [auth()->user()->currentTeam, $member])
                        <x-ui.dropdown-link href="">
                            <button
                                x-on:click.prevent="$dispatch('open-modal', 'change-member-{{ $member->id }}-role')"
                            >{{ __('Change member role') }}</button>
                        </x-ui.dropdown-link>
                    @endcan
                </x-ui.dropdown-content>
            </x-ui.dropdown>
    </div>
    @endcanany

    <div class="mt-3 text-sm text-foreground">
        Role: <span class="text-foreground/70">{{ $member->roles->pluck('name')->join(',') }}</span>
    </div>
</li>

@can('changeMemberRole', [auth()->user()->currentTeam, $member])
    <x-modal name="change-member-{{ $member->id }}-role" focusable>
        <form method="post" action="{{ route('team.members.update', [$team, $member]) }}" class="p-6">
            @csrf
            @method('PATCH')

            <h2 class="text-lg font-medium text-gray-900">
                Change role for {{ $member->name }} ({{ $member->email }})
            </h2>

            <div class="mt-6">
                <x-input-label for="role" :value="__('Role')" class="sr-only" />
                <x-ui.combobox :list-options="$options" :selected-option="$selectedOption" name="teams" id="team">
                    <template x-for="(item, index) in options" x-bind:key="item.value">
                        <x-ui.combobox.item item="item"/>
                    </template>
                </x-ui.combobox>
                <x-ui.select class="w-full" name="role">
                    @foreach (Role::get() as $role)
                        <option
                            value="{{ $role->name }}"
                            @selected($member->hasRole($role))
                            class="text-sm text-foreground p-1"
                        >
                            {{ $role->name }}
                        </option>
                    @endforeach
                </x-ui.select>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Change role') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
@endcan
