<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $equipe_id
 * @property integer $derangement_id
 * @property integer $etude_id
 * @property integer $resiliation_id
 * @property integer $installation_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $libelle
 * @property string $raison
 * @property Derangement $derangement
 * @property Equipe $equipe
 * @property Etude $etude
 * @property Installation $installation
 * @property Resiliation $resiliation
 */
class Instances extends Model
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
    protected $fillable = ['equipe_id', 'derangement_id', 'etude_id', 'resiliation_id', 'installation_id', 'created_at', 'updated_at', 'libelle', 'raison'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function derangement()
    {
        return $this->belongsTo('App\Derangement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function etude()
    {
        return $this->belongsTo('App\Etude');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function installation()
    {
        return $this->belongsTo('App\Installation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resiliation()
    {
        return $this->belongsTo('App\Resiliation');
    }
}
