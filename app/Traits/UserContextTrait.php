<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait UserContextTrait
{
    public function getUserRole()
    {
        return Auth::user()?->getRoleNames()?->first();
    }

    public function getUserTienda()
    {
        return Auth::user()
            ?->tiendasAsignadas()
            ->with('tienda')
            ->first()
            ?->tienda;
    }

}
