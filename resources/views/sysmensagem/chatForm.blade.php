<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat</title>

<link rel="shortcut icon" href="imagens/logolink.png" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
function gonow()
{
    document.getElementById('chat').contentWindow.scrollTo(10,0);
}
</script>

<style>
     body{
     background-color:#F0FFF0;
     
 }


</style>

</head>

<body onLoad="gonow()" >

<div align="center" style="padding:0px">

    
    <form action="{{ route('chatinsert')}}/{{$id}}/{{$res}}/{{$des}}" method='post' name='chat' id='chat'>
        {{ csrf_field() }}
            
                <iframe id='chat' src="{{ route('exibir')}}/{{$id}}/{{$res}}/{{$des}}" width='100%' height='300px' name='chat' scrolling='auto' style='background:#FFF' frameborder='0'></iframe>
            
                
                <textarea class='form-control' name='mensagem' cols='47' rows='2' id='mensagem' maxlength='90' style='resize: none'></textarea>
            
                    <div align='right'>
                        <input type='submit' class='btn btn-default' name='Submit' value='enviar comentario' />
                    </div>
                
    </form>
    
 </div>
 <div style="clear:both;"><p></p></div>
</body>
</html>