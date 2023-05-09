<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApiDataController extends Controller
{
    public function fetchSubjectCategories(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('subject_categories')
                    ->where($select, $value)
                    ->get();
        $output = '<option value="">Select Subject Categories</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }

}
