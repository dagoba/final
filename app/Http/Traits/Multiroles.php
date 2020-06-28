<?php

namespace App\Http\Traits;

use App;

trait Multiroles {

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

}