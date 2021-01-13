<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string)
 */
class JobModel extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $primaryKey = 'id';
}
