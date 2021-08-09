@extends('main')

@section('content')
    <div class="content cancel-page">
        <h2>Отмена заявки</h2>
        <form action="handling" class="cancel-form">
            <h5>Причина отмены</h5>
            <select name="cancel_reason">
                <option value="">Не устраивает скорость</option>
                <option value="">Слишком дорого</option>
                <option value="">Другое</option>
            </select>
            <textarea rows="7" name="comment" placeholder="Комментарий"></textarea>
        </form>
        <a href="handling"><button type="submit">Продолжить</button></a>
    </div>
@endsection
