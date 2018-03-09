<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Medicos
      <small>Panel de Control</small>
    </h1>
    <!-- navegacion derecha -->
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Medicos</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
<!-- TABLA-->
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
       <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar">
         Agregar Medico
       </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tabla">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Teléfono</th>
              <td>Correo Electrónico</td>
              <td>Dirección</td>
              <td>Observaciones</td>
              <th style="width: 30px">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL AGREGAR -->
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- contenido modal-->
    <div class="modal-content">
      <form role="form" method="POST" autocomplete="off">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-tittle">Agregar Médico</h4>
        </div><!--modal header-->
        <div class="modal-body">
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Nombre (*): </label>
            <input type="text" class="form-control" name="nombre" required autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Teléfono (*): solo numeros</label>
            <input type="text" class="form-control" name="telefono" required autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off">
            <label>Correo electrónico (*):</label>
            <input type="text" class="form-control" name="correo" required autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off">
            <label>Dirección:</label>
            <textarea name="direccion"></textarea>
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off">
            <label>Observaciones:</label>
            <textarea name="observaciones"></textarea>
          </div>
        </div><!--modal body-->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div><!--modal footer-->
        <?php  
          $crearUsuario= new ControladorUsuarios();
          $crearUsuario->ctrCrearUsuario();
         ?>
      </form>
    </div><!--modal content-->
  </div><!--modal dialog-->
</div><!--modalagregar-->

<!-- MODAL EDITAR -->
<div id="modalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- contenido modal-->
    <div class="modal-content">
      <form role="form" method="POST" autocomplete="off">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-tittle">Agregar Médico</h4>
        </div><!--modal header-->
        <div class="modal-body">
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Nombre (*): </label>
            <input type="text" class="form-control" name="nombre" required autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Teléfono (*): solo numeros</label>
            <input type="text" class="form-control" name="telefono" required autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off">
            <label>Correo electrónico (*):</label>
            <input type="text" class="form-control" name="correo" required autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off">
            <label>Dirección:</label>
            <textarea name="direccion"></textarea>
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off">
            <label>Observaciones:</label>
            <textarea name="observaciones"></textarea>
          </div>
        </div><!--modal body-->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div><!--modal footer-->
        <?php  
          $editarUsuario= new ControladorUsuarios();
          $editarUsuario->ctrEditarUsuario();
         ?>
      </form>
    </div><!--modal content-->
  </div><!--modal dialog-->
</div><!--modalagregar-->