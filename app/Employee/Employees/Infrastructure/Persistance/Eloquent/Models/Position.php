<?php

namespace App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models;

use Database\Factories\PositionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_management',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(?array $parameters = [])
    {
        return new PositionFactory($parameters);
    }
}
