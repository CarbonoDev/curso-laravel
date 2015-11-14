<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy($user, $post) {
        return $user->id === $post->author_id;
    }

    public function update($user, $post) {
        return $user->id === $post->author_id;
    }

    public function show($user, $post) {
        return $user->id === $post->author_id || $post->is_public;
    }
}
