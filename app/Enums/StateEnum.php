<?php
// Enums/StateEnum.php

namespace App\Enums;

enum OrderStatus: string
{
    case SUCCESS = 'succès';
    case ECHEC = 'échec';
}
