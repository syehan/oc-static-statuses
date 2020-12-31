<?php namespace Sehan\StaticStatuses\Traits;

use Carbon\Carbon;

trait Statusable
{
    /**
     * Boot the Statusable trait for a model
     *
     * @return void
     */
    public static function bootStatusable()
    {

    }

    public function scopeFilterByStatus($query, array $param)
    {
        extract($param);
    }
}