<?php 
require_once(VIEWS_PATH."validate-session.php");
    include_once('nav.php');
?>
<!-- pageContent -->
<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-truck"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
                <?php if(isset($message) && !empty($message)){ echo $message;}?>	
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProvider" class="mdl-tabs__tab is-active">Nuevo Proveedor</a>
				<a href="#tabListProvider" class="mdl-tabs__tab">Listar Proveedores</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProvider">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Proveedor
							</div>
							<div class="full-width panel-content">
                            <?php if ($id_Provider == null){ ?><form action="<?php echo FRONT_ROOT."Provider/addProvider";?>" method="get">
							<?php }else{ ?> <form action="<?php echo FRONT_ROOT."Provider/ModifyProvider";?>" method="get"> 
								<input type="hidden" name="id_Provider" class="form-control form-control-ml" value="<?php echo $id_Provider;?>">
							<?php }  ?>
									<h5 class="text-condensedLight">Datos del Proveedor</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" name ="DNIProvider" <?php if($id_Provider != null){?> value = "<?php echo $Provider->getDni() ;?>" <?php } ?> pattern="-?[0-9]*(\.[0-9]+)?" id="DNIProvider" required>
										<label class="mdl-textfield__label" for="DNIProvider">DNI</label>
										<span class="mdl-textfield__error">Numero Invalido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name ="NameProvider"  pattern="-?[A-Za-z0-9 ]*(\.[0-9]+)?" id="NameProvider" <?php if($id_Provider != null){?> value = "<?php echo $Provider->getName() ;?>" <?php } ?> required>
										<label class="mdl-textfield__label" for="NameProvider">Nombre</label>
										<span class="mdl-textfield__error">Nombre Invalido</span>
									</div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name="lastNameProvider" id="lastNameProvider" <?php if($id_Provider != null){?> value = "<?php echo $Provider->getLastName() ;?>" <?php } ?>required>
										<label class="mdl-textfield__label" for="lastNameProvider">Apellido</label>
										<span class="mdl-textfield__error">Apellido Invalido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name ="addressProvider" id="addressProvider" <?php if($id_Provider != null){?> value = "<?php echo $Provider->getAddress() ;?>" <?php } ?> required>
										<label class="mdl-textfield__label" for="addressProvider">Dirreccion</label>
										<span class="mdl-textfield__error">Direccion Invalida</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="tel" name ="phoneProvider" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phoneProvider" <?php if($id_Provider != null){?> value = "<?php echo $Provider->getPhone() ;?>" <?php } ?> required>
										<label class="mdl-textfield__label" for="phoneProvider">Telefono</label>
										<span class="mdl-textfield__error">Numero de Telefono Invalido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="email" name ="emailProvider" id="emailProvider" <?php if($id_Provider != null){?> value = "<?php echo $Provider->getEmail() ;?>" <?php } ?> required>
										<label class="mdl-textfield__label" for="emailProvider">E-mail</label>
										<span class="mdl-textfield__error">E-mail Invalido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
										<input class="mdl-textfield__input" type="text" name ="webProvider" id="webProvider"  <?php if ( !empty($id_Provider) && $id_Provider != null){?> value = "<?php echo $Provider->getWed() ;?>" <?php } ?> required>
										<label class="mdl-textfield__label" for="webProvider">Web</label>
										<span class="mdl-textfield__error">Wed Invalida</span>
									</div>
                                    <?php if ($message != "Datos del Proveedor"){?>
									<p class="text-center">
										<button  type = "submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProvider">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProvider">Agregar Proveedor</div>
									</p>
                                    <?php }else{ ?>
                                    <p class="text-center">
                                      <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"  href="<?php echo FRONT_ROOT."Provider/showAddProvider";?>" id="btn-closedProvider">
                                         <i class="zmdi zmdi-power"></i>
                                      </a>
                                        <div class="mdl-tooltip" for="btn-closedProvider">Salir</div>
                                    </p>
                                   <?php }
                                   
                                   
                                   ?>
                                   
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListProvider">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								List Providers
							</div>
							<div class="full-width panel-content">
								<form action="#">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProvider">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchProvider">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>
								<div class="mdl-list">
                                <?php if( !empty($listProvider) && isset($listProvider)){ foreach($listProvider as $Provider){?>
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-truck mdl-list__item-avatar"></i>
											<span><?php echo $Provider->getLastName() . " " . $Provider->getName() ;?></span>
											<span class="mdl-list__item-sub-title"><?php echo $Provider->getDni() ;?></span>
										</span>
                                      <div>
                                        <a class="mdl-list__item-secondary-action" href="<?php $message ="Datos del Proveedor"; echo FRONT_ROOT."Provider/showAddProvider?id_Provider=".$Provider->getId_Provider()."&mensage =".$message ;?>"><i class="zmdi zmdi-more"></i></a>
                                        <button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Provider/ShowModify?id_Provider=".$Provider->getId_Provider();?>"><i class="zmdi zmdi-edit" ></i> Editar</a></button>	
									    <button><a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Provider/RemoverProvider?id_Provider=".$Provider->getId_Provider();?>"><i class="zmdi zmdi-delete"> </i> Eliminar</a></button>
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
</html>