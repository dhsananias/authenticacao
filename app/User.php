<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'WARELINE.tblusu';
    protected $primaryKey = 'usucod';
    public function username()
    {
        return 'usunome';
    }
    public function getAuthPassword(){
        return $this->ususenha;
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
    protected $fillable = [
        'usunome', 'ususenha', 'status', 'acessos', 'origem', 'NOME', 'codger', 'nome', 'senhamaster', 'origem2', 'coduni', 'provisoria', 'codvend', 'situacao', 'modulo'
    ];
}
