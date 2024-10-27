<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoRequests extends Model
{
    use HasFactory;
    protected $table = 'info_requests';

    protected $guarded = [];
}
