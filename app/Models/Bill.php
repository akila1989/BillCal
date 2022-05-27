<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','units','cost'];

    const BILL_TYPE = 'Mobile Bills';
    const BASE_UNIT_VAL = 0;
    const BASE_COST_VAL = 0;

    const FIRST_COST = 2.5;
    const SECOND_COST = 6;
    const THIRED_COST = 7.2;
    const FINAL_COST = 8.5;

    const FIRST_UNIT_SLOT = 80;
    const SECOND_UNIT_SLOT = 200;
    const THIRED_UNIT_SLOT = 200;
    const FINAL_UNIT_SLOT = 480;


    public static function calculateBill($units){

        try{
            $calculatedCost = 0;
            if($units <= Bill::FIRST_UNIT_SLOT){
                $calculatedCost = $units * Bill::FIRST_COST;
            }
            else if($units > Bill::FIRST_UNIT_SLOT && $units <= Bill::FIRST_UNIT_SLOT + Bill::SECOND_UNIT_SLOT){
                $remainingUnits = $units - Bill::FIRST_UNIT_SLOT;
                $calculatedCost =  (Bill::FIRST_UNIT_SLOT * Bill::FIRST_COST) + ($remainingUnits * Bill::SECOND_COST);
            }
            else if($units > Bill::FIRST_UNIT_SLOT + Bill::SECOND_UNIT_SLOT && $units <= Bill::FIRST_UNIT_SLOT + Bill::SECOND_UNIT_SLOT + Bill::THIRED_UNIT_SLOT){
                $remainingUnits = $units - (Bill::SECOND_UNIT_SLOT + Bill::FIRST_UNIT_SLOT);
                $calculatedCost =  (Bill::FIRST_UNIT_SLOT * Bill::FIRST_COST) + (Bill::SECOND_UNIT_SLOT * Bill::SECOND_COST) + ($remainingUnits * Bill::THIRED_COST);
            }
            else{
                $remainingUnits = $units - (Bill::THIRED_UNIT_SLOT + Bill::SECOND_UNIT_SLOT + Bill::FIRST_UNIT_SLOT);
                $calculatedCost = (Bill::FIRST_UNIT_SLOT * Bill::FIRST_COST) + (Bill::SECOND_UNIT_SLOT * Bill::SECOND_COST) + (Bill::THIRED_UNIT_SLOT * Bill::THIRED_COST) + ($remainingUnits * Bill::FINAL_UNIT_SLOT);
            }
            return $calculatedCost;
        }
        catch(Exception $ex){
            return $ex;
        }
    }
}
