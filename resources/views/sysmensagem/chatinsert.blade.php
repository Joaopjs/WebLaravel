<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserir no db</title>
</head>

<body>

    
while($l->valid()):
$vededor = $l->current()->id_Tib;
$nvend =  $l->current()->firstTib;
$tibmail =  $l->current()->emailTib;
$l->next();


endwhile;


    echo "###################<br>";
    $idusua = substr($num_user,strlen($num_senha),$num_senha);
    echo $valueget."<br>";
    echo $idusua."<br>";
    echo $tab."<br>";
    echo $vededor."<br>";
    echo $nvend."<br>";
    echo "Quantidado de digitos: ".strlen($num_senha)."<br>";
    
    echo "###################<br>";
    
    

        $linha = $valueget."".$vededor."".$num;
    
    $tibmail = preg_replace("/[^a-zA-Z0-9\s]/", "", $tibmail);


$mensagem = $_POST["mensagem"];

//acima estou pegando o que foi digitado pelo usuário la no formulario

if($meemail != $tibmail){                          //sender
    $sql = "INSERT INTO $tibmail(enome, idcompador, remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$vededor', '$Descriptografado', '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());

     INSERT INTO $meemail(enome, idcompador,  remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$vededor', '$Descriptografado', '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());";
}else{
    $sql = "INSERT INTO $Descriptografado(enome, idcompador, remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$vededor', '$Descriptografado', '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());

     INSERT INTO $meemail(enome, idcompador,  remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$vededor', '$Descriptografado', '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());";



}


$result = $conn->exec($sql);

if($result){
            
header("Location:chatform?page=$valueget&g=$tografado&h=$dest"); 
}else{
echo "<br>Erro ao Salvar<br />
  ".$name." ".$vededor." ".$Descriptografado." ".$tibmail." ".$mensagem." ".$valueget." ".$nvend." tibfoto',";
}


//header('Location:formulario.php'); //estou redirecionando para a pagina formulario novamente  
?>
</body>
</html>