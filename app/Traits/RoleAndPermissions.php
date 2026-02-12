<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait RoleAndPermissions
{
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }

    public function rolePermissions(): BelongsToMany
    {
        return $this->role->permissions();
    }

    public function addPermission(string|Permission $permission)
    {
        $permission = $permission instanceof Permission
            ? $permission
            : Permission::byCode($permission);

        if (!$this->permissions->contains($permission))
            $this->permissions()->attach($permission->id);

        return $this;
    }

    public function removePermission(string|Permission $permission)
    {
        $permission = $permission instanceof Permission
            ? $permission
            : Permission::byCode($permission);

        $this->permissions()->detach($permission->id);

        return $this;
    }

    public function hasPermission(string|Permission $permission): bool
    {
        $permission = $permission instanceof Permission
            ? $permission
            : Permission::byCode($permission);


        return $this->role !== null
            ? $this->permissions->merge($this->rolePermissions)->contains($permission)
            : $this->permissions->contains($permission);
    }
}
