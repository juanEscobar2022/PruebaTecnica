<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Area;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['getEmployee'] = Employee::paginate(5);
        // $area['area'] = Area::All();

        $data['getEmployee'] = Employee::select('empleado.id','empleado.nombre','empleado.email','empleado.sexo','areas.nombre AS area_id','empleado.boletin','empleado.descripcion')
                ->leftjoin('areas', 'empleado.area_id', '=', 'areas.id')
                ->get();
        return view('employee.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area['area'] = Area::All();
        $rol['roles'] = Rol::All();
        // $data = [
        //     'titulo' => 'Categorias',
        //     'datos' => $area
        // ];
        return view('employee.create',$area,$rol);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $dataEmployee = request()->all();
        $dataEmployee = request()->except('_token');
        // print_r($dataEmployee);
        // $rol = $dataEmployee;
        // $rol = $dataEmployee->roles;
        unset($dataEmployee['roles']);
        // if($roles){

        // }

        Employee::insert($dataEmployee);

        // return response()->json($dataEmployee);
        return redirect('employee')->with('mensaje','Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = Employee::findOrFail($id);
        $area = Area::All();
        $roles = Rol::All();

        return view('employee.edit', compact('data','area','roles') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $dataEmployee = request()->unset('updated_at');

        $dataEmployee = request()->except(['_token','_method',]);
       // print_r($dataEmployee);
        // unset(empleado.updated_at);
        // $dataEmployee = request()->all();
        Employee::where('id','=',$id)->update($dataEmployee);

        $data = Employee::findOrFail($id);
        return view('employee.edit', compact('data') );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);

        return redirect('employee')->with('mensaje','Empleado eliminado');
    }
}
