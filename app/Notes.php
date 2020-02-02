<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $equipe_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $note
 * @property string $type
 * @property Equipe $equipe
 */
class Notes extends Model
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
    protected $fillable = ['equipe_id', 'created_at', 'updated_at', 'note', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }
}
