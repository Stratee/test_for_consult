@extends('main')

@section('content')
    <div class="content incoming-page">
        <h2>Входящий звонок</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="services" class="incoming-form" method="post">
            @csrf
            <input type="text" class="form-control" placeholder="ФИО" name="name" required>
            <div class="city_block">
                <span>Город</span>
                <select name="city" id="">
                    @foreach($data['cities'] as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
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
        </form>
        <a href="cancel"><button type="submit" id="cancel_btn">Отмена заявки</button></a>
    </div>
@endsection
