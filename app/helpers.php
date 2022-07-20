<?php
if (!function_exists('getCountry')) {

    function getCountry($selected = null)
    {
        $output = '';
        $countries = json_decode(file_get_contents(storage_path() . "/json/countries.json"), true);
        foreach ($countries['countries'] as $country) {
            $output .= '<option value="' . $country["name"] . '" data-code="' . $country["sortname"] . '"';
            if ($country["name"] == $selected) {
                $output .= ' selected=selected';
            }
            $output .= '>' . $country['name'] . '</option>';
        }
        return $output;
    }
}
if (!function_exists('get_attachment')) {
    function get_attachment($id)
    {
        $media = \App\Models\Media::find($id);
        if ($media) {
            $path   = $media->original_file;
            if (file_exists(public_path($media->folder_path . $media->thumbnail))) {
                return '<img src="' . url($media->folder_path . $media->thumbnail) . '">';
            } else {
                return '<img src="' . url($media->folder_path . $media->original_file) . '">';
            }
        }
        return '';
    }
}
