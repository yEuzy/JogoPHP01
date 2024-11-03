    <?php
    session_start();


    if(session_id() == ''){
        $_SESSION['numero'] = mt_rand(0,4);
    }


    $palavras = array('esqueleto
    ', 'bruxa', 'abobora', 'zumbi', 'lobisomem');
    $palavraQnt = strlen($palavras[$_SESSION['numero']]);
    $palavraSec = array();


    $letra = $_GET['palavra'];

    function lelo($letra, $palavras, $palavraSec, $palavraQnt){
        while(count($palavraSec) < $palavraQnt){
            $palavraSec[] = '_';
        };

        $posicao = strpos($palavras[$_SESSION['numero']],$letra);

        if($posicao !== false){
            $palavraSec[$posicao] = $letra;
        }
        return $palavraSec;
    };

    if($palavras[$_SESSION['numero']] !== $_GET['palavra']){
        $palavraSec = lelo($letra, $palavras, $palavraSec, $palavraQnt);
    }
    ?>


    <!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>A001 </title>
    </head>
    <body>

        <div id="container">
            <h1>Acerte a palavra</h1>
            
            <div id="palavra">
                <?php echo implode(" ", $palavraSec) . '- ' . $palavraQnt . ' letras'?>
            </div>

        <form action="index.php" method="GET">
            <input type="text" name="palavra">
            <button type="">Tentar</button></form>
            <?php
                switch($_SESSION['numero']){
                    case 0:
                    echo 'dica: branco';
                    break;
                    case 1:
                        echo 'dica: vassoura';
                        break;
                    case 2:
                        echo 'dica: laranja';
                        break;
                    case 3:
                        echo 'dica: cerebro';
                        break;
                    case 4:
                        echo 'dica: lua cheia';
                        break;
                }

                if($_GET['palavra'] == null){
                }
                else{
                    if($_GET['palavra'] ==  $palavras[$_SESSION['numero']]){
                    echo '<br><span id="acertou">Você acertou!</span>';
                    $_SESSION['numero'] = rand(0,4);
                    $palavraSec = [];
                    while(count($palavraSec) < $palavraQnt){
                        $palavraSec[] = '_';
                    };
                }
                else if ($_GET['palavra'] == ''){
                    echo '<br>Escreva uma palavra';
                    }
                else{
                    echo '<br>Você errou!';
                    }
                }

        ?>
    </div>

    </body>
    </html>


