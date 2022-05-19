<?php

namespace App\Enums;

enum ZoneType: string
{
    use EnumToArray;

    case URBANO = 'URBANO';
    case SEMIURBANO = 'SEMIURBANO';
    case RURAL = 'RURAL';
}
