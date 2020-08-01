<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    # ----------------------------------------------------------------------------
    # Const

    const STATUS_APPLIED    = 1;    // 申請中
    const STATUS_CLOSED     = 2;    // 締め
    const STATUS_CONFIRMED  = 3;    // 確定
    const STATUS_RETURNED   = 4;    // 差し戻し
}
