<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RecordsController extends Controller
{
    //
    public function load(Request $request) {

        if($request->hasFile('csv-file')) {
            $file = $request->file('csv-file');
            $csvData = explode(',', file_get_contents($file));
            $data = array();
            dd($csvData);
            foreach ($csvData as $entry) {
                $data[] = explode(',', $entry);
            }

            return view('layouts.uploaded', ['action' => 'Uploaded!', 'data' => $data, 'headings' => explode(',', $csvData[0]) ]);
        }

        return view('welcome', ['action' => 'Failed!']);
    }
}
