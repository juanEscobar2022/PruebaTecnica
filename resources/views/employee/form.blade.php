<h1>{{ $modo }} Empleado</h1>
<div class="form-group row">
    <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ isset($data->nombre)?$data->nombre:'' }}" placeholder="Nombre Completo" required>
    </div>
</div>
<div class="form-group row mt-3">
    <label for="email" class="col-sm-2 col-form-label">Correo Electronico</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="{{ isset($data->email)?$data->email:'' }}" placeholder="Correo Electronico" required>
    </div>
</div>
<fieldset class="form-group row mt-4">
    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Sexo</legend>
    <div class="col-sm-10">
        <div class="form-check">
            <label class="form-check-label">
                Masculino
            </label>
            <input class="form-check-input" type="radio" name="sexo" id="M" value="M" value="{{ isset($data->sexo)?$data->sexo:'' }}" required>

        </div>
        <div class="form-check">
            <label class="form-check-label" for="femenine">
                Femenino
            </label>
            <input class="form-check-input" type="radio" name="sexo" id="F" value="F" value="{{ isset($data->sexo)?$data->sexo:'' }}" required>
        </div>

    </div>
</fieldset>
<!-- <fieldset class="form-group row"> -->
<div class="form-group row mt-4">
    <label for="nombre" class="col-sm-2 col-form-label">Area</label>
    <div class="col-sm-10">
        <select class="form-control" id="area_id" name="area_id" value="{{ isset($data->area_id)?$data->area_id:'' }}" required>
            <option value="">Seleccionar area </option>
            <?php foreach ($area as $unidad) { ?>
                <option value="<?php echo $unidad['id']; ?>"><?php echo $unidad['nombre']; ?>

                </option>

            <?php } ?>
        </select>
    </div>
</div>

<!-- </fieldset> -->


<div class="form-group row mt-3">
    <label for="nombre" class="col-sm-2 col-form-label">Descripción</label>
    <div class="col-sm-10">

        <textarea class="form-control is-invalid" id="descripcion" name="descripcion" value="{{ isset($data->descripcion)?$data->descripcion:'' }}" placeholder=" Descripción de la experiencia del empleado " required></textarea>
    </div>
</div>
<div class="form-group row mt-3">
    <label for="nombre" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        <!-- <p style="float: right;"> -->
        <input class="form-check-input" type="checkbox" value="1" id="boletin" name="boletin" value="{{ isset($data->boletin)?$data->boletin:'' }}" required>
        <label class="form-check-label" for="flexCheckDefault">
            Deseo recibir boletin informativo
        </label>
        <!-- </p> -->

    </div>
</div>
<!-- <div class="form-group row mt-4">
    <label for="nombre" class="col-sm-2 col-form-label">Roles</label>

</div> -->
<div class="form-group row mt-4">

    <label for="nombre" class="col-sm-2 col-form-label">Roles</label>

    <div class="col-sm-10">
        <?php foreach ($roles as $unidad) { ?>

            <div class="form-check">

                <input class="form-check-input" type="checkbox" id="roles" name="roles" value="<?php echo $unidad['id']; ?>{{ isset($data->roles)?$data->roles:'' }}" required><?php echo $unidad['nombre']; ?>

            </div>
        <?php } ?>

    </div>
</div>

<div class="form-group row mt-4">
    <div class="col-sm-10">
        <input type="submit" class="btn btn-primary" id="Enviar" value="{{ $modo }} Empleado">

        <a class="btn btn-warning" href="{{ url('employee/') }}">Regresar</a>

    </div>

</div>
