<?php

namespace App\Policies;

use App\Models\ApiClient;
use App\Models\User;

class ApiClientPolicy
{
    /**
     * Determine whether the user can view any API clients.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the specific API client.
     */
    public function view(User $user, ApiClient $apiClient): bool
    {
        return $user->isAdmin() || ($apiClient->created_by !== null && $apiClient->created_by === $user->id);
    }

    /**
     * Determine whether the user can create API clients.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the specific API client.
     */
    public function update(User $user, ApiClient $apiClient): bool
    {
        return $user->isAdmin() || ($apiClient->created_by !== null && $apiClient->created_by === $user->id);
    }

    /**
     * Determine whether the user can delete the specific API client.
     */
    public function delete(User $user, ApiClient $apiClient): bool
    {
        return $user->isAdmin() || ($apiClient->created_by !== null && $apiClient->created_by === $user->id);
    }
}

