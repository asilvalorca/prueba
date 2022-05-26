<form name='form_grafico' id='form_grafico'>
<div class="row">
        <input type="hidden" name="id_equipo2" id="id_equipo2">
      
        <div class="col-md-6">
            <div class="form-group row">
                <label for="equipo" class="col-sm-4 col-form-label">Equipo</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control" id='equipo2' name='equipo2' >
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_desde" class="col-sm-4 col-form-label">Fecha Desde</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id='fecha_desde' name='fecha_desde'  placeholder="Fecha" />
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_hasta" class="col-sm-4 col-form-label">Fecha Hasta</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id='fecha_hasta' name='fecha_hasta'  placeholder="Fecha" />
                </div>
            </div>
            <!-- /.form-group -->
           
            <div class="form-group row">
                <label for="personal" class="col-sm-4 col-form-label">Personal</label>
                <div class="col-sm-8">
                    <select id='personal2' name='personal2' class="form-control select2 form-control-sm" style="width: 100%;">
                    </select>
                </div>
            </div>
           
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Proveedor</label>
                <div class="col-sm-8">
                <select id='proveedor2'   name="proveedor2" class="form-control select2 form-control-sm" style="width: 100%;" >

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Mostrar</label>
                <div class="col-sm-8">
                <select id='mostrar' name='mostrar' class="form-control select2 form-control-sm" style="width: 100%;" >
                <option value='0'></option>
                    <option value='1'>Carguío</option>
                 
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <img src="img/grafico.png" class='cursor' >
                
            </div>
            <div class="form-group row">
                <img src="img/tabla.png" class='cursor' id='generar_reporte'>
            </div>
          
        </div>

    <!-- /.col -->
   
</div>
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="tablaReporte"  class="display cell-border compact letra_chica">
                <thead>
                <tr>
                  <th>F. Carguio</th>
                  <th>Ingreso</th>
                  <th>Encargado</th>
                  <th>Uso</th>
                  <th>Cant</th>
                  <th>Kms</th>
                  <th>Rend</th>
                  <th>Proveedor</th>
                  <th>Pago</th>
                  <th>Comprobante</th>
                  <th>N° Comp.</th>
                </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
    </div>
</form>
