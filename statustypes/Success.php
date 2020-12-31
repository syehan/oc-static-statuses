<?php namespace Sehan\StaticStatuses\StatusTypes;

use Sehan\StaticStatuses\Classes\StatusBase;

class Success extends StatusBase
{
    const ID   = 5;
    const CODE = 'success';

    protected $name  = 'Success';
    protected $color = '#f3c623';
}