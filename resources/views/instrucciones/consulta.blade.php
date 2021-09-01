<?php namespace App\Http\Controllers;

use App\Http\Controllers\FuncionesControllers;
use App\Http\Controllers\SessioninstruccionesControllers;
use App\Http\Controllers\monedaControllers;
use Session;
use DB;
use View;
use Form;
use Illuminate\Support\Facades\URL;

?>

@include('layout.header')

<style type="text/css" media="all">
	@import 'css/texto/info.css';
	<!--@import "css/texto/main.css";
	@import "css/texto/widgEditor.css";-->
</style>
    <!-- page content -->
    <div class="x_content">
		<br />
		<div align="left" class="alert alert-danger alert-dismissible fade in" style="font-size: 12pt; font-weight: bold;">
			{{ $mensaje }}
		</div>
	
		<h2>Instrucciones</h2> <hr />
		<div class="form-group">
			<div class="dataTable_wrapper">
				<table width="100%" class="table table-striped table-bordered table-hover" id="tabla_reportes">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Empresa</th>
							<th>Tipo de Prueba</th>
							<th>Idioma</th>
							<th>Estatus</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "select * from instrucciones order by 2";
							$data=DB::select($sql);
							$activo=array("Inactivo","Activo");
							foreach ($data as $data) {
								?>
									<tr>
										<th><?php echo $data->nombre; ?></th>
										<th><?php echo FuncionesControllers::buscar_empresa($data->id_empresa); ?></th>
										<th><?php echo FuncionesControllers::buscar_prueba($data->id_prueba); ?></th>
										<th><?php echo FuncionesControllers::buscar_idioma($data->id_idioma); ?></th>
										<th><?php echo $activo[$data->activa]; ?></th>
										<th>
											<a href='consultarinstrucciones/<?php echo $data->id; ?>'>Consultar</a>
											<!--a href='eliminarinstrucciones/<?php echo $data->id; ?>'>Eliminar</a-->
										</th>
									</tr>								
								<?php
							}
						?>
					</tbody>	
				</table>
			</div>
		</div>
    </div>
    <!-- /page content -->
@include('layout.footer')

