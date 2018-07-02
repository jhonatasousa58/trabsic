<?php
  session_start();
  include 'inc/conectDB.php';

  $doenca = mysqli_query($conexao,"SELECT * FROM doencas");

    include "inc/header.php";

?>
    <div class="container-flex">
        <?php include "inc/mlateral.php"; ?>
      <div class="parte-central">
          <?php include "inc/mtop.php"; ?>
        <div class="corpo-meio">
          
          <div class="titulo-centro">
            <h3> FORMULÁRIO DE EXTRAÇÃO DE INFORMAÇÕES DE NOTÍCIAS DA MÍDIA SOBRE EVENTOS DE INTERESSE A SAÚDE </h3>
          </div>
          <br>
          <div class="titulo-centro">
            <h4>DADOS GERAIS DA NOTÍCIA</h4>
          </div>
          <br>
          <form action="asdas.php" method="POST">
            <div class="form-group">
              <label for="tituloOriginal">1) TÍTULO ORIGINAL DA NOTÍCIA:</label>
              <input type="text" name="tituloOriginal" class="form-control" id="tituloOriginal" placeholder="Título original da notícia">
            </div>
            <div class="form-group">
              <label for="tituloPortugues">2) TÍTULO DA NOTÍCIA EM PORTUGUÊS:</label>
              <input type="text" name="tituloPortugues" class="form-control" id="tituloPortugues" placeholder="Título da notícia em português">
            </div>
            <div class="form-group">
              <label for="fonteNoticia">3) FONTE DA NOTÍCIA:</label>
              <input type="text" name="fonteNoticia" class="form-control" id="fonteNoticia" placeholder="Fonte da notícia">
            </div>
            <div class="form-group">
              <label for="linkNoticia">4) LINK DA NOTÍCIA:</label>
              <input type="link" name="linkNoticia" class="form-control" id="linkNoticia" placeholder="Link da notícia">
            </div>

            <div class="container-flex">
              <div class="form-group padding-10">
                <label for="linkNoticia">5) DATA DA PUBLICAÇÃO:</label>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" name="dataPublicacao" class="form-control tam-date" id="dataPublicacao" placeholder="Link da notícia">
              </div>
              <div class="form-group padding-10">
                <label for="linkNoticia">6) DATA DA ATUALIZAÇÃO:</label>
                <input type="date" name="dataAtualizacao" class="form-control tam-date" id="dataAtualizacao" placeholder="Link da notícia">
              </div>
              <div class="form-group padding-10">
                <label for="linkNoticia">7) DATA DA BUSCA:</label>
                <input type="date" name="dataBusca" class="form-control tam-date" id="dataBusca" placeholder="Link da notícia">
              </div>
            </div>
            <br>

            <br>
            <div class="titulo-centro">
              <h4>DADOS SOBRE A(S) DOENÇA(S)/AGRAVO(S)</h4>
            </div>
            <br>
            <div class="form-group padding-date">
              <label for="numDoencas">8) QUANTIDADE DE DOENÇAS/AGRAVOS QUE A NOTÍCIA ABORDA:</label>
              <input type="number" name="numDoencas" class="form-control tam-date" id="numDoencas" placeholder=""  onchange="get(this.value)">
            </div>
