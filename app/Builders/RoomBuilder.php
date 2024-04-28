<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class RoomBuilder extends Builder
{
    public function search()
    {
        return $this->when(request('search'), function($query, $search) {
            $query->whereRaw('LOWER(name) like ?', '%' . strtolower($search) . '%');
        });
    }

    public function filterType()
    {
        return $this->when(request('type'), function($query, $type) {
            $query->where(compact('type'));
        });
    }
}
