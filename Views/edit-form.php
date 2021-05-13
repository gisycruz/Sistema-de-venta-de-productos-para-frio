<?php
include('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <form action="#>" method="">
               <div class="container">
                    <h3 class="mb-3">Modificar Departamento</h3>

                    <div class="bg-light p-4">
                         <div class="row">
                              <div class="col-lg-4">
                                   <label for="">Departamento</label>
                                   <div></div>
                              </div>                         

                              <input type="hidden" name="id" class="form-control form-control-ml" value="">

                              <div class="col-lg-4">
                                   <label for="">Contacto</label>
                                   <input type="text" name="" class="form-control form-control-ml" required value="<?php echo $flat->getContact() ?>">
                              </div>

                              <div class="col-lg-4">
                                   <label for="">Email</label>
                                   <input type="text" name="" class="form-control form-control-ml" required value="">
                              </div>                              

                         </div>
                         <div class="row">

                              <div class="col-lg-4">
                                   <label for="">Numero de Ocupantes</label>
                                   <input type="text" name="" class="form-control form-control-ml" required value="">
                              </div>

                              <div class="col-lg-4">
                                   <label for="bran">Proposito</label>
                                   <input type="text" name="" class="form-control form-control-ml" required value="">
                              </div>                              

                              <div class="col-lg-4">
                                   <span>&nbsp;</span>
                                   <button type="submit" name="" class="btn btn-primary ml-auto d-block">Guardar</button>
                              </div>

                         </div>
                    </div>
               </div>
          </form>
     </section>
</main>

<?php include('footer.php') ?>
