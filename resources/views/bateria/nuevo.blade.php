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

<form name="forma" action="guardar_bateria_nuevo" method="post" class="form-horizontal" onsubmit="guardar()">
		
		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
		<input type="hidden" name="texto" id="texto" value="" />

        <h2>Nueva bateria</h2> <hr />
<div class="row">
		<div align="left" class="alert alert-danger alert-dismissible fade in" style="font-size: 12pt; font-weight: bold;">
			{{ $mensaje }}
		</div>
		
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="msj">(*)</span>:</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nombre" name="nombre" type="text" data-validate-length-range="3" data-validate-words="1" required="required" class="form-control" placeholder="Nombre" value="">
            </div>
        </div>
		
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-122">Pruebas</label>
			<div class="col-md-6 col-sm-6 col-xs-12">		
				{{ FuncionesControllers::crear_check('tipos_pruebas', 'id_tipos_pruebas',0) }}
            </div>
        </div>		
				
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estatus <span class="msj">(*)</span>:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="radio">
					<input class="flat" type="checkbox" id="activa" name="activa" value="1"> Activo
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