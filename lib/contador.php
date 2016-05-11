<script>

    var segundos = 5;
    function contar(){
        if(segundos <= 0){
            document.getElementById('contador').innerHTML = 'Redireccionando ...';
            document.location = '../index.html';
        } else {
            segundos--;
            document.getElementById('contador').innerHTML = 'Redirección automática en ' + segundos + ' segundos.';
        }

    }
    setInterval('contar()',1000);
</script>
print"<br><div id='contador' align='center'>Redireccion automática en 5 segundos</div><br>";