<?php namespace Sehan\StaticStatuses\Classes;

use Sehan\StaticStatuses\Interfaces\StatusInterface;

abstract class StatusBase implements StatusInterface
{
    CONST ID   = null;
    CONST CODE = null;

    protected $name, $code, $color;

    /**
     * {@inheritDoc}
     */
    public function statusDetails()
    {
        return [
            'name'        => $this->getName(),
            'description' => sprintf('This is %s Status', $this->getName()) 
        ];
    }

    public function getName($lang = 'EN')
    {
        return $this->name;
    }

    public function getCode()
    {
        return static::CODE;
    }

    public function getColor()
    {
        return $this->color;
    }
}