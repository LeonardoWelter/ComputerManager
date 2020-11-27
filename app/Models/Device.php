<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Device extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'devices';

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
        'serial',
        'oem',
        'model',
        'cpu',
        'ram',
        'storage',
        'psu',
        'mac',
        'name',
        'os',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    public $sortable = [
        'serial',
        'model',
        'oem',
        'name'
    ];

}
