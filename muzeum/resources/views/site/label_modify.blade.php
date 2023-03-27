@extends('layouts.layout')

@section('title', 'Címke módosítása')

@section('content')

@foreach ($labels as $label)
    <span style="background-color:{{$label->color}};">
        {{$label->name}}
    </span>
    <a href="{{route('listItems', ['id' => $label->id])}}">Listáz</a>
    <a href="{{route('changeItems', ['id' => $label->id])}}">Módosít</a>
    <a href="">Töröl</a>
    <br>
@endforeach

@endsection
