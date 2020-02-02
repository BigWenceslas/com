<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $equipe_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $libelle
 * @property string $listeInstallations
 * @property string $listeResiliations
 * @property string $listeInstances
 * @property string $listeEtudes
 * @property string $type
 * @property string $periode
 * @property Equipe $equipe
 * @property Instance[] $instances
 */
class Derangements extends Model
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
    protected $fillable = ['equipe_id', 'created_at', 'updated_at', 'libelle', 'listeInstallations', 'listeResiliations', 'listeInstances', 'listeEtudes', 'type', 'periode'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instances()
    {
        return $this->hasMany('App\Instance');
    }
}
