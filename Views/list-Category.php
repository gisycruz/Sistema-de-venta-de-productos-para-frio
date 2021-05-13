
<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Listado de Categoria</h6>
  </div>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
          <form action ="<?php echo FRONT_ROOT."Brand/showAddBrand"?>" method ="get" >
          <table style="text-align:center;">
            <thead>
              <tr>
                <th style="width: 170px;">Nombre</th>
                <th style="width: 170px;">Accion</th>
            </tr>
            </thead>
            <tbody>
           
             <tr>
                
                <td></td>
                <td>
                  <button class="btn" style="font-size: 12px" type="submit" name ="id_category" value = "<?php  echo $category->getId_category();?>" >Agregar Marca</button>
                  <button class="btn" style="font-size: 12px"> <a href="<?php echo FRONT_ROOT."Brand/showListBrand?id_category=" . $category->getId_category();?>">Listar Marcas</a></button>
                </td>
               
              </tr>
            
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
  