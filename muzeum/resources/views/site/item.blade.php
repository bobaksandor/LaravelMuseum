@extends('layouts.layout')

@section('title', $item->name)

@section('content')

    <div class="d-flex">
        <h1 class="ps-3 me-auto">{{$item->name}} </h1>
        <p>Megszerezve: {{$item->obtained}}</p>
        {{-- <button class="btn btn-primary mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Szerkesztés">
            <i class="fa-solid fa-pen-to-square fa-fw fa-xl"></i>
        </button>
        <button class="btn btn-primary mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Felhasználók">
            <i class="fa-solid fa-users fa-fw fa-xl"></i>
        </button>
        <button class="btn btn-success mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lezárás">
            <i class="fa-solid fa-check fa-fw fa-xl"></i>
        </button>
        <button class="btn btn-danger mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Törlés">
            <i class="fa-solid fa-trash fa-fw fa-xl"></i>
        </button> --}}
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="text-center table-light">
                <tr>
                    <th style="width: 50%">Leírás</th>
                    <th style="width: 50%">Kép</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>{{$item->description}}</td>
                    <td><img src="{{$item->image}}" alt=""  width="10%" height="10%"></td>
                </tr>
            </tbody>

        </table>
    </div>
        @foreach ($item->labels as $label)
            @if ($label->display == True)
                <span style="background-color:{{$label->color}};">
                    {{$label->name}}
                </span>
                <br>
            @endif
        @endforeach
    <div>

    </div>

    <hr />
    @foreach ($item->comments->sortByDesc('created_at') as $comment)
            <div class="card mb-3">
                <div class="card-header d-flex">
                    <div class="me-auto"><span class="badge bg-secondary">#{{ $loop->index }}</span> | <strong>{{ $comment->user->name }}</strong> | {{ $comment->created_at }}</div>
                    @if ($item->comments->count() == 0)
                        <p>Még nincs hozzászólás</p>
                    @endif
                </div>
                <div class="card-body">
                    {{ $comment->text }}
                </div>
            </div>
        @endforeach
    <hr>
    <h2>Új hozzászólás írása</h2>
    <form>
        <div class="mb-3">
            <textarea class="form-control" name="text" id="text" cols="30" rows="10" placeholder="Hozzászólás..."></textarea>
        </div>
        <div class="mb-3">
            <input type="file" class="form-control" id="file">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Küldés</button>
        </div>
    </form>

@endsection
