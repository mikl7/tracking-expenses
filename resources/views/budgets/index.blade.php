@extends('layouts.app')

@section('content')
<div class="bg-secondary">
    <div class="container pt-5 pb-5">
        <table class="table text-white ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Бюджет</th>
                <th scope="col">Наличные</th>
                <th scope="col">Время редактирования</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
              </tr>
            </thead>
            <tbody>
                @foreach($budgets as $budget)
                    <tr>
                        <td scope="col">{{$budget->id}}</td>
                        <td scope="col">{{$budget->name}}</td>
                        <td scope="col">{{$budget->money}}</td>
                        <td scope="col">{{$budget->created_at}}</td>
                        <td scope="col">
                            <a href="{{ route('budgets.edit',['budget'=>$budget->id]) }}">
                                <i class="bi bi-pencil-square h2 pl-5 "></i>
                            </a>
                        </td>
                        <td scope="col">
                            <form action="{{ route('budgets.destroy', ['budget'=>$budget->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <i class="bi bi-x-square h2 text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="addExp row">
            <p class="text-white h3 col-3 pt-2">Добавить бюджет:</p>
            <a href="{{ route("budgets.create") }}">
                <button type="button" class="btn btn-light">
                    <i class="bi bi-plus h3"></i>
                </button>
            </a>
        </div>
    </div>
</div>


@endsection
