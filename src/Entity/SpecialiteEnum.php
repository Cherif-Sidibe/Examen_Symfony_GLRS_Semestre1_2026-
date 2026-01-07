<?php

namespace App\Entity;

enum SpecialiteEnum: string
{
    case ANALYSE = 'ANALYSE';
    case RADIOGRAPHIE = 'RADIOGRAPHIE';
    case SCANNER = 'SCANNER';
    case GENERALISTE = 'GENERALISTE';
    case OPHTALMOLOGIE = 'OPHTALMOLOGIE';
    case CARDIOLOGIE = 'CARDIOLOGIE';
}
