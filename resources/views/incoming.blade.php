@extends('main')

@section('content')
    <div class="content incoming-page">
        <h2>Входящий звонок</h2>
        <form action="services" class="incoming-form" method="post">
            @csrf
            <input type="text" class="form-control" placeholder="ФИО" name="name" required>
            <div class="city_block">
                <span>Город</span>
                <select name="city" id="">
                    @foreach($data['cities'] as $city)
                        <option value="{{$city->name}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" class="form-control" placeholder="Адрес" name="address" required>
            <input type="text" class="form-control" placeholder="Телефон" name="phone" required>
            <input type="text" class="form-control" placeholder="Дополнительный телефон" name="phone_sec">
            <div class="call-reason_block">
                <span>Причина звонка</span>
                <select name="call_reason" id="">
                    @foreach($data['call_reasons'] as $callReason)
                        <option value="{{$callReason->id}}">{{$callReason->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" class="form-control" placeholder="Комментарий к звонку" name="comment">
            <button type="submit">Продолжить</button>
            <button type="submit" id="cancel_btn">Отмена заявки</button>
        </form>

    </div>
@endsection
