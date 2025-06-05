<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Manufacturer extends Model
{
    //
    use HasFactory;

    protected $table = 'manufacturers';
    protected $fillable = ['name', 'address', 'phone', 'email', 'logo', 'website'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }
}
