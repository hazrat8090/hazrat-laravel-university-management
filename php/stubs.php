<?php

namespace Illuminate\Support\Facades {
    /**
     * @method static \Illuminate\Contracts\Auth\Access\Gate define(string $ability, callable|string $callback)
     * @method static \Illuminate\Contracts\Auth\Access\Gate resource(string $name, string $class, array $abilities = null)
     * @method static \Illuminate\Contracts\Auth\Access\Gate policy(string $class, string $policy)
     * @method static \Illuminate\Contracts\Auth\Access\Gate before(callable $callback)
     * @method static \Illuminate\Contracts\Auth\Access\Gate after(callable $callback)
     * @method static bool hasRole(string $role)
     * @method static bool hasPermissionTo(string $permission)
     */
    class Gate
    {
    }
}

namespace Spatie\Permission\Traits {
    /**
     * @method bool hasRole(string|int|\Spatie\Permission\Contracts\Role $roles, string $guard = null)
     * @method bool hasPermissionTo(string|int|\Spatie\Permission\Contracts\Permission $permission, string $guard = null)
     */
    trait HasRoles
    {
    }
}
