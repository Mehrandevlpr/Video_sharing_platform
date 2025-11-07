<?php

namespace App\Filters\VideoFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class VideoFilter
{


    /**
     * The constructor initializes an object with a Builder instance as a parameter.
     * @params Builder 
     */
    public function __construct(public Builder $builder)
    {
       
    }


    /**
     * The function "apply" in PHP takes an array of parameters as input.
     * 
     * @param array params that apply function that takes an array as a parameter
     */
    public function apply(array $params)
    {
        foreach ($params as $methodName => $value) {
            if (is_null($value) && method_exists(self::class, $methodName)) continue;
            $this->$methodName($value);
        }

    }


    public function sortBy($value)
    {
        if ($value === 'length') {
            $this->builder->orderBy('length', 'desc');
        }
        if ($value === 'created_at') {
            $this->builder->orderBy('created_at', 'desc');
        }

        if ($value === 'like') {
            $this->builder->leftJoin('likes', function ($join) {
                $join->on('likes.likeable_id', '=', 'videos.id')
                    ->where('likes.likeable_type', '=', 'App\Models\Video')
                    ->where('likes.vote', '=', 1);
            })
                ->groupBy('videos.id')
                ->select(['videos.*', DB::raw('count(likes.id) as count')])
                ->orderBy('count', 'desc');
        }
    }

    public function length($value)
    {
        if ((int)$value === 1) {
            $this->builder->where('length', '<', 60);
        }
        if ((int)$value === 2) {
            $this->builder->whereBetween('length', [60, 300]);
        }
        if ((int)$value  === 3) {
            $this->builder->where('length', '>', 300);
        }
    }

    public function q($value)
    {
        $this->builder->where('name', 'like', "%{$value}%")->orWhereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%']);
    }
}
