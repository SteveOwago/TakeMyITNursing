<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SubjectCategory;

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

    public function fetchTests(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $subjectCategoryIDs = SubjectCategory::select('id')->where('subject_domain_id',$value)->get();
        $data = DB::table('tests')
                    ->whereIn('subject_category_id', $subjectCategoryIDs)
                    ->get();
        $output = '<option value="" selected disabled>Select
        Test</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }

}
