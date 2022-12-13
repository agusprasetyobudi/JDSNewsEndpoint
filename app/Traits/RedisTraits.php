<?php

namespace App\Traits;

use Illuminate\Support\Facades\Redis;

trait RedisTraits{
    private $expired = 120;
    public function redis_store($table,$data, $exp=null)
    {
        return Redis::set($table,json_encode($data),'EX',$exp ?? $this->expired);
    }

    public function redis_get($table)
    {
        return json_decode(Redis::get($table));
    }

}
