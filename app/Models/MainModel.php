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

        $currentUser = DB::select("SELECT * FROM users WHERE `name`= '$name' AND `address` = '$address' AND `phone` = '$phone' AND `city` = $city");

        if (empty($currentUser)){
            return 1;
        }
        else{
            print('Пользователь уже существует');
            exit();
        }
    }

    public function addService($data)
    {
        $name = $data['name'];
        $city = $data['city_id'];
        $address = $data['address'];
        $phone = $data['phone'];

        $currentUser = DB::select("SELECT * FROM users WHERE `name`= '$name' AND `address` = '$address' AND `phone` = '$phone' AND `city` = $city");
        $userId = $currentUser[0]->id;

        $serviceIds = [];
        if ($data['mobile_service'] != 0){
            array_push($serviceIds, $data['mobile_service']);
        }
        if ($data['home_service'] != 0){
            array_push($serviceIds, $data['home_service']);
        }
        if ($data['home-tv_service'] != 0){
            array_push($serviceIds, $data['home-tv_service']);
        }

        if (!empty($serviceIds)){
            $result = implode(',', $serviceIds);
            $serviceAdd = DB::update("UPDATE `appeal` SET `service_id`= '$result' WHERE `user_id`=$userId");
        }
    }

    public function getGeneralData($data)
    {
        $cityId = $data['city_id'];
        $cityObj = DB::select("SELECT * FROM `cities` WHERE id = $cityId");

        $result['city'] = $cityObj[0];

        if (isset($data['mobile_service']) && $data['mobile_service'] != 0){
            $serviceIds[] = $data['mobile_service'];
        }
        if (isset($data['home_service']) && $data['home_service'] != 0){
            $serviceIds[] = $data['home_service'];
        }
        if (isset($data['home-tv_service']) && $data['home-tv_service'] != 0){
            $serviceIds[] = $data['home-tv_service'];
        }

        if (isset($serviceIds)){
            $serviceIds = implode(',', $serviceIds);
            $services = DB::select("SELECT * FROM `services` WHERE `id` IN ($serviceIds)");
            $result['services'] = $services;
        }

        return $result;
    }
}
