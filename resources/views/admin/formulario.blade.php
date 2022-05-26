<form name='form_carguio' id='form_carguio'>
<div class="row">

        <input type="hidden" name="id_equipo" id="id_equipo">
        <input type="hidden" name="rendimiento" id="rendimiento">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="equipo" class="col-sm-4 col-form-label">Equipo</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control" id='equipo' name='equipo' >
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_carguio" class="col-sm-4 col-form-label">Fecha Carguío</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id='fecha_carguio' name='fecha_carguio'  placeholder="Fecha" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Uso Actual</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id="uso_actual"  name="uso_actual" placeholder="Uso Actual" />
                </div>
            </div>
            <!-- /.form-group -->
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Cantidad Cargada</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id="cantidad_cargada" name="cantidad_cargada" placeholder="Cantidad Cargada" />
                </div>
            </div>
            <div class="form-group row">
                <label for="personal" class="col-sm-4 col-form-label">Personal</label>
                <div class="col-sm-8">
                    <select id='personal' name='personal' class="form-control select2 form-control-sm" style="width: 100%; font-size: 10px !important">
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Tipo de Comprobante</label>
                <div class="col-sm-8">
                    <select id='tipo_comprobante' name="tipo_comprobante" class="form-control select2 form-control-sm" style="width: 100%;" >

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Comprobante</label>
                <div class="col-sm-8">
                    <input type="text"  id='comprobante'  name="comprobante" class="form-control"  placeholder="Comprobante" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Proveedor</label>
                <div class="col-sm-8">
                <select id='proveedor'   name="proveedor" class="form-control select2 form-control-sm" style="width: 100%;" >

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Forma de Pago</label>
                <div class="col-sm-8">
                <select id='forma_pago' name='forma_pago' class="form-control select2 form-control-sm" style="width: 100%;" >

                    </select>
                </div>
            </div>
        </div>

    <!-- /.col -->
    <div class="col-md-6 border" id='ultimos_datos'>
        <h2>Ultimo Carguío</h2>

        <div class="form-group row">
            <label for="equipo" class="col-sm-4 col-form-label">Fecha</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" id='fecha_ultimo' name='fecha_ultimo' >
            </div>
        </div>
        <div class="form-group row">
            <label for="equipo" class="col-sm-4 col-form-label">Cargador</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" id='cargador_ultimo' name='cargador_ultimo' >
            </div>
        </div>
        <div class="form-group row">
            <label for="equipo" class="col-sm-4 col-form-label">último Uso</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" id='uso_ultimo' name='uso_ultimo' >
            </div>
        </div>
        <div class="form-group row">
            <label for="equipo" class="col-sm-4 col-form-label">Carguío</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" id='carguio_ultimo' name='carguio_ultimo' >
            </div>
        </div>
        <div><button id='borrarcarguio' type='button'  class="btn btn-danger"><i class="fas fa-trash"></i></button></div>
    </div>
    <button id='limpiar' type="reset" style="display:none">
</div>
</form>
