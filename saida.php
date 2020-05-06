<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-entrada.php");
    require_once ("conecta.php");
   
    verificaUsuario();
?>

<h1>Entrada e Saída</h1>
<?php if(isset($_COOKIE["usuario_logado"])) { ?>
    <p class="text-sucess">Você esta logado como: <?=$_COOKIE["usuario_logado"] ?>.</p>
<?php } ?>
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
                    <th>Saída</th>
                    <th>Total</th>
                    
                   
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
                    <th>Saída</th>
                    <th>Total</th>
                    
                 
                  </tr>
                </tfoot>
                <tbody>
                <?php
                        $saidas = listaSaida($conexao);
                      	foreach ($saidas as $saida):
					?>
                  <tr>
                   
                    <td><?= $saida['nome visitante'] ?></td>
                    <td><?= $saida['Nome Empresa'] ?></td>
                    <td><?= $saida['Nome Funcionário'] ?></td>
                    <td><?= $saida['veiculo'] ?></td>
                    <td><?= $saida['placa'] ?></td>
                    <td><?= date ('d/m/Y H:i:s' , strtotime($saida['entrada'])) ?></td>
                    <td><?= date ('d/m/Y H:i:s' , strtotime($saida['saida'])) ?></td>
                    <td><?= date ('H:i:s' , strtotime($saida['total'])) ?></td>
                                      
                   
                                      
                  </tr>
                  <?php

                    endforeach
                ?>
                </tbody>
              </table>
            </div>
          </div>
<?php require_once ("rodape.php");