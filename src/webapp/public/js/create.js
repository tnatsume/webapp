$(function(){
    alert('hello');
    $( 'input[name="kbn"]:radio' ).change( function() {
        var radioval = $(this).val();
        if(radioval == 0){
                document.getElementById('situation').style.display = "display";
                document.getElementById('value').style.display = "none";
                document.getElementById('return_Gift').style.display = "none";
        }else{
                document.getElementById('situation').style.display = "none";
                document.getElementById('value').style.display = "display";
                document.getElementById('return_Gift').style.display = "display";
        }
    });
});