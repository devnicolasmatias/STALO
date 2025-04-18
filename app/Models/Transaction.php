<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'value',
        'cpf',
        'document_path',
        'status',
        'user_id',
    ];
}
