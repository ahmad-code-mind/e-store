<?php

use Hashids\Hashids;
if(!function_exists('hashid_encode')){
    function hashid_encode($value)
    {
        $hashids = new Hashids(config('app.key'), 10);
        return $hashids->encode($value);
    }
}
if(!function_exists('hashid_decode')){
    function hashid_decode($value)
    {
        $hashids = new Hashids(config('app.key'), 10);
        $decoded = $hashids->decode($value);
        return $decoded[0] ?? null;
    }
}