<?php namespace Sehan\StaticStatuses\StatusTypes;

use Sehan\StaticStatuses\Classes\StatusBase;

class Cancelled extends StatusBase
{
    const ID   = 1;
    const CODE = 'cancelled';

    protected $name  = 'Cancelled';
    protected $color = '#f3c623';
}