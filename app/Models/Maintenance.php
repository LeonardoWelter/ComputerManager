<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Maintenance extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'maintenances';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_id',
        'type',
        'subtype',
        'description',
        'comments',
        'user_id',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    public $sortable = [
        'device_id',
        'type',
        'subtype',
        'created_at'
    ];
}
