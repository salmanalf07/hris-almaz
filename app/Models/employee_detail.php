<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class employee_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'empId',
        'levelId',
        'deptId',
        'joinDate',
        'typeEmployeeId',
        'status',
        'contractNo',
        'contractSt',
        'contrcatEd',
    ];
    /**
     * The "booting" function of model
     *
     * @return void
     */
    public function levels()
    {
        return $this->hasOne(level::class, 'levelId', 'id');
    }
    public function departments()
    {
        return $this->hasOne(department::class, 'deptId', 'id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
