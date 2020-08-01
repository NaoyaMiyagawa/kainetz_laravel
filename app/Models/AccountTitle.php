<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountTitle extends Model
{
    # ----------------------------------------------------------------------------
    # Const

    const FORM_A = 1; // 'A : 案件/訪問先, 出発地, 目的地, 往復',
    const FORM_B = 2; // 'B : 案件/相手/人数, 支払先',
    const FORM_C = 3; // 'C : 支払先, 目的/内容',
    const FORM_D = 4; // 'D : 摘要',
}