<!-- copia do input
              <script>
                  function get(val){
                          var obj = parseInt(val);
                          var i;
                          for(i=1;i<obj;i++){
                              var source = $('#copia'),
                                  clone = source.clone();

                              clone.insertBefore(source);
                          }

                  }
              </script>
               -->
              <div id="base">
          <div id="copia">
            <div class="input-group mb-3 padding-date">
              <label for="menu-doencas" class="padding-date">9) INFORME A DOENÇA:</label>
              <select class="custom-select" id="menu-doencas" name="doenca[]">
                <option value="" selected>Doenças</option>
                <?php
                  while($doencas = mysqli_fetch_assoc($doenca)) {
                    echo "<option value=".$doencas["idDoenca"].">".$doencas["nomeDoenca"]."</option>";
                  }
                ?>
              </select>
              <small style="padding-left: 10px;">*Caso não encontre a doença, <a href="doenca.php">CLIQUE AQUI</a> para cadastra-la </small>
            </div>

            <div class="input-group mb-3 padding-date">
              <label for="menu-doencas" class="padding-date">10) INFORME A LOCALIDADE:</label>
              <div class="radio-inline" id="opcao">
                <label><input class="radio-inline" value="nacional" id="nacional" onclick="show_menu()" type="radio" name="optradio[]">Nacional</label>
              </div>

              <div class="radio-inline">
                <label><input type="radio" value="internacional" id="internacional" onclick="show_menu()" name="optradio[]">Internacional</label>
              
              </div>
            </div>

            <div class="input-group mb-3" id="menu-nacional">
              <div class="container-flex" style="padding: 10px;">
                <div class="padding-date">
                  <select class="custom-select padding-date" id="menu-json-regiao" name="regiao[]">
                    <option value="" selected>Regiao</option>
                  </select>
                </div>
                <div>
                  <select class="custom-select padding-date" id="menu-json-estado" name="estado[]">
                    <option value="" selected>Estado</option>
                  </select>
                </div>             
              </div>
              <div class="container-flex">
                <div class="form-group mb-3 padding-10">
                  <label for="inNacional">10.1) CIDADE/MUNICÍPIO:</label>
                  <input type="text" class="form-control tam-date" name="cidade[]" id="inNacional" placeholder="Digite a Cidade/Municípo">
                </div>
                <div class="form-group mb-3 padding-10">
                  <label for="outro">10.2) OUTRO:</label>
                  <input type="text" class="form-control tam-date" name="outroNacional[]" id="outro" placeholder="Outra informação">
                </div> 
              </div>
            </div>

            <div class="form-group mb-3" id="menu-internacional">
              <div style="padding: 10px;">
                <select class="custom-select padding-date" id="menu-json-continente" name="continente[]">
                  <option value="" selected>Continente</option>
                </select>
              </div>
              <div class="form-group mb-3 container-flex">
                <div class="padding-10">
                  <label for="inInternacional">10.1) INFORME O PAÍS:</label>
                  <input type="text" class="form-control tam-date" name="pais[]" id="inInternacional" placeholder="Digite o País">
                </div>
                <div class="form-group mb-3 padding-10">
                  <label for="rePais">10.2) REGIÃO DO PAÍS:</label>
                  <input type="text" class="form-control tam-date" id="regPais[]" name="regPais" placeholder="Região do País">
                </div>
                <div class="form-group mb-3 padding-10">
                  <label for="outroPais">10.1) OUTRA INFORMAÇÃO:</label>
                  <input type="text" class="form-control tam-date" id="outroPais[]" name="outroPais" placeholder="Outra informação">
                </div>  
              </div>   
            </div>
              <div class="row">
            <div class="container-flex">
              <div class="form-group padding-10">
                <label for="referenciaInicial">11) Periodo de Referencia Inicial:</label>
                <input type="date" name="referenciaInicial[]" class="form-control tam-date" id="referenciaInicial">
              </div>
              <div class="form-group padding-10">
                <label for="referenciaFinal">11.1) Periodo de Referencia Final:</label>
                <input type="date" name="referenciaFinal[]" class="form-control tam-date" id="referenciaFinal">
              </div>
            </div>
            </div>

            <div class="input-group mb-3 padding-date">
              <label for="dadosQuant" class="padding-date">12) POSSUI DADOS QUANTITATIVOS?</label>
              <div class="radio-inline" id="opcao">
                <label><input class="radio-inline" value="sim" id="sim" onclick="show_menu_quanti()" type="radio" name="dadosQ[0]">Sim</label>
              </div>
              <div class="radio-inline">
                <label><input type="radio" value="nao" id="nao" onclick="show_menu_quanti()" name="dadosQ[0]">Não</label>
              </div>
            </div>
            <div class="form-group mb-3" id="menu-sim">
              <div class="form-group mb-3 padding-10">
                <label for="infoQuali">12.1) INFORMAÇÕES QUALITATIVAS:</label>
                <input type="text" class="form-control" name="infoQuali[]" id="infoQuali" placeholder="Informações Qualitativas">
              </div>
              <div class="container-flex ">
                <div class="form-group mb-3 padding-10">
                  <label for="suspeitos">12.2) NÚMERO DE CASOS SUSPEITOS:</label>
                  <input type="number" class="form-control" style="" name="suspeitos[]" id="suspeitos" placeholder="Num casos suspeitos">
                </div>
                <div class="form-group mb-3 padding-10">
                  <label for="casosConfirm">12.3) NÚMERO DE  CASOS CONFIRMADOS:</label>
                  <input type="number" class="form-control" name="casosConfirm[]" id="casosConfirm" placeholder="Num casos confirmados">
                </div>
                <div class="form-group mb-3 padding-10">
                  <label for="casosProvaveis">12.4) NÚMERO DE CASOS PROVÁVEIS:</label>
                  <input type="number" class="form-control" name="casosProvaveis[]" id="casosProvaveis" placeholder="Num casos provaveis">
                </div>
                <div class="form-group mb-3 padding-10">
                  <label for="obitos">12.5) NÚMERO DE ÓBITOS:</label>
                  <input type="number" class="form-control" name="obitos[]" id="obitos" placeholder="Num Óbitos">
                </div> 
                <div class="form-group mb-3 padding-10">
                  <label style="padding-bottom: 19px;" for="outroDados">12.6) OUTRO:</label>
                  <input type="text" class="form-control" name="outroDados[]" id="outroDados" placeholder="Outras informações">
                </div> 
              </div>

            </div>


              <input type="button" value="Remover" class="remDiv" />

              <br> <br>

            </div>

              </div>
              <br> <br>
              <input type="button" value="Adicionar Mais Uma Doença" id="add" class="addDiv" />
            <div class="padding-10">
              <button type="submit" name="btncadN" class="btn btn-success"> Cadastrar</button>
            </div>
          </form>


        </div>
      </div>
    </div>
<?php include "inc/footer.php"; ?>