@extends('layouts.app')


@section("content")

    <div class="container p-5">
        <form action="{{ route('costs.store', $budget) }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="h3 pb-4" for="addExp">Добавить расход</label>
                <input type="text" name="name" class="form-control mb-3" id="addExp" placeholder="Наименование">
                <input type="number" name="money" class="form-control" id="addMoney" placeholder="Наличные">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary mt-3">Добавить</button>
              </div>
        </form>
    </div>

@endsection
