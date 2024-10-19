<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'format',
        'version',
        'size',
        'year',
        'description',
        'modified_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'modified_by');
    }

}
