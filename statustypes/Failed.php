<?php namespace Sehan\StaticStatuses\StatusTypes;

use Sehan\StaticStatuses\Classes\StatusBase;

class Failed extends StatusBase
{
    const ID   = 3;
    const CODE = 'failed';

    protected $name  = 'Failed';
    protected $color = '#f3c623';
}