<script src="http://www.google.com/jsapi"></script>
<script>
    google.load("jquery", "1.4.0");
</script>
<script type="text/javascript">
    $(function() {
        $('#buttoncheck').click(function () {
            var var_name = $("input[name='radio1']:checked").val();
            $('#btn_get').val(var_name);
        });
    });
</script>
<html>
<input type="text">
    <head>
        <script type="text/javascript" src="" ></script>
    </head>
    <body>
        <input type="radio" value="Blue" name="radio1">Blue</input>
        <input type="radio" value="White" name="radio1">White</input>
        <input type="radio" value="Red" name="radio1">Red</input>
        <input id="buttoncheck" type="button" name="btn" value="Click"></input>
        <br />
        <input type="text" id="btn_get" name="get_btn_value"></input>
    </body>
</html>


<SCRIPT>
var xmlHttp;
function GetXmlHttpObject(){
    try{
        xmlHttp = new XMLHttpRequest();
    }
    catch(e){
        try{
            xmlHttp = new ActiveXObject(Msxml2.XMLHTTP);
        }
        catch(e){
            try{
                xmlHttp = new ActiveXObject(Microsoft.XMLHTTP);
            }
            catch(e){
                alert("doesn't support AJAX");
                return false;
            }
        }
    }
}
function hello(a){
    GetXmlHttpObject();
    xmlHttp.open("GET","ajax_radio.html?",true);
    xmlHttp.onreadystatechange = response;
    xmlHttp.send(null);
}
function response(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200){
            var radio_text = xmlHttp.responseText;
            document.getElementById('btn_get').innerHTML = radio_text;
        }
    }
}

</script>