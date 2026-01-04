<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\classes;
use Illuminate\Auth\Access\HandlesAuthorization;

class classesPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Classes');
    }

    public function view(AuthUser $authUser, classes $classes): bool
    {
        return $authUser->can('View:Classes');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Classes');
    }

    public function update(AuthUser $authUser, classes $classes): bool
    {
        return $authUser->can('Update:Classes');
    }

    public function delete(AuthUser $authUser, classes $classes): bool
    {
        return $authUser->can('Delete:Classes');
    }

    public function restore(AuthUser $authUser, classes $classes): bool
    {
        return $authUser->can('Restore:Classes');
    }

    public function forceDelete(AuthUser $authUser, classes $classes): bool
    {
        return $authUser->can('ForceDelete:Classes');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Classes');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Classes');
    }

    public function replicate(AuthUser $authUser, classes $classes): bool
    {
        return $authUser->can('Replicate:Classes');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Classes');
    }

}