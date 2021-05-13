<?php 
require_once(VIEWS_PATH."validate-session.php");
  include_once('nav.php');
?>
   
<div id="breadcrumb" class="hoc clear"> 
<h6 class="heading">Categoria <?php echo $category->getName();?></h6>
  </div>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
          <form action ="<?php echo FRONT_ROOT."Product/showAddProduct"?>" method ="get" >
             <h6 class="heading">Lista de Marcas</h6>
          <table style="text-align:center;">
            <thead>
              <tr>
                <th style="width: 170px;">Nombre</th>
                <th style="width: 170px;">Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php if( !empty($listBrand) && isset($listBrand)){ foreach($listBrand as $brand){?>
             <tr> 
                <td><?php echo $brand->getName() ;?></td>
                <td>
                  <button class="btn" style="font-size: 12px" type="submit" name ="id_brand" value = "<?php echo $brand->getId_brand();?>" >Agregar Producto</button>
                </td>
              </tr>
              <?php } } ?>
            </tbody>
            </tr>
          </table>
          </form>
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include_once('footer.php');
?>
  