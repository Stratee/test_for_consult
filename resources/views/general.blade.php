@extends('main')

@section('content')
    <div class="general-page content">
        <h2>Сводная страница</h2>
        <h4>Информация о пользователе</h4>
        <div class="user-wrapper">
            <table>
                <tr>
                    <td>ФИО</td>
                    <td>{{$data['user_data']['name']}}</td>
                </tr>
                <tr>
                    <td>Адрес</td>
                    <td>{{$data['service_data']['city']->name . ', ' . $data['user_data']['address']}}</td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td>{{$data['user_data']['phone']}}</td>
                </tr>
                <tr>
                    <td>Подключить тарифы</td>
                    @foreach($data['service_data']['services'] as $service)
                        <td>{{$service->description}}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <div class="cancel-wrapper">
            <a href="handling"><button type="submit">Продолжить</button></a>
            <a href="cancel"><button type="submit" id="cancel_btn">Отмена заявки</button></a>
        </div>
    </div>
@endsection
