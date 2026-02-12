<?php

namespace App\Policies;

use App\Models\BankContract;
use App\Models\User;

class BankContractPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('bank_contract_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BankContract $bankContract): bool
    {
        return $user->hasPermission('bank_contract_view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('bank_contract_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BankContract $bankContract): bool
    {
        return $user->hasPermission('bank_contract_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BankContract $bankContract): bool
    {
        return $user->hasPermission('bank_contract_delete');
    }
}
