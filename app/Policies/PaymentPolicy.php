<?php

namespace App\Policies;

use App\Models\BankContract;
use App\Models\User;

class PaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('payment_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BankContract $bankContract): bool
    {
        return $user->hasPermission('payment_view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('payment_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BankContract $bankContract): bool
    {
        return $user->hasPermission('payment_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BankContract $bankContract): bool
    {
        return $user->hasPermission('payment_delete');
    }
}
