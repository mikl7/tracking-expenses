@extends('layouts.app')



@section('content')
    <div class=" greeting bg-secondary bg-gradient w-100">
        <div class="container text-center">
            <h1 class="center-block text-white pt-2 ">Отслеживайте свои расходы</h1>
            <a class="btn btn-outline-light btn-lg mt-5" href="{{ route('budgets.index')}}">Перейти в бюджет</a>
        </div>
    </div>
@endsection
