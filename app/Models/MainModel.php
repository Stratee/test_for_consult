<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainModel extends Model
{
    use HasFactory;

    public function getCitiesList()
    {
        $cities = DB::select("SELECT * FROM cities");
        return $cities;
    }

    public function getCallReasonsList()
    {
        $callReasons = DB::select("SELECT * FROM call_reasons");
        return $callReasons;
    }

    public function getServicesList()
    {
        $callReasons = DB::select("SELECT * FROM services");
        return $callReasons;
    }
}
