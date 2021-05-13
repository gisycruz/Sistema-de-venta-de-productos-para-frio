<?php

include('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
     <div class="col-lg-4">
     <div class="container">
     <h2 class="mb-4">Precio Dolar Hoy </h2> 
               <label for="pricedolar"></label>
               <input type="text" name="pricedolar" class="form-control form-control-ml" required value="">
               </div>
               <div>
            <input type="submit" class="btn" value="Actualizar Precios" style="background-color:#DC8E47;color:white;"/>
          </div>
          </div>
               <br>
          <div class="container">
               <h2 class="mb-4">Listado de Productos </h2> 
               <br>
                <table class="table bg-light">
                     <thead class="bg-dark text-white">
                          <th>Codigo</th>
                          <th>Potencia</th>
                          <th>Type Gas</th>
                          <th>Aplicacion</th>
                          <th>Precio de costo</th>
                          <th>Precio con Iva</th>
                          <th>Precio de Venta</th>    
                     </thead>
                     <tbody>
                         <tr>
                              <td></td>
                         </tr>
                                                        
                     </tbody>
                </table>
          </div>
     </section>
</main>

<?php include('footer.php') ?>
<!-- pageContent -->
<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-store"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
				</p>
			</div>
		</section>
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Name</th>
							<th>Code</th>
							<th>Stock</th>
							<th>Price</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Product Name</td>
							<td>Product Code</td>
							<td>7</td>
							<td>$77</td>
							<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Product Name</td>
							<td>Product Code</td>
							<td>7</td>
							<td>$77</td>
							<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Product Name</td>
							<td>Product Code</td>
							<td>7</td>
							<td>$77</td>
							<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Product Name</td>
							<td>Product Code</td>
							<td>7</td>
							<td>$77</td>
							<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Product Name</td>
							<td>Product Code</td>
							<td>7</td>
							<td>$77</td>
							<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Product Name</td>
							<td>Product Code</td>
							<td>7</td>
							<td>$77</td>
							<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
						</tr>
						<tr>
							<td class="mdl-data-table__cell--non-numeric">Product Name</td>
							<td>Product Code</td>
							<td>7</td>
							<td>$77</td>
							<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</body>
</html>