<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $targetPath = 'uploads/' . date("Y") . '/' . date("m") . '/';
        $file = $request->file('file');
        $fname = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $nameWithOutExt = str_replace("-", " ", $fname);
        $nameWithOutExt = str_replace('.' . $ext, '', $nameWithOutExt);
        $original = $nameWithOutExt . '.' . $ext;
        $file->move($targetPath, $original); // Move the original one first
        $newName = $nameWithOutExt . '-thumbnail.' . $ext;
        copy($targetPath . $original, $targetPath . $newName);
        Image::make($targetPath . $newName)
            ->fit(160, 160)
            ->save($targetPath . $newName);

        $media = new Media;
        $media->original_file   =  $original;
        $media->folder_path     =   $targetPath;
        $media->alt     =   preg_replace('/[^a-zA-Z0-9]/', ' ', $nameWithOutExt);
        $media->type = $ext;
        $media->thumbnail     =   $newName;
        $media->save();
        if ($media) {
            $imagethumb = $media->thumbnail;
            $data = [
                'id' => $media->id,
                'image' => $imagethumb,
                'folder_path' => $media->folder_path
            ];
            return \json_encode($data);
        } else {
            $data['error'] = 'Error';
            return \json_encode($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
