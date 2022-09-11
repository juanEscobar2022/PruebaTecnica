@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    {{ Session::get('mensaje')}}

    @endif


    <h2>Lista empleados</h2>
        <a href="{{ url('employee/create') }}" class="btn btn-info" style="float: right;">Crear</a>



    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>Area</th>
                <th>Boletin</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $getEmployee as $employee)
            <tr>
                <td scope="row">{{ $employee->nombre }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->sexo }}</td>
                <td>{{ $employee->area_id }}</td>
                <td>{{ $employee->boletin }}</td>
                <td>
                    <a href="{{ url('/employee/'.$employee->id.'/edit') }}" class="btn btn-warning">Modificar</a>



                </td>
                <td>
                    <form action="{{ url('/employee/'.$employee->id ) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <!-- <input type="submit" onclick="return confirm('¿Desea Eliminar?')" value="Eliminar"> -->
                        <button class="btn btn-danger" title="Eliminar" type="submit" onclick="return confirm('¿Desea Eliminar?')" value="Eliminar">Eliminar
                         </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <!-- <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr> -->
        </tbody>
    </table>
</div>
@endsection
