<?php

// Telling the Laravel that the data that will be retrieved by the Route is from here
namespace App\Models;

use Illuminate\Support\Arr;

class Data {
    public static function all(){
        return [
        [
            'id' => 1,
            'slug'=> 'graduates',
            'title' => 'Graduates',
            'number' => 254,
            'desc' => 'There are over like 234 graduates'
        ],[
            'id' => 2,
            'slug'=> 'employed',
            'title' => 'Employed',
            'number' => 145,
            'desc' => 'There are over like 143 employed'
        ],[
            'id' => 3,
            'slug'=> 'unemployed',
            'title' => 'Unemployed',
            'number' => 109,
            'desc' => 'There are over like 109 unemployed'
        ]
        ];
    }

    public static function find($slug){
        // return Arr::first(static::all(), function($data) use ($slug){
        //     return $data['slug'] == $slug;
        // });

        // Finding the first element through iteration that match the criteria (slug)
        $data = Arr::first(static::all(), fn($data) => $data['slug'] == $slug);

        if (!$data) {
            abort(404, 'Data not found');
        }

        return $data;
     }
}
?>
