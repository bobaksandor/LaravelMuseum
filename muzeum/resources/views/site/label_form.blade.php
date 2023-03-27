@extends('layouts.layout')

@section('title', 'Új címke')

@section('content')

    <h1 class="ps-3">Új címke</h1>
        <hr />
        <form method="post" action="
        @if (isset($label))
            {{route('change', ['id' => $label->id])}}">
        @else
            {{route('newlabel')}}">
        @endif
            @csrf
            @if (isset($label))
                @method('put')
                <div class="mb-3">
                    <p>Név:</p>
                    <input type="text" id="name" name="name" max="30" placeholder="{{$label->name}}">
                </div>
                <div class="mb-3">
                    <p>Látható?</p>
                    <input type="checkbox" id="display" name="display" value="Yes"
                    @if ($label->display)
                        checked
                    @endif>
                </div>
                <div class="row">
                    <p>Szín:</p>
                    <input type="text" id="color" name="color" size="10" maxlength="10" width="1" placeholder="{{$label->color}}">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Mentés</button>
                </div>

            @else
                <div class="mb-3">
                    <p>Név:</p>
                    <input type="text" id="name" name="name" max="30">
                </div>
                <div class="mb-3">
                    <p>Látható?</p>
                    <input type="checkbox" id="display" name="display" value="Yes" />
                </div>
                <div class="row">
                    <p>Szín:</p>
                    <input type="text" id="color" name="color" size="10" maxlength="10" width="1">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Mentés</button>
                </div>
            @endif
        </form>

@endsection
