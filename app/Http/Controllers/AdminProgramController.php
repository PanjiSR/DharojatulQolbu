<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class AdminProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajement Kegiatan',
            'program' => Program::orderBy('created_at', 'desc')->get(),
            'content' => 'admin/program/index'
        ];

        return view('admin.layouts.wrapper', $data, [

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'title' => 'Tambah Kegiatan',
            'content' => 'admin/program/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'cover' => 'required'
        ]);

        // UPload Gambar
        if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $file_name = time().'-'. $cover->getClientOriginalName();

            $storage = 'uploads/programs/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        }else {
            $data['cover'] = null;
        }

        Program::create($data);
        return redirect('/admin/posts/program');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = [
            'title' => 'Detail Kegiatan',
            'program' => Program::find($id),
            'content' => 'admin/program/show'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [
            'title' => 'Edit Kegiatan',
            'program' => Program::find($id),
            'content' => 'admin/program/add'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $program = Program::find($id);
        $data = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            // 'cover' => 'required'
        ]);

        // Upload Cover
        if($request->hasFile('cover')){

            if($program->cover != null){
                unlink($program->cover);
            }

            $cover = $request->file('cover');
            $file_name = time().'-'. $cover->getClientOriginalName();

            $storage = 'uploads/programs/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        }else{
            $data['cover'] = $program->cover;
        }

        $program->update($data);
        return redirect('/admin/posts/program');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $program = Program::find($id);

        if($program->cover != null){
            unlink($program->cover);
        }

        $program->delete();
        return redirect('/admin/posts/program');
    }
}
