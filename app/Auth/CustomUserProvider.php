<?php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomUserProvider extends EloquentUserProvider
{
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
            (count($credentials) === 1 &&
                array_key_exists('ususenha', $credentials))) {
            return;
        }

        $query = $this->createModel()->newQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'ususenha')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }


    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['ususenha'];

        return $this->codif($plain) === $user->getAuthPassword();
    }

    public function codif($string) {
        $var = "";
        for ($n = 0; $n < strlen($string); $n++) {
            $var .= chr(ord(substr($string, $n, 1)) - 20);
        }
        return strrev($var);
    }

    public function decodif($string) {
        $var = "";
        for ($n = 0; $n < strlen($string); $n++) {
            $var .= chr(ord(substr($string, $n, 1)) + 20);
        }
        return strrev($var);
    }


}
