<?php namespace Sehan\StaticStatuses\Interfaces;

interface StatusInterface {
    public function statusDetails();
    public function getName();
    public function getCode();
    public function getColor();
}