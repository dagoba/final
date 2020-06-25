<?php

namespace App\Http\Traits;

use App;

trait Multiroles {

    public function hasRole($role)
    {
        $roles = $this->roles()->where('name', $role)->count();
            if ($roles == 1)
            {
                return true;
            }
        return false;
    }

}