<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $imagePath
 * @property integer $prix
 * @property string $created_at
 * @property string $updated_at
 * @property Insurance[] $insurances
 */
class TypeInsurance extends Model
{
    use HasFactory;
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'imagePath', 'prix', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function insurances()
    {
        return $this->hasMany('App\Models\Insurance', 'insurance_type_id');
    }
}
