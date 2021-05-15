<?php 
require_once(VIEWS_PATH."validate-session.php");
    include_once('nav.php');
?>
<!-- pageContent -->
<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-toys"></i>
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
				<a href="#tabNewCategory" class="mdl-tabs__tab is-active">Nuevo Tipo de Aplicacion</a>
				<a href="#tabListCategory" class="mdl-tabs__tab">Listar Tipo de Aplicacion</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewCategory">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
							Agregar Tipo de Aplicacion 
							</div>
							<div class="full-width panel-content">
							<?php if ($id_Aplication == null){ ?><form action="<?php echo FRONT_ROOT."Aplication/addAplication";?>" method="POST">
							<?php }else{ ?> <form action="<?php echo FRONT_ROOT."Aplication/ModifyAplication";?>" method="POST"> 
								<input type="hidden" name="id_Aplication" class="form-control form-control-ml" value="<?php echo $id_Aplication;?>">
							<?php }  ?>
									<h5 class="text-condensedLight">Nombre de Tipo de Aplicacion</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name ="name" <?php if($id_Aplication != null){?> value = "<?php echo $Aplication->getName() ;?>" <?php } ?> pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameAplication" required>
										<label class="mdl-textfield__label" for="NameAplication">Nombre</label>
										<span class="mdl-textfield__error">Nombre Invalido</span>
									</div>
									<p class="text-center">
										<button  type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAplication">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addAplication">Agregar Tipo de Aplicacion</div>
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
								Listar Tipo de Aplicacion
							</div>
							<div class="full-width panel-content">
								<form action="#tabListCategory">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchAplication">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchAplication">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>
								<div class="mdl-list">
								<?php if( !empty($listAplication) && isset($listAplication)){ foreach($listAplication as $Aplication){?>
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-label mdl-list__item-avatar"></i>
											<span><?php echo $Aplication->getName() ;?></span>	
										</span>
										<div>
									<button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Aplication/ShowModify?id_Aplication=".$Aplication->getId_Aplication();?>"><i class="zmdi zmdi-edit" ></i> Editar</a></button>	
									<button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Aplication/RemoverAplication?id_Aplication=".$Aplication->getId_Aplication();?>"><i class="zmdi zmdi-delete"> </i> Eliminar</a></button>
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
  
  