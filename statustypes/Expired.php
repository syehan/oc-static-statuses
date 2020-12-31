<?php namespace Sehan\StaticStatuses\StatusTypes;

use Sehan\StaticStatuses\Classes\StatusBase;

class Expired extends StatusBase
{
    const ID   = 2;
    const CODE = 'expired';

    protected $name  = 'Expired';
    protected $color = '#f3c623';
}