<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'empId',
        'name',
        'phone',
        'birth',
        'gander',
        'userId',
        'address',
    ];
    /**
     * The "booting" function of model
     *
     * @return void
     */
    public function details()
    {
        return $this->hasOne(employee_detail::class, 'empId', 'id');
    }
    public function files()
    {
        return $this->hasOne(employee_document::class, 'empId', 'id');
    }
    public function banks()
    {
        return $this->hasOne(employee_bank::class, 'empId', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
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
