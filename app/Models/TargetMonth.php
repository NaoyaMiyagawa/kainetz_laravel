<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetMonth extends Model
{
    # ----------------------------------------------------------------------------
    # Const

    const STATUS_APPLIED = 1;
    const STATUS_CLOSED = 2;
    const STATUS_CONFIRMED = 3;
}
