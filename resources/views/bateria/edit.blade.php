<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;
use View;
use Form;
use URL;
use App\Http\Controllers\FuncionesControllers;

?>

@include ('layout.header')

<style type="text/css" media="all">
	@import 'css/texto/info.css';
	<!--@import "css/texto/main.css";
	@import "css/texto/widgEditor.css";-->
</style>

     {!! Form::model($bateria,array( 'name'=>"forma", 'url' => 'guardar_bateria_edicion', 'method' => 'put', 'class' =>  "form-horizontal", 'files'=>true, 'onSubmit'=>"guardar()")) !!}
		
		<input type="hidden" name="id" value="<?=$bateria->id?>" />
		
		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
		<input type="hidden" name="texto" id="texto" value="" />
		
<div class="row">
		<div align="left" class="alert alert-danger alert-dismissible fade in" style="font-size: 12pt; font-weight: bold;">
			{{ Session::get("mensaje") }}
		</div>	

		<div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="msj">(*)</span>:</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nombre" name="nombre" type="text" data-validate-length-range="3" data-validate-words="1" required="required" class="form-control" placeholder="Nombre" value="<?=$bateria->nombre?>">
            </div>
        </div>
		
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-122">Pruebas</label>
			<div class="col-md-6 col-sm-6 col-xs-12">		
				{{ FuncionesControllers::crear_check('tipos_pruebas', 'id_tipos_pruebas',$bateria->id) }}
            </div>
        </div>			
				
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estatus <span class="msj">(*)</span>:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="radio">
					<input class="flat" type="checkbox" id="activa" name="activa" value="1" <?php if ($bateria->activa==1) echo "checked"; ?>> Activo
				</div>
			</div>
        </div>

        <br />
        <div class="ln_solid"></div>
        <div class="form-group" align="center">
            {!! Form::submit('Guardar', array('class'=>'send-btn', 'class'=>'btn btn-primary')) !!}
        </div>
</div>
    {!! Form::close() !!}

@include ('layout.footer')
