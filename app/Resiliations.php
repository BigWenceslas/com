<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $equipe_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $numero
 * @property string $raison
 * @property string $date
 * @property Equipe $equipe
 * @property Instance[] $instances
 */
class Resiliations extends Model
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
    protected $fillable = ['equipe_id', 'created_at', 'updated_at', 'numero', 'raison', 'date'];

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
