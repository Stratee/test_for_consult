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

    public function appealRegistration($data)
    {
        $name = $data['name'];
        $city = $data['city_id'];
        $address = $data['address'];
        $phone = $data['phone'];
        $phoneSec = isset($data['phone_sec']) ? $data['phone_sec'] : '';
        $callReason = $data['call_reason'];
        $comment = $data['comment'];

        $this->checkUserUnique($data);
        $userInsert = DB::insert("INSERT INTO `users`(`name`, `address`, `phone`, `phone_add`, `city`)
                                        VALUES ('$name','$address','$phone','$phoneSec','$city')");
        $currentUser = DB::select("SELECT DISTINCT * FROM users WHERE `name`= '$name' AND `address` = '$address' AND `phone` = '$phone' AND `city` = $city");
        $userId = $currentUser[0]->id;
        $appealInsert = DB::insert("INSERT INTO `appeal`(`user_id`, `comment`, `reason_id`) VALUES ($userId, '$comment', $callReason)");
    }

    public function checkUserUnique($data)
    {
        $name = $data['name'];
        $city = $data['city_id'];
        $address = $data['address'];
        $phone = $data['phone'];

        $currentUser = DB::select("SELECT DISTINCT * FROM users WHERE `name`= '$name' AND `address` = '$address' AND `phone` = '$phone' AND `city` = $city");

        if (empty($currentUser)){
            return 1;
        }
        else{
            print('Пользователь уже существует');
            exit();
        }
    }
}
