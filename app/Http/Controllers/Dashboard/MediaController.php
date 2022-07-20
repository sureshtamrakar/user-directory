<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Media;

class MediaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $targetPath = 'uploads/' . date("Y") . '/' . date("m") . '/';
            $image = Image::make($request->file('file'));
            $fname = $request->file('file')->getClientOriginalName();
            $ext = $request->file('file')->getClientOriginalExtension();
            $nameWithOutExt = pathinfo($fname, PATHINFO_FILENAME);
            $original = $nameWithOutExt . '.' . $ext;
            $request->file('file')->move($targetPath, $original); // Move the original one first
            $image->fit(160, 160)->save($targetPath . $original);
            $media = new Media;
            $media->original_file   =  $original;
            $media->folder_path     =   $targetPath;
            $media->alt     =   preg_replace('/[^a-zA-Z0-9]/', ' ', $nameWithOutExt);
            $media->type = $ext;
            $media->save();
            if ($media) {
                $data = [
                    'id' => $media->id,
                    'image' => $media->original_file,
                    'folder_path' => $media->folder_path
                ];
                return \json_encode($data);
            } else {
                $data['error'] = 'Error';
                return \json_encode($data);
            }
        }
    }
}
