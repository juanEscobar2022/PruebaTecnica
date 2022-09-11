@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/employee/'.$data->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('employee.form',['modo'=>'Editar']);

</form>
</div>
@endsection

