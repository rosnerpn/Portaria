<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-entrada.php");
    require_once ("conecta.php");
   
    verificaUsuario();
?>


<h1>Visitantes na Empresa</h1>

<!-- Mensagens de alertas -->

<?php if(isset($_SESSION["danger"])) { ?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?= $_SESSION["danger"] ?></strong> 
      </div>
      <?php  unset($_SESSION["danger"]);} ?>
       

       <?php if(isset($_SESSION["success"])) { ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?= $_SESSION["success"] ?></strong> 
       </div>

       <?php  unset($_SESSION["success"]);} ?>

 <!-- Montagem do Datatable -->
 <div class="card mb-4">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  
                    <th>Visitante</th>
                    <th>Empresa</th>
                    <th>Funcionário</th>
                    <th>Veículo</th>
                    <th>Placa</th>
                    <th>Entrada</th>
                    
                    <th>Açôes</th>
                   </tr>
                </thead>
                <tfoot>
                  <tr>
                  
                    <th>Visitante</th>
                    <th>Empresa</th>
                    <th>Funcionário</th>
                    <th>Veículo</th>
                    <th>Placa</th>
                    <th>Entrada</th>
                    
                    <th>Ações</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                        $entradas = listaEntrada($conexao);
                      	foreach ($entradas as $entrada):
					?>
                  <tr>
                   
                    <td><?= $entrada['nome visitante'] ?></td>
                    <td><?= $entrada['Nome Empresa'] ?></td>
                    <td><?= $entrada['Nome Funcionário'] ?></td>
                    <td><?= $entrada['veiculo'] ?></td>
                    <td><?= $entrada['placa'] ?></td>
                    <td><?= date ('d/m/Y H:i:s' , strtotime($entrada['entrada'])) ?></td>
                    
                    <td><a class="far fa-arrow-alt-circle-down btn btn-warning" href="saida-visitante.php?id=<?=$entrada['id']?>"></a>
                    
                   
                                      
                  </tr>
                  <?php

                    endforeach
                ?>
                </tbody>
              </table>
            </div>
          </div>
<?php require_once ("rodape.php");