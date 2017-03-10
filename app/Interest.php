<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;


class Interest extends Model
{
    protected $table = "interests";
    
    protected $fillable = ['batch_name','listing_id','state','unit_no','street_no','street_no_suffix',
                        'street_name','street_ext','street_direction','suburb','post_code',
                        'property_type','sale_type','sold_price','contract_date','settlement_date',
                        'agency_name','bedroom','bathroom','car','status'];
    
    protected $dates = ['contract_date'];
    
    public function setContractDateAttribute($date){
        if($date !== ''){
            $this->attributes['contract_date'] = Carbon::createFromFormat('d/m/Y',$date);
        } else {
            $this->attributes['contract_date'] = null;
        }

    }
    
    public function getContractDateAttribute($value){
        return $value !== null ? Carbon::parse($value)->format('d/m/Y') : '';
    }
    
    public function setSettlementDateAttribute($date){
        $this->attributes['settlement_date'] = null;
    }
    
    public function setPostCodeAttribute($value){
        return $value !== null ? $value : '';
    }

    public function setAddressAttribute(){
        return "hello";
    }


    /**
     * Relationship to Batch
     */
    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }
    
    public function user_logs()
    {
        return $this->hasMany('App\UserLog','record_id');
    }
    
    
}
