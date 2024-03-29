<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liquidaction extends Model
{
    //
    protected $table = 'liquidactions';
    
    protected $fillable = [
        'iduser', 'total', 'monto_bruto', 'feed', 'hash',
        'wallet_used', 'status', 'code_correo', 'fecha_code'
    ];

    /**
     * Permite la informacion del usuario que se esta liquidando
     *
     * @return void
     */
    public function getUserLiquidation()
    {
        return $this->belongsTo('App\Models\User', 'iduser', 'id');
    }

    /**
     * Permite obtener la informacion de obtener los comentarios sobre la liquidacion
     *
     * @return void
     */
    public function getLogLiquidation()
    {
        return $this->hasMany('App\Models\LogLiquidation', 'idliquidation');
    }

}
