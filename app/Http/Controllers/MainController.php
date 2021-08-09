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

    public function servicesPage(Request $request){
        $valid = $request->validate([
            'name' => 'required|min:3',
            'address' => 'required|min:25',
            'phone' => 'required|digits:value',
            'comment' => 'max:250'
        ]);

        if ($_POST['call_reason'] == 1 || $_POST['call_reason'] == 2){  // если подключение или смена тарифа
            $model = new MainModel();

            $data['name'] = $request->name;
            $data['city_id'] = $request->city;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['phone_sec'] = $request->phone_sec;
            $data['call_reason'] = $request->call_reason;
            $data['comment'] = $request->comment;

            $model->appealRegistration($data);

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
            return view('handling');
        }
    }

    public function generalPage(Request $request)
    {
        $model = new MainModel();
        $rqData = $request->all();

        $model->addService($rqData);

        $data['user_data'] = $rqData;
        $data['service_data'] = $model->getGeneralData($rqData);

        return view('general', ['data' => $data]);
    }

    public function handlingPage()
    {
        return view('handling');
    }

    public function cancelPage()
    {
        return view('cancel');
    }

}
