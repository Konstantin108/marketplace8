<?php declare(strict_types=1);

namespace App\Enums;

class StatusEnum
{
    public const ORDER_AWAITING = 'ожидает подтверждения';
    public const ORDER_ASSEMBLY = 'сборка заказа';
    public const ORDER_IN_THE_WAY = 'заказ в пути';
    public const ORDER_ON_POINT = 'заказ ожидает выдачи';
    public const ORDER_IS_DONE = 'заказ выполнен';
    public const ORDER_CANCELLED = 'заказ отменён';
}
