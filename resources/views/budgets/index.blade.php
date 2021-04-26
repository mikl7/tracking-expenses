@extends('layouts.app')

@section('content')
<div class="bg-secondary">
    <div class="container pt-5 pb-5">
        <div class="addExp row">
            <p class="text-white h3 col-3 pt-2">Добавить бюджет:</p>
            <a href="{{ route("budgets.create") }}">
                <button type="button" class="btn btn-light">
                    <i class="bi bi-plus h3"></i>
                </button>
            </a>
        </div>
        <table class="table text-white ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Бюджет</th>
                <th scope="col">Наличные</th>
                <th scope="col">Время редактирования</th>
                <th scope="col">Просмотреть</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
              </tr>
            </thead>
            <tbody>
                @foreach($user->budgets as $bud)
                        <tr>
                            <td scope="col">
                                {{$loop->iteration + $budget->firstItem() - 1}}
                            </td>
                            <td scope="col">{{$bud->name}}</td>
                            <td scope="col">{{$bud->costs->sum('money')}}</td>
                            <td scope="col">{{$bud->created_at}}</td>
                            <td scope="col">
                                <a href="{{ route('costs.index',['budget'=>$bud->id]) }}">
                                    <i class="bi bi-eye h2 pl-4 "></i>
                                </a>
                            </td>
                            <td scope="col">
                                <a href="{{ route('budgets.edit',['budget'=>$bud->id]) }}">
                                    <i class="bi bi-pencil-square h2 pl-4 "></i>
                                </a>
                            </td>
                            <td scope="col">
                                <form action="{{ route('budgets.destroy', ['budget'=>$bud->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">
                                        <i class="bi bi-x-square h2 text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        {{ $budget->links() }}
    </div>
</div>


@endsection
