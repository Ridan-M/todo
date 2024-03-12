<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status'];
    protected $attributes = ['status' => 0];

    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_COMPLETED = 2;

    static function getStatus(string $status): string {

        return constant('App\Models\Task::STATUS_' . strtoupper($status));
    }

}
