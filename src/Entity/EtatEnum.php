<?php

namespace App\Entity;

enum EtatEnum: string
{
    case EN_ATTENTE = 'EN_ATTENTE';
    case VALIDE = 'VALIDE';
    case ANNULE = 'ANNULE';
}
