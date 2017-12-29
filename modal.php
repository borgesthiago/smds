     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastrar Documento Recebido</h4>
              </div>
              <div class="modal-body">
                <form role="form" action="#" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo:</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Ofício</option>
                            <option>C.I.</option>
                            <option>Relatório</option>
                            <option>Outros</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Origem:</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#CG">Chefe de Gabinete</option>
                            <option value="http://www.pmsg.rj.gov.br/procuradoria/index.php">Procurador-Geral</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Secretaria de Habitação</option>
                            <option value="http://www.pmsg.rj.gov.br/administracao/index.php">Secretaria Municipal de Administração</option>
                            <option value="http://www.pmsg.rj.gov.br/elicitacaoc/">Secretaria Municipal de Compras e Licitações</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMCI">Secretaria Municipal de Controle Interno</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SECULTUR e">Secretaria Municipal de Cultura e Turismo e Fundação de Artes de São Gonçalo</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMDE">Secretaria Municipal de Desenvolvimento Econômico, Ciência e Tecnologia, Agricultura e Pesca, e Trabalho</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SDS">Secretaria Municipal de Desenvolvimento Social, Infância e Adolescência</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMDU">Secretaria Municipal de Desenvolvimento Urbano</option>
                            <option value="http://www.pmsg.rj.gov.br/educacao/">Secretaria Municipal de Educação</option>
                            <option value="http://www.pmsg.rj.gov.br/esportelazer/">Secretaria Municipal de Esporte e Lazer</option>
                            <option value="http://www.pmsg.rj.gov.br/fazenda/index.php">Secretaria Municipal de Fazenda</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMGOV">Secretaria Municipal de Governo e Comunicação Social</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Secretaria Municipal de Meio Ambiente</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SPPE">Secretaria Municipal de Planejamento e Projetos Especiais</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SPI">Secretaria Municipal de Políticas Públicas para o Idoso, Mulher e Pessoa com Deficiência</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SMS">Secretaria Municipal de Saúde e Fundação Municipal de Saúde</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SMPU">Secretaria Municipal de Segurança Pública</option>
                            <option value="http://www.pmsg.rj.gov.br/sec_transporte">Secretaria Municipal deTransporte</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Subsecretaria de Cerimonial</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Subsecretaria Municipal de Comunicação Social</option>
                            <option value="Ministério Público"> Ministério Público</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDoc">N° Documento:</label>
                        <input type="text" class="form-control" placeholder="145/MP/2017">
                    </div>
                    <div class="form-group">
                        <label>Data do Documento:</label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" placeholder="12/12/2017">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                </div>
                <!-- /.box-body -->                
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#msg_salvo">Salvar</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		<!--modal-->
		  <div class="modal" id="msg_salvo" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
				<div class="modal-content-background-color:#FF0000">
				 
				  <div class="modal-body">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Alerta!</h4>
              Os dados foram salvo com sucesso.
            </div>  
				  </div>				  
				</div>
			  </div>
			</div>
        <!-- /.modal -->
        		<!--modal-->
		  <div class="modal" id="msg_erro" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
				<div class="modal-content-background-color:#FF0000">
				 
				  <div class="modal-body">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Alerta!</h4>
              Dados incorretos. Verifique!
            </div>  
				  </div>				  
				</div>
			  </div>
			</div>
        <!-- /.modal -->
<!--modal-->
<div class="modal fade" id="encaminhar_recebido">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Encaminhar Documento Recebido</h4>
              </div>
              <div class="modal-body">
                <form role="form" action="#" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo:</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Ofício</option>
                            <option>C.I.</option>
                            <option>Relatório</option>
                            <option>Outros</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Origem:</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#CG">Chefe de Gabinete</option>
                            <option value="http://www.pmsg.rj.gov.br/procuradoria/index.php">Procurador-Geral</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Secretaria de Habitação</option>
                            <option value="http://www.pmsg.rj.gov.br/administracao/index.php">Secretaria Municipal de Administração</option>
                            <option value="http://www.pmsg.rj.gov.br/elicitacaoc/">Secretaria Municipal de Compras e Licitações</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMCI">Secretaria Municipal de Controle Interno</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SECULTUR e">Secretaria Municipal de Cultura e Turismo e Fundação de Artes de São Gonçalo</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMDE">Secretaria Municipal de Desenvolvimento Econômico, Ciência e Tecnologia, Agricultura e Pesca, e Trabalho</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SDS">Secretaria Municipal de Desenvolvimento Social, Infância e Adolescência</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMDU">Secretaria Municipal de Desenvolvimento Urbano</option>
                            <option value="http://www.pmsg.rj.gov.br/educacao/">Secretaria Municipal de Educação</option>
                            <option value="http://www.pmsg.rj.gov.br/esportelazer/">Secretaria Municipal de Esporte e Lazer</option>
                            <option value="http://www.pmsg.rj.gov.br/fazenda/index.php">Secretaria Municipal de Fazenda</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SEMGOV">Secretaria Municipal de Governo e Comunicação Social</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Secretaria Municipal de Meio Ambiente</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SPPE">Secretaria Municipal de Planejamento e Projetos Especiais</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SPI">Secretaria Municipal de Políticas Públicas para o Idoso, Mulher e Pessoa com Deficiência</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SMS">Secretaria Municipal de Saúde e Fundação Municipal de Saúde</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#SMPU">Secretaria Municipal de Segurança Pública</option>
                            <option value="http://www.pmsg.rj.gov.br/sec_transporte">Secretaria Municipal deTransporte</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Subsecretaria de Cerimonial</option>
                            <option value="http://www.pmsg.rj.gov.br/secretaria.php#">Subsecretaria Municipal de Comunicação Social</option>
                            <option value="Ministério Público"> Ministério Público</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDoc">N° Documento:</label>
                        <input type="text" class="form-control" placeholder="145/MP/2017">
                    </div>
                    <div class="form-group">
                        <label>Data do Documento:</label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" placeholder="12/12/2017">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                </div>
                <!-- /.box-body -->                
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#msg_salvo">Salvar</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->