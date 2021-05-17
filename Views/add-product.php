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
			
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">NUEVO PRODUCTO</a>
				<a href="#tabListProducts" class="mdl-tabs__tab">LISTAR PRODUCTO</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Producto
							</div>
							<div class="full-width panel-content">
								<form>
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Informacion Basica</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" name ="BarCode" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode" required>
												<label class="mdl-textfield__label" for="BarCode">Codigo</label>
												<span class="mdl-textfield__error">Codido Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "category" required>
													<option  disabled="" selected="">Seleccionar Categoria</option>
													<?php if(isset($listCategory)){ foreach($listCategory as $Category){ ?>
                                                    <option value="<?php echo $Category->getId_Category();?>"><?php echo $Category->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "brand" required>
													<option  disabled="" selected="">Seleccionar Marcar</option>
													<?php if(isset($listBrand)){ foreach($listBrand as $Brand){ ?>
                                                    <option value="<?php echo $Brand->getId_Brand();?>"><?php echo $Brand->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "provider" required>
													<option disabled="" selected="">Seleccionar Proveedor</option>
													<?php if(isset($listProvider)){ foreach($listProvider as $Provider){ ?>
                                                    <option value="<?php echo $Provider->getIdProvider();?>"><?php echo $Provider->getName();?></option> 
                                                    <?php } } ?>    
												</select>
										    </div>
											<h5 class="text-condensedLight">Unidad y Precios</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" name =StrockProduct  pattern="-?[0-9]*(\.[0-9]+)?" id="StrockProduct" required>
												<label class="mdl-textfield__label" for="StrockProduct">Unidad</label>
												<span class="mdl-textfield__error">Numero Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="PriceProduct">
												<label class="mdl-textfield__label" for="PriceProduct">Precio de Compra</label>
												<span class="mdl-textfield__error">Precio Invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="discountProduct">
												<label class="mdl-textfield__label" for="discountProduct">% Descuentos</label>
												<span class="mdl-textfield__error">descuento Invalido </span>
											</div>	
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Descripcion del Producto</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name ="GasType" required>
													<option  disabled="" selected="">Seleccionar Tipo de Gas</option>
													<?php if(isset($listGasType)){ foreach($listGasType as $GasType){ ?>
                                                    <option value="<?php echo $GasType->getId_GasType();?>"><?php echo $GasType->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "Aplication" required>
													<option  disabled="" selected="">Seleccionar Tipo de Aplicacion</option>
													<?php if(isset($listAplication)){ foreach($listAplication as $Aplication){ ?>
                                                    <option value="<?php echo $Aplication->getId_Aplication();?>"><?php echo $Aplication->getName();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input" name = "Power" required>
													<option disabled="" selected="">Seleccionar Tipo de potencia</option>
													<?php if(isset($listPower)){ foreach($listPower as $Power){ ?>
                                                    <option value="<?php echo $Power->getId_Power();?>"><?php echo $Power->getDescription();?></option> 
                                                    <?php } } ?>    
												</select>
											</div>
											<h5 class="text-condensedLight">Agregar Ficha Tecnica</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="file"> <!--FILE creo una carpeta donde guardo eso file y dedonde lo puede descargar si -->
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
								<li><a href="#!">Category 1</a></li>
								<li><a href="#!">Category 2</a></li>
								<li><a href="#!">Category 3</a></li>
								<li><a href="#!">Category 4</a></li>
							</ul>
						</nav>
						<div class="full-width text-center" style="padding: 30px 0;">
							<div class="mdl-card mdl-shadow--2dp full-width product-card">
								<div class="mdl-card__title">
									<img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
								</div>
								<div class="mdl-card__supporting-text">
									<small>Stock</small><br>
									<small>Category</small>
								</div>
								<div class="mdl-card__actions mdl-card--border">
									Product name
									<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
										<i class="zmdi zmdi-more"></i>
									</button>
								</div>
							</div>
							<div class="mdl-card mdl-shadow--2dp full-width product-card">
								<div class="mdl-card__title">
									<img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
								</div>
								<div class="mdl-card__supporting-text">
									<small>Stock</small><br>
									<small>Category</small>
								</div>
								<div class="mdl-card__actions mdl-card--border">
									Product name
									<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
										<i class="zmdi zmdi-more"></i>
									</button>
								</div>
							</div>
							<div class="mdl-card mdl-shadow--2dp full-width product-card">
								<div class="mdl-card__title">
									<img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
								</div>
								<div class="mdl-card__supporting-text">
									<small>Stock</small><br>
									<small>Category</small>
								</div>
								<div class="mdl-card__actions mdl-card--border">
									Product name
									<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
										<i class="zmdi zmdi-more"></i>
									</button>
								</div>
							</div>
							<div class="mdl-card mdl-shadow--2dp full-width product-card">
								<div class="mdl-card__title">
									<img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
								</div>
								<div class="mdl-card__supporting-text">
									<small>Stock</small><br>
									<small>Category</small>
								</div>
								<div class="mdl-card__actions mdl-card--border">
									Product name
									<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
										<i class="zmdi zmdi-more"></i>
									</button>
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