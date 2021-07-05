
<html>



<body>



<form action="calculadora.php" method="post">


Nome do anúncio: <input type="text" name="nome_anuncio"> <br> <br>
Cliente: <input type="text" name="cliente_nome"> <br><br>
Data de início: <input type="text" name="data_inicio"> <br><br>
Data de término: <input type="text" name="data_termino"> <br><br>
Investimento por dia: <input type="number" name="investimento_diario"> <br><br>
Valor de Investimento: <input type="number" name="valor_investimento"> <br><br>

<input type="submit">

</form>



</body>

</html>


<?php


if($_POST){ # válida se tem conteudo no POST


    $anuncio = $_POST;

    // print "<pre>";
    // print_r($anuncio);
    // print "</pre>";


    print("Nome do anúncio: $anuncio[nome_anuncio]");
    echo nl2br("\n");
    print("Cliente: $anuncio[cliente_nome]");
    echo nl2br("\n");
    print("Data de Início: $anuncio[data_inicio]");
    echo nl2br("\n");
    print("Data de Término: $anuncio[data_termino]");
    echo nl2br("\n");
    print("Investimento por dia: $anuncio[investimento_diario]");
    echo nl2br("\n");
    echo nl2br("\n");

    $valorInvestimento = $anuncio['valor_investimento']; 

    print("Valor de investimento : $valorInvestimento reais");

    echo nl2br("\n");
    print("R$ 1,00 investido a cada visualização do anúncio original ");

    echo nl2br("\n");

    $vizualisacaoAnuncioOriginal = 30; # 30 pessoas visualizam o anúncio original (não compartilhado) a cada R$ 1,00 investido.

    $quantVisualizacoesOriginal = $vizualisacaoAnuncioOriginal * $valorInvestimento;


    print("Quantidade de visualização originais previstas: $quantVisualizacoesOriginal . A cada 100 pessoas que visualizam um anúncio, 12 clicam nele.");

    $quantCliques = $quantVisualizacoesOriginal / 100 * 12.00; # a cada 100 pessoas que visualizam o anúncio 12 clicam nele.
    echo nl2br("\n");


    print("Então é previsto : $quantCliques cliques, a cada 20 pessoas que clicam no anúncio 3 compartilham nas redes sociais.");
    echo nl2br("\n");


    $ref = 0;
    $compartilhamentos = 0;

    for($index=0;$index<=$quantCliques;$index++){ # o for foi utilizado para poder contabilizar a quantidade de compartilhamentos

        if($index == 20){ # a cada 20 , compartilha , index recebe apenas uma vez o valor de 20
            $ref = $index; # guardar valor de referencia 20, ref = 20
            $compartilhamentos = $compartilhamentos + 3;
        }


        if ( ($index - $ref) == 20){ # guarda o valor referencia de 20 em 20, checando se esta dentro do intervalo  
            $compartilhamentos = $compartilhamentos + 3; # compartilhamento tambem atualiza
            $ref = $index; # atualiza o valor de ref
        }


    }

    print("Seu anúncio possívelmente será compartilhado $compartilhamentos vezes, cada compartilhamento nas redes sociais gera 40 novas visualizações.");
    echo nl2br("\n");
    $visualizacoesCompartilhamento = $compartilhamentos * 40;


    #o mesmo anúncio é compartilhado no máximo 4 vezes em sequência
    #(1ª pessoa -> compartilha -> 2ª pessoa -> compartilha - > 3ª pessoa -> compartilha -> 4ª pessoa)
    
    $visualizacoesdaSequencia = 40 * 3;
    $totalVisualizacoesCompartilhamento = $visualizacoesCompartilhamento + $visualizacoesdaSequencia;

    print("É previsto que seus compartilhamentos rendam $visualizacoesCompartilhamento novas visualizações, seu anúncio pode ser compartilhado 4 vezes em sequência, 
    logo seu anúncio terá um valor total de $totalVisualizacoesCompartilhamento visualizações através de compartilhamento.");
    echo nl2br("\n");
    $totalVisualizacoes = $quantVisualizacoesOriginal + $totalVisualizacoesCompartilhamento;
    print("O total de visualizações previstos considerando anúncio original + compartilhamentos foi de: $totalVisualizacoes visualizações");
    echo nl2br("\n");
}


?>
