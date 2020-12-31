<?php namespace Sehan\StaticStatuses\StatusTypes;

use Sehan\StaticStatuses\Classes\StatusBase;

class Pending extends StatusBase
{
    const ID   = 4;
    const CODE = 'pending';

    protected $name  = 'Pending';
    protected $color = '#f3c623';
}