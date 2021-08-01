<?php

namespace App\Http\Controllers;

use App\Models\MainModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function meetPage(){
        return view('meet');
    }

    public function incomingPage(){
        $model = new MainModel();

        $cities = $model->getCitiesList();
        $callReasons = $model->getCallReasonsList();

        $data['cities'] = $cities;
        $data['call_reasons'] = $callReasons;

        return view('incoming', ['data' => $data]);
    }

    public function servicesPage(){
        if ($_POST['call_reason'] == 1 || $_POST['call_reason'] == 2){  // если подключение или смена тарифа
            $model = new MainModel();
            $services = $model->getServicesList();

            foreach ($services as $service){
                switch ($service->type){
                    case 'mobile':
                        $data['mobile'][] = $service;
                        break;
                    case 'home':
                        $data['home'][] = $service;
                        break;
                    case 'home+tv':
                        $data['home_tv'][] = $service;
                        break;
                }
            }
            return view('services', ['data' => $data]);
        }
        else{
            return view('another');
        }
    }
}
