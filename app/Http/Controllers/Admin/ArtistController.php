<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artist;

class ArtistController extends Controller
{
    public function list() {
        $data = [
            'data' => Artist::get()
        ];

        return view('admin.page.artist.list', $data);
    }

    public function read() {
        if (request('id')) {
            $artist = Artist::find(request('id'));
        } else {
            $artist = [];
        };

        $data = [
            'data' => $artist,
        ];

        return view('admin.page.artist.read', $data);
    }

    public function add()
    {
        $data = [
            'data' => null
        ];

        return view('admin.page.artist.add', $data);
    }

    public function edit() {
        if (request('id')) {
            $artist = Artist::find(request('id'));
        } else {
            $artist = [];
        };

        $data = [
            'data' => $artist
        ];

        return view('admin.page.artist.edit', $data);
    }

    public function create(Request $request) {
        // Validate
        $attributes = [
            'name'    => 'Artist Name',
        ];

        $this->validate($request,[
            'name'     => 'required',
        ],[],$attributes);

        // updating on fire
        Artist::create([
            'name' => request('name'),
        ]);

        return redirect()->route('admin.artist.list');
    }

    public function update(Request $request)
    {
        // Validate
        $attributes = [
            'name'    => 'Artist Name',
        ];

        $this->validate($request,[
            'name'    => 'required',
        ],[],$attributes);

        //updating on fire
        Artist::find(request('id'))
            ->update([
                'name' => request('name')
            ]);

        return redirect()->back();
    }

    public function delete(Request $request) {
        if (request('id')) {
            $data = Artist::find(request('id'));
            $data->delete();
            
            return redirect()->route('admin.artist.list');
        } else {
            abort(404);
        };
    }
}
