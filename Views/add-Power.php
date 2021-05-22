<?php 
require_once(VIEWS_PATH."validate-session.php");
    include_once('nav.php');
?>
<!-- pageContent -->
<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-battery"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
				<?php if(isset($message) && !empty($message)){ echo  $message;}?>	
				</p>
			</div>
			<div class="full-width header-well-text">
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewCategory" class="mdl-tabs__tab is-active">Nuevo Tipo de Potencia</a>
				<a href="#tabListCategory" class="mdl-tabs__tab">Listar Tipos de Potencias</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewCategory">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
							Agregar Tipo de Potencia
							</div>
							<div class="full-width panel-content">
							<?php if ($id_Power == null){ ?><form action="<?php echo FRONT_ROOT."Power/addPower";?>" method="POST">
							<?php }else{ ?> <form action="<?php echo FRONT_ROOT."Power/ModifyPower";?>" method="POST"> 
								<input type="hidden" name="id_Power" class="form-control form-control-ml" value="<?php echo $id_Power;?>">
							<?php }  ?>
									<h5 class="text-condensedLight">Nombre del Tipo de Potencia</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name ="name" <?php if($id_Power != null){?> value = "<?php echo $Power->getDescription() ;?>" <?php } ?> pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NamePower" required>
										<label class="mdl-textfield__label" for="NamePower">Nombre</label>
										<span class="mdl-textfield__error">Nombre Invalido</span>
									</div>
									<p class="text-center">
										<button  type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addPower">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addPower">Agregar Tipo de Potencia</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListCategory">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Lista de los Tipos de Potencias
							</div>
							<div class="full-width panel-content">
								<form action="#tabListCategory">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchPower">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchPower">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>
								<div class="mdl-list">
								<?php if( !empty($listPower) && isset($listPower)){ foreach($listPower as $Power){?>
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-battery mdl-list__item-avatar"></i>
											<span><?php echo $Power->getDescription() ;?></span>	
										</span>
										<div>
									<button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Power/ShowModify?id_Power=".$Power->getId_Power();?>"><i class="zmdi zmdi-edit" ></i> Editar</a></button>	
									<button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Power/RemoverPower?id_Power=".$Power->getId_Power();?>"><i class="zmdi zmdi-delete"> </i> Eliminar</a></button>
								</div>
									</div>
									<li class="full-width divider-menu-h"></li>
									<?php } } ?>	
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
<?php 
    include_once('footer.php');
?>
  
  