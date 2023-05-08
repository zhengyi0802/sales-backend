<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PayMethod extends Enum
{

    const 24Payment     =   1;  // 超商代收(條碼)交易
    const Atm           =   2;  // ATM轉帳
    const CreditCard    =   3;  // 信用卡交易
    const PayCode       =   4;  // 超商代收(代/碼)交易
    const Ship          =   5;  // 超商取貨付款
    const UnionPay      =   6;  // 銀聯卡交易
    const WebAtm        =   7;  // 網路ATM交易
}

