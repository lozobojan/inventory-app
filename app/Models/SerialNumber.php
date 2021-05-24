<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getIsUsedAttribute(){
        return DocumentItem::query()
                ->where('equipment_id', '=', $this->equipment_id)
                ->where('serial_number', '=', $this->serial_number)
                ->where('return_date', '=', null)
                ->count() > 0;
    }

}
