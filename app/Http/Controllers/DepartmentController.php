<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Resources\DepartmentsResource;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $departments = Department::all();
            return response([
                'departments' =>
                DepartmentsResource::collection($departments),
                'message' => 'Successful'
            ], 200);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'dep_name' => 'required|max:50',
            ]);

            if ($validator->fails()) {
                return response([
                    'error' => $validator->errors(),
                    'Validation Error'
                ]);
            }

            $department = Department::create($data);

            return response([
                'department' => new
                    DepartmentsResource($department),
                'message' => 'Success'
            ], 200);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        try {
            return response(['department' => new
                DepartmentsResource($department), 'message' => 'Success'], 200);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        try {
            $department->update($request->all());

            return response(['department' => new
                DepartmentsResource($department), 'message' => 'Success'], 200);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();
            return response(['message' => 'Department deleted']);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
