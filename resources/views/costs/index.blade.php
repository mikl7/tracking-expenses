@extends('layouts.app')

@section('content')
<div class="bg-secondary">
    <div class="container pt-5 pb-5">
        <div class="addExp row">
            <p class="text-white h3 col-3 pt-2">Добавить расходы:</p>
            <a href="{{ route("costs.create", ['budget'=>$budget]) }}">
                <button type="button" class="btn btn-light">
                    <i class="bi bi-plus h3"></i>
                </button>
            </a>
        </div>
        <table class="table text-white ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Расходы</th>
                <th scope="col">Наличные</th>
                <th scope="col">Время редактирования</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
              </tr>
            </thead>
            <tbody>

                @foreach($cost as $cos)
                    <tr>

                        <td scope="col">
                            {{$loop->iteration + $cost->firstItem() - 1}}
                        </td>
                        <td scope="col">{{$cos->name}}</td>
                        <td scope="col">{{$cos->money}}</td>
                        <td scope="col">{{$cos->created_at}}</td>
                        <td scope="col">
                            <a href="{{ route('costs.edit',['budget'=>$budget, 'cost'=>$cos]) }}">
                                <i class="bi bi-pencil-square h2 pl-4 "></i>
                            </a>
                        </td>
                        <td scope="col">
                            <form action="{{route('costs.destroy', ['budget'=>$budget, 'cost' =>$cos->id]) }}" method="post">
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
        {{ $cost->links() }}
    </div>
</div>


@endsection
