@extends('admin.layouts.general')

@section('page')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Song</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{ route('admin.song.add') }}">
                <button class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Add</button>
            </a>
            <table class="table table-borderless" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="w-75">Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $song)
                        <tr>
                            <td><h4>{{ $song->name }}</h4></td>
                            <td>
                                <a 
                                href="{{ route('admin.song.read', [
                                    'date' => \Carbon\Carbon::parse($song->created_at)->format('dmYHis'),
                                    'id' => str_pad($song->id, 12, '0', STR_PAD_LEFT),
                                    'title' => $song->name
                                    ]) }}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                </a>
                                <a 
                                href="{{ route('admin.song.edit', [
                                    'date' => \Carbon\Carbon::parse($song->created_at)->format('dmYHis'),
                                    'id' => str_pad($song->id, 12, '0', STR_PAD_LEFT),
                                    'title' => $song->name
                                    ]) }}" class="btn btn-success">
                                        <i class="fas fa-pen-square"></i>
                                </a>
                                <a href="{{ route('admin.song.delete', ['id' => str_pad($song->id, 12, '0', STR_PAD_LEFT)]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection