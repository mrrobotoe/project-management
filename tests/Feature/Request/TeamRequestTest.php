<?php

use App\Models\Team;
use App\Models\User;

it('can access the current team through the request', function () {
    $user = User::factory()->create();

    request()->setUserResolver(function () use ($user) {
        return $user;
    });

    expect(request()->team())->toBeInstanceOf(Team::class)
        ->id->toBe($user->currentTeam->id)
        ->name->toBe($user->currentTeam->name);
});

it('returns null if no team is attached to the user', function () {
    expect(request()->team())->toBeNull();
});

it('can access the current team through helper function team', function () {
    $user = User::factory()->create();

    request()->setUserResolver(function () use ($user) {
        return $user;
    });

    expect(team())->toBeInstanceOf(Team::class)
        ->id->toBe($user->currentTeam->id)
        ->name->toBe($user->currentTeam->name);
});
