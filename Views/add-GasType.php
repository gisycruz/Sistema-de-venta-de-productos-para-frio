<?php 
require_once(VIEWS_PATH."validate-session.php");
    include_once('nav.php');
?>
<!-- pageContent -->
<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-fire"></i>
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
				<a href="#tabNewCategory" class="mdl-tabs__tab is-active">Nuevo Tipo de Gas</a>
				<a href="#tabListCategory" class="mdl-tabs__tab">Listar Tipo de Gas</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewCategory">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
							Agregar Tipo de Gas
							</div>
							<div class="full-width panel-content">
							<?php if ($id_GasType == null){ ?><form action="<?php echo FRONT_ROOT."GasType/addGasType";?>" method="POST">
							<?php }else{ ?> <form action="<?php echo FRONT_ROOT."GasType/ModifyGasType";?>" method="POST"> 
								<input type="hidden" name="id_GasType" class="form-control form-control-ml" value="<?php echo $id_GasType;?>">
							<?php }  ?>
									<h5 class="text-condensedLight">Nombre de Tipo de Gas</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name ="name" <?php if($id_GasType != null){?> value = "<?php echo $GasType->getName() ;?>" <?php } ?> pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameGasType" required>
										<label class="mdl-textfield__label" for="NameGasType">Nombre</label>
										<span class="mdl-textfield__error">Nombre Invalido</span>
									</div>
									<p class="text-center">
										<button  type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addGasType">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addGasType">Agregar Tipo de Gas</div>
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
								Listar Tipos de Gas
							</div>
							<div class="full-width panel-content">
								<form action="#tabListCategory">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchGasType">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchGasType">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>
								<div class="mdl-list">
								<?php if( !empty($listGasType) && isset($listGasType)){ foreach($listGasType as $GasType){?>
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-label mdl-list__item-avatar"></i>
											<span><?php echo $GasType->getName() ;?></span>	
										</span>
										<div>
									<button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."GasType/ShowModify?id_GasType=".$GasType->getId_GasType();?>"><i class="zmdi zmdi-edit" ></i> Editar</a></button>	
									<button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."GasType/RemoverGasType?id_GasType=".$GasType->getId_GasType();?>"><i class="zmdi zmdi-delete"> </i> Eliminar</a></button>
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
  
  