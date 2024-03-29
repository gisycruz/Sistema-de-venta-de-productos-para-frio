<?php 
require_once(VIEWS_PATH."validate-session.php");
    include_once('nav.php');
?>
</div>
 <!-- pageContent -->
 <section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
			<p class="text-condensedLight">
				<?php if(isset($message) && !empty($message)){ echo  $message;}?>	
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">NUEVO PRODUCTO</a>
				<a href="#tabListProducts" class="mdl-tabs__tab">LISTAR PRODUCTOS</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Producto
							</div>
							<div class="full-width panel-content">
							<?php if ($id_Product == null){ ?><form action="<?php echo FRONT_ROOT."Product/addProduct";?>" method="post">
							<?php }else{ ?> <form action="<?php echo FRONT_ROOT."Product/ModifyProduct";?>" method="get"> 
								<input type="hidden" name="id_Product" class="form-control form-control-ml" value="<?php echo $id_Product;?>">
							<?php }  ?>
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Informacion Basica</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name ="BarCode"  id="BarCode" <?php if($id_Product != null){?> value = "<?php echo $Product->getCode() ;?>" <?php } ?> required>
												<label class="mdl-textfield__label" for="BarCode">Codigo</label>
												<span class="mdl-textfield__error">Codido Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "category" required>
													<option <?php if($id_Product != null){?> value ="<?php echo $Product->getCategory()->getId_category() ;?>" <?php } ?>> <?php if($id_Product != null){ echo $Product->getCategory()->getName()  ;}else{ echo "Seleccionar Categoria " ;}?> </option>
													<?php if(isset($listCategory)){ foreach($listCategory as $Category){ ?>
                                                    <option value="<?php echo $Category->getId_Category();?>"><?php echo $Category->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "brand" required>
												<option <?php if($id_Product != null){?> value ="<?php echo $Product->getBrand()->getId_brand() ;?>" <?php } ?>> <?php if($id_Product != null){ echo $Product->getBrand()->getName()  ;}else{ echo "Seleccionar Marca " ;}?> </option>
													<?php if(isset($listBrand)){ foreach($listBrand as $Brand){ ?>
                                                    <option value="<?php echo $Brand->getId_Brand();?>"><?php echo $Brand->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "industry" required>
												    <option <?php if($id_Product != null){?> value ="<?php echo $Product->getIndustry()->getId_industry() ;?>" <?php } ?>> <?php if($id_Product != null){ echo $Product->getIndustry()->getName()  ;}else{ echo "Seleccionar Industria " ;}?> </option>
													<?php if(isset($listIndustry)){ foreach($listIndustry as $Industry){ ?>
                                                    <option value="<?php echo $Industry->getId_industry();?>"><?php echo $Industry->getName();?></option> 
                                                    <?php } } ?>    
												</select>
										    </div>
											</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Descripcion del Producto</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name ="GasType" required>
												<option <?php if($id_Product != null){?> value ="<?php echo $Product->getDescriptionP()->getGasType()->getId_GasType() ;?>" <?php } ?>> <?php if($id_Product != null){ echo $Product->getDescriptionP()->getGasType()->getName();}else{ echo "Seleccionar Tipo de Gas " ;}?> </option>
													<?php if(isset($listGasType)){ foreach($listGasType as $GasType){ ?>
                                                    <option value="<?php echo $GasType->getId_GasType();?>"><?php echo $GasType->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "Aplication" required>
												<option <?php if($id_Product != null){?> value ="<?php echo $Product->getDescriptionP()->getAplication()->getId_aplication() ;?>" <?php } ?>> <?php if($id_Product != null){ echo $Product->getDescriptionP()->getAplication()->getName();}else{ echo "Seleccionar Tipo Aplicacion " ;}?> </option>
													<?php if(isset($listAplication)){ foreach($listAplication as $Aplication){ ?>
                                                    <option value="<?php echo $Aplication->getId_Aplication();?>"><?php echo $Aplication->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "Power" required>
												<option <?php if($id_Product != null){?> value ="<?php echo $Product->getDescriptionP()->getPower()->getId_Power() ;?>" <?php } ?>> <?php if($id_Product != null){ echo $Product->getDescriptionP()->getPower()->getDescription();}else{ echo "Seleccionar Tipo de Potencia " ;}?> </option>
													<?php if(isset($listPower)){ foreach($listPower as $Power){ ?>
                                                    <option value="<?php echo $Power->getId_Power();?>"><?php echo $Power->getDescription();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<h5 class="text-condensedLight">Agregar Foto</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="file" name ="photo" <?php if($id_Product != null){?> value ="<?php echo IMGCOOL_PATH.$product->getPhoto();?>"<?php } ?>> 
											</div>
											<h5 class="text-condensedLight">Agregar Ficha Tecnica</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="file" name ="dataSheet" <?php if($id_Product != null){?>  value ="<?php echo $Product->getDataSheet() ;?>" <?php } ?>>
											</div>
										</div>
										</div>
									<p class="text-center">
										<button type = "submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar Producto</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<form action="#">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
								<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
									<i class="zmdi zmdi-search"></i>
								</label>
								<div class="mdl-textfield__expandable-holder">
									<input class="mdl-textfield__input" type="text" id="searchProduct">
									<label class="mdl-textfield__label"></label>
								</div>
							</div>
						</form>
						<nav class="full-width menu-categories">
							<ul class="list-unstyle text-center">
							<?php if(isset($listNewCategory)) { foreach( $listNewCategory as $Category){ ?>
								<li><a href="<?php echo FRONT_ROOT.""?>"><?php echo $Category->getName();?></a></li>
								<?php } } ?>
							</ul>
						</nav>
					<div class="full-width text-center" style="padding: 30px 0;">
						<?php if(isset($listProduct )) { foreach($listProduct as $product ){ ?>
						<div class="mdl-card mdl-shadow--2dp full-width product-card">
							<div class="mdl-card__supporting-text">
								<?php echo $product->getCode() ."<br>";?>
							</div>
							   <div class="mdl-card__actions mdl-card--border">
									<small><?php echo $product->getCategory()->getName(). " "
									. $product->getDescriptionP()->getPower()->getDescription().
									" ". $product->getDescriptionP()->getGasType()->getName() .
									" ".$product->getBrand()->getName() ." "
									.$product->getDescriptionP()->getAplication()->getName();?></small><br>
									
							    </div>
								<div class="mdl-card__title">
									<img src="<?php echo IMGCOOL_PATH.$product->getPhoto()?>"  class="img-responsive">
								</div>
								<div class="mdl-card__supporting-text">
									<small><?php echo " . Aplicacion  : " . $product->getDescriptionP()->getAplication()->getName();?></small><br>
									<small><?php echo " . Tipo de Gas : " . $product->getDescriptionP()->getGasType()->getName();?></small><br>
									<small><?php echo " . Potencia    : " . $product->getDescriptionP()->getPower()->getDescription();?></small><br>
									<small>Stock</small><br>
								</div>
								<div class="mdl-card__actions mdl-card--border">
								<?php echo "Industria: " .$product->getIndustry()->getName();?><br>
							
								<a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Product/ShowModify?id_product=".$product->getId_product();?>"><i class="zmdi zmdi-edit"></i></a><br>
								<a class="mdl-list__item-secondary-action" href="<?php echo FRONT_ROOT."Product/RemoverProduct?id_product=".$product->getId_product();?>"><i class="zmdi zmdi-delete"></i></a><br>
								</div>
							</div>
							<?php } } ?>
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