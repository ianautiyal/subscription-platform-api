<?php

namespace App\Support\Models;

/**
 * Searchable
 */
trait Searchable
{
    public function scopeSearch($query, $keyword)
    {
        foreach (array_diff($this->fillable, $this->hidden) as $column) {
            $query->orWhere($column, 'LIKE', "%{$keyword}%");
        }

        return $query;
    }
}
