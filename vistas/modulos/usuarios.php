<div class="content-wrapper">
  <div class="content-header col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h1><img src="vistas/img/plantilla/usuarios.png"> Usuarios <small> Panel de Control </small>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar">Agregar Usuario</button>
    </h1>
  </div>

  <!-- Main content -->
  <section class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
<!-- TABLA-->
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tabla">
          <thead>
            <tr>
              <!--<th style="width: 10px">#</th>-->
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Ultimo Acceso</th>
              <th style="width: 30px">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item=null;
            $valor=null;
            $usuarios=Controladorusuarios::mostrarusuarios($item,$valor);
            foreach($usuarios as $key => $value)
            {
              echo '
                <tr>
                  <!--<td>'.$value["id"].'</td>-->
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>
                  <td>'.$value["foto"].'</td>
                  <td>'.$value["perfil"].'</td>
                  <td>'.$value["ultimo_acceso"].'</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditar" id="'.$value["id"].'" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
                </tr>';
            }
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
      <form role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-tittle">Agregar Usuario</h4>
        </div><!--modal header-->
        <div class="modal-body">
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Nombre (*): </label>
            <input type="text" class="form-control" name="nombre" required autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Usuario (*):</label><p class="help-blocK">solo letras y numeros</p>
            <input type="text" class="form-control" id="usuario" name="usuario" required autocomplete="off">
            
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" autocomplete="off">
            <label>Clave (*):</label><p class="help-blocK">solo letras y numeros</p>
            <input type="password" class="form-control" name="clave" required autocomplete="off">
            
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Perfil:(*)</label>
            <p class="help-blocK">seleccione el perfil para los permisos del usuario</p>
            <select class="form-control input-lg" name="perfil">
              <option value="">Seleccione</option>
              <option value="Administrador">Administrador</option>
              <option value="Gerente">Gerente</option>
              <option value="Vendedor">Vendedor</option>
              <option value="Almacen">Almacen</option>
            </select>
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Subir foto</label>
            <input type="file" name="foto" id="foto">
            <p class="help-blocK">Peso máximo de la foto 200kb</p>
            <img src="vistas/img/usuarios/default.jpg" class="img-thumbnail previsualizar" width="100px">
          </div>
        </div><!--modal body-->
        <div class="modal-footer">
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
            <button type="submit" class="btn btn-success btn-lg">Guardar</button>
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!--modal footer-->
        <?php  
          $crearusuario= new Controladorusuarios();
          $crearusuario->crearusuario();
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
      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-tittle">Editar Usuario</h4>
        </div><!--modal header-->
        
        <div class="modal-body">
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="hidden" id="id" name="id" value="">
            <label>Nombre: </label>
            <input type="text" class="form-control" id="editarnombre" name="editarnombre" value="" autocomplete="off">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Usuario:</label>
            <input type="text" class="form-control" id="editarusuario" name="editarusuario" value="" autocomplete="off" readonly>
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Clave (*):</label><p class="help-blocK">solo letras y numeros</p>
            <input type="password" class="form-control" name="editarclave" id="editarclave" placeholder="escribir nueva clave" value="" autocomplete="off">
            <input type="hidden" name="pass" id="pass">
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Perfil:(*)</label>
            <p class="help-blocK">seleccione el perfil para los permisos del usuario</p>
            <select class="form-control input-lg" name="perfil">
              <option value="">Seleccione</option>
              <option value="Administrador">Administrador</option>
              <option value="Gerente">Gerente</option>
              <option value="Vendedor">Vendedor</option>
              <option value="Almacen">Almacen</option>
            </select>
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Subir foto</label>
            <input type="file" name="foto">
            <p class="help-blocK">Peso máximo de la foto 200kb</p>
            <img src="vistas/img/usuarios/default.jpg" class="img-thumbnail previsualizar" width="100px">
          </div>
        </div><!--modal body-->
        <div class="modal-footer">
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
            <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!--modal footer-->
        <?php  
          //$editarUsuario= new Controladorusuarios();
          //$editarUsuario->editarusuario();
         ?>
      </form>
    </div><!--modal content-->
  </div><!--modal dialog-->
</div><!--modalagregar-->