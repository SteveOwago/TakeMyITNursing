<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Order::all();
            //User Is not Administrator
            if (!auth()->user()->hasRole('Admin')) {

                $query =   Order::whereuser_id(auth()->user()->id);

            }


            $table = Datatables::of($query);


            $table->editColumn('id', function ($row) {
                return  $row->id ?? 'Not Set';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ?? 'Not Set';
            });
            $table->editColumn('subjectCategory', function ($row) {
                return $row->subjectCategory->name ?? 'No Name';
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ?? '';
            });
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                //Set the values to 1 to be viewable on display
                $view = 1;
                if (auth()->user()->hasrole('Admin') || auth()->user()->can('admin_management')) {
                    $routePart = 'admin.tests';
                    $edit = 1;
                    $delete = 1;
                } else {
                    $routePart = 'student.tests';
                    $edit = 0;
                    $delete = 0;
                }

                return view('layouts.partials.utilities.datatablesActions', compact(
                    'view',
                    'edit',
                    'delete',
                    'routePart',
                    'row'
                ));
            });

            $table->rawColumns(['id', 'name', 'subjectCategory', 'created_at', 'actions']);

            return $table->make(true);
        }
        return view('admin.orders.index');
    }
}
