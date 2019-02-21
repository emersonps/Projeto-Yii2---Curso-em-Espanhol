<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<a href="<?= Url::toRoute("site/create") ?>"> Crear un nuevo alumno</a>

<?php $f = ActiveForm::begin([
		"method" => "get",
		"action" => Url::toRoute("site/view"),
		"enableClientValidation" => true,
	]);
?>

<div class="form-group">
	<?= $f->field($form, "q")->input("search") ?>
</div>

<?= Html::submitButton("Buscar", ["class" => "btn btn-primary"]) ?>

<?php $f->end() ?>

<h3><?= $search ?></h3>

<h3>Lista de Alumnos</h3>
<table class="table table-bordered">
	<tr>
		<td>Id Alumno</td>
		<td>Nombre</td>
		<td>Apellidos</td>	
		<td>Clase</td>
		<td>Nota Final</td>
		<td></td>
		<td></td>
	</tr>

	<?php foreach ($model as $row): ?>
	<tr>
		<td><?= $row->id_alumno ?></td>
		<td><?= $row->nombre ?></td>
		<td><?= $row->apellidos ?></td>	
		<td><?= $row->clase ?></td>
		<td><?= $row->nota_final ?></td>
		<td>
			<a href="<?= Url::toRoute(["site/update", "id_alumno" => $row->id_alumno])?>"><i class="glyphicon glyphicon-pencil"></i></a>
		</td>
		<td>
			<a href="#" data-toggle="modal" data-target="#id_alumno_<?= $row->id_alumno ?>"><i class="glyphicon glyphicon-trash"></i></a>
			<div class="modal fade" tabindex="-1" role="dialog" id="id_alumno_<?= $row->id_alumno ?>">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Eliminar Aluno</h4>
			      </div>
			      <div class="modal-body">
			        <p>?Realmente deseas eliminar al alumno con id <?= $row->id_alumno ?>?</p>
			      </div>
			      <div class="modal-footer">
			        <?= Html::beginForm(Url::toRoute("site/delete"), "POST") ?>
			        	<input type="hidden" name="id_alumno" value="<?= $row->id_alumno ?>">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			        	<button type="input" class="btn btn-primary">Eliminar</button>
			        <?= Html::endForm() ?>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</th>
	</tr>		
	<?php endforeach ?>
</table>