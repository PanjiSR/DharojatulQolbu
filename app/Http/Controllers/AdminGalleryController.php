<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    /**
   * Display a listing of the resource.
   */
  public function index()
  {
      //
      $data = [
          'title' => 'Manajemen Gallery',
          'gallery' => Gallery::get(),
          'content' => 'admin/gallery/index'
      ];
      return view('admin.layouts.wrapper', $data, [
          "title" => "Gallery"
      ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
      //
      $data = [
          'title' => 'Tambah Foto',
          'content' => 'admin/gallery/add'
      ];
      return view('admin.layouts.wrapper', $data);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
      //
      // dd($request->all());
      $data = $request->validate([
          'gambar' => 'required',
      ]);

    //   $data ['urutan'] = 0;
      // Upload Gambar
      if($request->hasFile('gambar')){
          $gambar = $request->file('gambar');
          $file_name = time().'-'. $gambar->getClientOriginalName();

          $storage = 'uploads/gallerys/';
          $gambar->move($storage, $file_name);
          $data['gambar'] = $storage . $file_name;
      }else{
          $data['gambar'] = null;
      }

      Gallery::create($data);

      return redirect('/admin/gallery');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
      //
  
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
      //
      $data = [
          'title' => 'Edit Foto',
          'gallery' => Gallery::find($id),
          'content' => 'admin/gallery/add'
      ];
      return view('admin.layouts.wrapper', $data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
      //
      $gallery = Gallery::find($id);
      $data = $request->validate([
          'gambar' => 'required',
      ]);

    //   $data ['urutan'] = 0;
      // Upload Gambar
      if($request->hasFile('gambar')){

          if($gallery->gambar != null){
              unlink($gallery->gambar);
          }

          $gambar = $request->file('gambar');
          $file_name = time().'-'. $gambar->getClientOriginalName();

          $storage = 'uploads/gallerys/';
          $gambar->move($storage, $file_name);
          $data['gambar'] = $storage . $file_name;
      }else{
          $data['gambar'] = $gallery->gambar;
      }

      $gallery->update($data);
      return redirect('/admin/gallery');
      
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
      //
      $gallery = Gallery::find($id);

      if($gallery->gambar != null){
          unlink($gallery->gambar);
      }
      
      $gallery->delete();
      return redirect('/admin/gallery');

  }
}