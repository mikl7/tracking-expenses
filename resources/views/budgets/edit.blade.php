@extends('layouts.app')


@section("content")
    <div class="container p-5">
        <form role="form" method="post" action="{{ route('budgets.update', ['budget'=>$budgets->id]) }}">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label class="h3 pb-4" for="name">Редактировать бюджет на {{$budgets->name}}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Наименование" value="{{ $budgets->name }}">
            </div>
            <div class="form-group">
                <label class="h3 pb-4" for="money">Количество наличных </label>
                <input type="number" name="money" class="form-control" id="money" placeholder="Количество" value="{{ $budgets->money }}">
            </div>
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
    </div>

@endsection
