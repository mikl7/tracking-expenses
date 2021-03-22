@extends('layouts.app')


@section("content")

    <div class="container p-5">
        <form action="{{ route('budgets.store', 'budget' ) }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="h3 pb-4" for="addExp">Добавить бюджет</label>
                <input type="text" name="name" class="form-control" id="addExp" placeholder="Наименование">
                <input type="number" name="money" class="form-control mt-3" id="addMoney" placeholder="Наличные">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Добавить</button>
        </form>
    </div>

@endsection
