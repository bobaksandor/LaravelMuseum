@extends('layouts.layout')

@section('title', 'Open Items')

@section('content')
    <h1 class="ps-3">Kiállított tárgyak</h1>
    <hr />
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="text-center table-light">
                <tr>
                    <th style="width: 10%">Név</th>
                    <th style="width: 50%">Leírás</th>
                    <th style="width: 30%">Kép</th>
                    <th style="width: 10%">Gomb</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($items as $item)
                    <tr class="table-danger">
                        <td>
                            <a href="{{ route('items.show', ['item' => $item->id]) }}">{{$item->name}}</a>
                        </td>
                        <td>
                            <p>{{$item->description}}</p>
                        </td>
                        <td>
                            <img src="{{$item->image}}" alt="" width="50%" height="50%">
                        </td>
                        <td>
                            <a class="btn btn-outline-secondary" href="{{ route('items.show', ['item' => $item->id]) }}">
                                <i class="fa-solid fa-angles-right fa-fw"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
