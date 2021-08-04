@extends('main')

@section('content')
    <div class="content services-page">
        <h2>Тарифы и услуги</h2>
        <form action="general" method="post">
            @csrf
            <div class="offer-wrapper">
                <div class="offer">
                    <h4>Мобильный интернет</h4>
                    <select name="mobile_service" id="">
                        <option value="0">Мобильные тарифы</option>
                        @foreach($data['mobile'] as $mobile)
                            <option value="{{$mobile->id}}">{{$mobile->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="offer">
                    <h4>Домашний интернет</h4>
                    <select name="home_service" id="">
                        <option value="0">Домашние тарифы</option>
                        @foreach($data['home'] as $home)
                            <option value="{{$home->id}}">{{$home->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="offer">
                    <h4>Интернет+ТВ</h4>
                    <br>
                    <select name="home-tv_service" id="">
                        <option value="0">Домашние тарифы + ТВ</option>
                        @foreach($data['home_tv'] as $hometv)
                            <option value="{{$hometv->id}}">{{$hometv->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="name" value="{{$data['name']}}">
            <input type="hidden" name="city_id" value="{{$data['city_id']}}">
            <input type="hidden" name="address" value="{{$data['address']}}">
            <input type="hidden" name="phone" value="{{$data['phone']}}">
            <button type="submit">Продолжить</button>
        </form>
        <a href="cancel"><button type="submit" id="cancel_btn">Отмена заявки</button></a>
    </div>
@endsection
