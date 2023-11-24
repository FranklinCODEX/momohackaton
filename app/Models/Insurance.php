<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $insurance_type_id
 * @property string $date_limite
 * @property string $insuranceFrequency
 * @property string $insuranceDuration
 * @property string $renouvellement
 * @property string $dateRenouvellement
 * @property string $dateDebutContrat
 * @property string $fullName
 * @property string $email
 * @property string $phoneNumber
 * @property string $birthday
 * @property string $profession
 * @property string $statutionMatrimoniale
 * @property string $cardID
 * @property string $revenuAnnuel
 * @property string $created_at
 * @property string $updated_at
 * @property TypeInsurence $typeInsurence
 */
class Insurance extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['insurance_type_id', 'date_limite', 'insuranceFrequency', 'insuranceDuration', 'renouvellement', 'dateRenouvellement', 'dateDebutContrat', 'fullName', 'email', 'phoneNumber', 'birthday', 'profession', 'statutionMatrimoniale', 'cardID', 'revenuAnnuel', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeInsurence()
    {
        return $this->belongsTo('App\Models\TypeInsurence', 'insurance_type_id');
    }
}
