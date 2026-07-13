<?php

namespace App\Traits;

trait HasKode
{
    protected static function bootHasKode()
    {
        static::creating(function ($model) {

            $prefix = $model->prefix;
            $field  = $model->kodeField;

            $last = static::orderBy('id', 'desc')->first();

            if ($last && !empty($last->$field)) {

                $lastNumber = (int) substr($last->$field, strlen($prefix));
                $next = $lastNumber + 1;
            } else {

                $next = 1;
            }

            if (empty($model->$field)) {
                $model->$field = $prefix . str_pad($next, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}
