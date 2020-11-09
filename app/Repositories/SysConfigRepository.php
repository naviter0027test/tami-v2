<?php

namespace App\Repositories;

use App\SysConfig;
use Exception;

class SysConfigRepository
{
    public function getWatchAmount() {
        $watchAmount = SysConfig::where('sysName', '=', 'watchAmount')
            ->first();
        if(isset($watchAmount->id) == false)
            throw new Exception('watchAmount not in SysConfig, please contact developer');
        return (int) $watchAmount->sysValue;
    }

    public function setWatchAmount($watchAmountValue) {
        $watchAmount = SysConfig::where('sysName', '=', 'watchAmount')
            ->first();
        if(isset($watchAmount->id) == false)
            throw new Exception('watchAmount not in SysConfig, please contact developer');
        $watchAmount->sysValue = $watchAmountValue;
        $watchAmount->save();
    }
}
