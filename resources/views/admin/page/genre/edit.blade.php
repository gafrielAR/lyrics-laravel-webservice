@extends('admin.layouts.general')

@section('page')
<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="jumbotron jumbotron-fluid row" method="post" action="{{ route('admin.genre.update', ['id' => str_pad($data->id, 12, '0', STR_PAD_LEFT)]) }}">
        @csrf
        <div class="container">
            <input 
                id="name"
                type="text"
                name="name"
                class="display-3"
                placeholder="Genre Name"
                value="{{ old('name') ? old('name') : $data->name }}"
                required>
        </div>
        <div class="dropdown no-arrow mb-4 mr-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                <input class="dropdown-item" type="submit" value="save">
                <a href="{{ route('admin.genre.list') }}" class="dropdown-item">back</a>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->
@endsection