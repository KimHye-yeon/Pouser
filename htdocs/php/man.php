<!DOCTYPE html>
<head>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/man.css">
</head>
<body>
    <script>
    x = 0;
    index = -1;
        $(function(){
            $("table #divclass").hide();
            $('#container #form').hide();
            $('ul').hide();
            $('#container .section .notFound').hide();
             
            $('#container .section').click(function(){
                if(x == 0)
                {
                    index = $(this).index();
                    $(this).animate({opacity:"0.9"},700);
                    $(this).children('#form').show(1000);
                    $(this).children("p").hide(1000);
                    x++;
                }else if(x == 1)
                {
                    if($(this).index() != index)
                    {
                        $('#container .section').animate({opacity:"1"},700);
                        $('#container .section').children('#form').hide("slow");
                        $('#container .section').children("p").show("slow");
                        $('#container .section').children("ul").hide("slow");
                        $('#container .section .notFound').hide("slow");
                        x--;
                    }
                }
            });
        });
        function createData(id){
            var sendData ={
                grade:$(id+' #grade').val(),
                class:$(id+' #class').val(),
                number:$(id+' #number').val(),
                name:$(id+' #name').val()};
            console.log(sendData); 
            return sendData; 
        }
        function AjaxCall(id){
            $.ajax({
                type:'POST',
                url:'/sql/research.php',
                data: createData(id),
                dataType:"json",
                success:function(data, status, xhr){
                    console.log(data);
                    TableProduct(data,id);
                },error: function(jqXHR, textStatus, errorThrown) { 
                    console.log(jqXHR.responseText); 
                }
            });
        }
        function TableProduct(data, id){
            var TableOrder=0;
            if(id == '#AjaxForm1'){
                TableOrder = 1;
            }else if(id=='#AjaxForm2'){
                TableOrder = 2;
            }else if(id=='#AjaxForm3'){
                TableOrder = 3;
            }
            $('#container .section #TableResult'+TableOrder+' .section2 #bonusmark'+TableOrder).empty();
            $('#container .section #TableResult'+TableOrder+' .section3 #blackmark'+TableOrder).empty();
            $('#container .section #TableResult'+TableOrder+' .section4 #total'+TableOrder).empty();
            console.log(TableOrder);
            if(data.length <=0){
                NotSearch(TableOrder);
            }else{
                console.log(id);
                $('#container .section #TableResult'+TableOrder).show(1000);
                var str_1 = '<tr>';
                var str_2 = '<tr>';
                var str_3 = '<tr>';
                var bonus_score = 0;
                var black_score=0;
                str_1 += '<td>순번</td><td>점수</td><td>사유</td><td>일시</td></tr>';
                str_2 += '<td>순번</td><td>점수</td><td>사유</td><td>일시</td></tr>';
                $.each(data, function(i){
                    str_1 += '<td>'+(i+1)+'</td><td>'+data[i].bonusmark['score'] + '</td><td>' + data[i].bonusmark['reason'] + '</td><td>' + data[i].bonusmark['datatime'] + '</td></tr>';
                    str_2 += '<td>'+(i+1)+'</td><td>'+data[i].blackmark['score'] + '</td><td>' + data[i].blackmark['reason'] + '</td><td>' + data[i].blackmark['datatime'] + '</td></tr>';
                    if(data[i].bonusmark['score']!="")
                        bonus_score += (Number)(data[i].bonusmark['score']);
                    if(data[i].blackmark['score']!="")
                        black_score += (Number)(data[i].blackmark['score']);
                });
                str_3 += '<td>상점</td><td>'+bonus_score+'</td><td>벌점</td><td>'+black_score+'</td><td>합계</td><td>'+(bonus_score-black_score)+'</td></tr>';
                $('#container .section #TableResult'+TableOrder+' .section2 #bonusmark'+TableOrder).append(str_1);
                $('#container .section #TableResult'+TableOrder+' .section3 #blackmark'+TableOrder).append(str_2);
                $('#container .section #TableResult'+TableOrder+' .section4 #total'+TableOrder).append(str_3);
            }
        }
        function NotSearch(id){
            $('#container .section #form').hide("slow");
            $('#container .section #NotFound'+id).show(1000);
        }
    </script>
    <div id='container'>

        <div class = "section" id='box-left'>
            <p id>1학년</p>
            <div id = "form">
                <img src="/img/young.png">
                <form class="form-inline" id="AjaxForm1" name="AjaxForm">
                    <input type="hidden" id="grade" value="1">
                    <?php
                        echo file_get_contents('form.txt');
                    ?>
                </form>
                <button class="btn btn-default" type="submit" style="margin-left:30px;width:200px" onclick="AjaxCall('AjaxForm1')">검색</button>
            </div>
            <div id="NotFound1" class="notFound">
                <img src = "/img/search.png"/>
                <h2>해당 학생정보를 찾지 못했습니다!</h2>
            </div>
            <ul id="TableResult1">
                <div class = "section2">
                    <table class="table table-bordered" id = "bonusmark1" border= "2">
                        <caption>상점 목록</caption>
                    </table>
                </div>
                <button class="btn btn-default" type="submit" >검색</button>
                <div class = "section3">
                    <table class="table table-bordered" id = "blackmark1" border= "2">
                        <caption>벌점 목록</caption>
                    </table>
                </div>
                <div class = "section4">
                    <table class="table table-bordered" id = "total1" border= "2">
                        <caption>총 합계</caption>
                    </table>
                </div>
            <ul>
        </div>

        <div class = "section" id='box-center'>
            <p>2학년</p>
            <div id = "form">
                <img src="/img/boy.png">
                <form class="form-inline" id="AjaxForm2" name="AjaxForm">
                    <input type="hidden" id="grade" value="2">
                    <?php
                        echo file_get_contents('form.txt');
                    ?>
                </form>
                <button class="btn btn-default" type="submit" style="margin-left:30px;width:200px" onclick="AjaxCall('#AjaxForm2')">검색</button>
            </div>
            <div id="NotFound2" class="notFound">
                <img src = "/img/search.png"/>
                <h2>해당 학생정보를 찾지 못했습니다!</h2>
            </div>
            <ul id="TableResult2">
                <div class = "section2">
                    <table class="table table-bordered" id = "bonusmark2" border= "2">
                        <caption>상점 목록</caption>
                    </table>
                </div>
                <div class = "section3">
                    <table class="table table-bordered" id = "blackmark2" border= "3">
                        <caption>벌점 목록</caption>
                    </table>
                </div>
                <div class = "section4">
                    <table class="table table-bordered" id = "total2" border= "1">
                        <caption>총 합계</caption>
                    </table>
                </div>
            <ul>
        </div>

        <div class = "section" id='box-right'>
            <p>3학년</p>
            <div id = "form">
                <img src="/img/old.png">
                <form class="form-inline" id="AjaxForm3" name="AjaxForm">
                    <input type="hidden" id="grade" value="3">
                    <?php
                        echo file_get_contents('form.txt');
                    ?>
                <button class="btn btn-default" type="submit" style="margin-left:30px;width:200px">검색</button>
                </form>
            </div>
            <div id="NotFound3" class="notFound">
                <img src = "/img/search.png"/>
                <h2>해당 학생정보를 찾지 못했습니다!</h2>
            </div>
            <ul id="TableResult3">
                <div class = "section2">
                    <table class="table table-bordered" id = "bonusmark3" border= "1">
                    <caption>상점 목록</caption></table>
                </div>
                <div class = "section3">
                    <table class="table table-bordered" id = "blackmark3" border= "1">
                    <caption>벌점 목록</caption></table>
                </div>
                <div class = "section4">
                    <table class="table table-bordered" id = "total3" border= "1">
                        <caption>총 합계</caption>
                    </table>
                </div>
            </ul>
        </div>

    </div> 
</body>
</html> 