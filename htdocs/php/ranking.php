<!DOCTYPE html>
<HTML>
    <HEAD>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/css/class.css">
        <script>
            glo_var = 0;
            x=0;
            bonus=0;black=0;name=0;total=0;
            $(function(){
                ajax(0);
                $("#menubar").children("ul").hide();
                $(".navbar .color").click(function(){
                    x =1;
                    var index = $(this).index();
                    if((index == 2) || (index == 3) || (index ==4))
                    {
                        $("#menubar").children("ul").slideDown(500);
                        if(index==2)
                        {
                            glo_var = 10;
                        }
                        if(index==3)glo_var = 20;
                        if(index==4)glo_var = 30;
                    }
                    $(this).css("color", "black");
                });
                $(".navbar .color").mouseleave(function(){
                    $(this).css("color", "rgba(175, 162, 162, 0.762)");
                }); 
                $("#menubar").mouseleave(function(){
                    $("#menubar").children("ul").slideUp(500);
                });
                $("#menubar .menubarul li").click(function(){
                    $("#menubar").children("ul").slideUp(500);
                    var txt = $(this).index();
                    ajax(txt+glo_var);  
                });
                $("#home").click(function(){
                    ajax(0);
                    x=0;
                });
                $("#excelbtn").click(function (e){
                    if(x == 0)
                    {
                        window.open('data:application/vnd.ms-excel,' + $('#table1').html());
                        e.preventDefault();
                    }else if(x ==1)
                    {
                        window.open('data:application/vnd.ms-excel,' + $('#table2').html());
                        e.preventDefault(); 
                    }
                });
            });
            function ajax(txt){
                $.ajax({
                    type:'POST',
                    url:'/sql/search.php',
                    data: {index:txt},
                    dataType: 'json',
                    success:function(data, status, xhr){
                        console.log(data);
                        Setting(data);
                    },error: function(jqXHR, textStatus, errorThrown) { 
                        console.log(jqXHR.responseText); 
                    console.log(errorThrown); 
                    console.log(jqXHR.status);
                    console.log(jqXHR.statusText); 
                    }
                });
            }
            function Setting(data){
                $('#table_result2').empty();
                    $('#table_result3').empty();
                    $('#table_result1').empty();
                str ="<tr><th style='background:#3A54B4; color :white;'>순위</th><th style='background:#3A54B4; color :white;' onclick = 'goname()'>이름<img src = '/img/arrow.png'></th><th style='background:#3A54B4; color :white;'>학년/반/번호</th><th onclick='gobonus()' style='background:#3A54B4; color :white;'>상점<img src = '/img/arrow.png'></th><th onclick='goblack()' style='background:#3A54B4; color :white;'>벌점<img src = '/img/arrow.png'></th><th onclick='gototal()' style='background:#3A54B4; color :white;'>합계<img src = '/img/arrow.png'></th></tr>";
                    str1 ="<tr><th onclick = 'gosort()' style='background:#3A54B4; color :white;'>순위</th><th onclick = 'gosort()' style='background:#3A54B4; color :white;'>이름</th><th onclick='gosort()' style='background:#3A54B4; color :white;'>학년/반/번호</th><th onclick='gosort()' style='background:#3A54B4; color :white;'>상점</th><th onclick='gosort()' style='background:#3A54B4; color :white;'>벌점</th><th onclick='gosort()' style='background:#3A54B4; color :white;'>합계</th></tr>";
                    str2 = "<tr><th style='background:#3A54B4; color :white;'>순위</th><th style='background:#3A54B4; color :white;'>학년</th><th style='background:#3A54B4; color :white;'>반</th><th style='background:#3A54B4; color :white;'>번호</th><th style='background:#3A54B4; color :white;'>이름</th><th style='background:#3A54B4; color :white;'>벌점</th><th style='background:#3A54B4; color :white;'>상점</th><th style='background:#3A54B4; color :white;'>합계</th><tr>";
                $.each(data,function(i){
                    if(x ==0)
                    {
                        if(i>=25)
                        {
                            if(data[i].total <= -20)
                            {
                                str1+='<td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+(i+1)+'</td><td style = "background:rgb(231, 117, 117);color:white" onclick="goPage()">'+data[i].name+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].grade+'/'+data[i].class+'/'+data[i].number+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].bonusmark+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'
                                +data[i].blackmark+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].total+'</td></tr>';
                            }
                            else{
                                str1+='<td>'+(i+1)+'</td><td>'+data[i].name+'</td><td>'+data[i].grade+'/'+data[i].class+'/'+data[i].number+'</td><td>'+data[i].bonusmark+'</td><td>'+data[i].blackmark+'</td><td>'
                                +data[i].total+'</td></tr>';
                            }
                        }else{
                            if(data[i].total <= -20)
                            {
                                str+='<td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+(i+1)+'</td><td style = "background:rgb(231, 117, 117);color:white" onclick="goPage()">'+data[i].name+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].grade+'/'+data[i].class+'/'+data[i].number+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].bonusmark+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'
                                +data[i].blackmark+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].total+'</td></tr>';
                            }
                        else{
                                str+='<td>'+(i+1)+'</td><td>'+data[i].name+'</td><td>'+data[i].grade+'/'+data[i].class+'/'+data[i].number+'</td><td>'+data[i].bonusmark+'</td><td>'+data[i].blackmark+'</td><td>'
                                +data[i].total+'</td></tr>';
                            }
                        }
                        
                    }else if(x ==1)
                    {
                        if(data[i].total <= -20)
                        {
                            str2+='<td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+(i+1)+'</td><td style = "background:rgb(231, 117, 117);color:white" onclick="goPage()">'+data[i].grade+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].class+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].number+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].name+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].bonusmark+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'
                            +data[i].blackmark+'</td><td style = "background:rgb(231, 117, 117);color:white"  onclick="goPage()">'+data[i].total+'</td></tr>';
                        }
                        else{
                            str2+='<td>'+(i+1)+'</td><td>'+data[i].grade+'</td><td>'+data[i].class+'</td><td>'+data[i].number+'</td><td>'+data[i].name+'</td><td>'+data[i].bonusmark+'</td><td>'+data[i].blackmark+'</td><td>'
                            +data[i].total+'</td></tr>';
                        }
                    }

                });
                if(x==0)
                {
                    $('#table_result2').append(str);
                    $('#table_result3').append(str1);
                }
                if(x==1){
                    $('#table_result1').append(str2);
                }

            }
            function goPage()
            {
                $('#myModal').show();
            }
            function close_pop(flag) {
                location.replace("/html/page2.php");
                $('#myModal').hide();
            };
            function goname()
            {
                if(name == 0)
                {
                    ajax(0);
                    name =1;
                }else{
                    ajax(1);
                    name =0;
                }
            }
            function gobonus()
            {
                if(bonus == 0)
                {
                    ajax(2);
                    bonus =1;
                }else{
                    ajax(3);
                    bonus =0;
                }
            }
            function goblack()
            {
                if(black == 0)
                {
                    ajax(4);
                    black =1;
                }else{
                    ajax(5);
                    black =0;
                }
            }
            function gototal()
            {
                if(total == 0)
                {
                    ajax(6);
                    total =1;
                }else{
                    ajax(7);
                    total =0;
                }
            }
        </script>
        <title>GSM 벌점관리시스템</title>
    </HEAD>
    <BODY>
        <div id = "menu">
            <ul class = "navbar">
                <li id = "leder" style = "color:rgb(231, 117, 117)" id = "home">RANKING<li>
                <li class = "color">1학년</li>
                <li class = "color">2학년</li>
                <li class = "color">3학년</li>
                <li id = "home"  class = "color">홈</li>
                <li id = "update"  class = "color">갱신</li>
            </ul>
        </div>
        <div id = "menubar">
            <ul class = "menubarul">
                <li>1반</li>
                <li>|</li>
                <li>2반</li>
                <li>|</li>
                <li>3반</li>
                <li>|</li>
                <li>4반</li>
            </ul>
        </div>
        <div id = "gptable">
            <table border="0.2"class="table table-hover" id = "table_result1">
                <colgroup>
                    <col width="12.5%" />
                    <col width="12.5%" />
                    <col width="12.5%" /> 
                    <col width="12.5" />
                    <col width="12.5%" />
                    <col width="12.5%" /> 
                    <col width="12.5" />
                    <col width="12.5%" />
                </colgroup>

            </table>
            <div id = "table1">
                <table border="0.2"class="table table-hover" id = "table_result1" style = "margin-top: 0px;width:70%">
                </table>
            </div>
            <div id = "table2">
                <table border="0.2"class="table table-hover" id = "table_result2" style = "margin-top: 0px;width:40%;float:left;margin-left:7%">
                </table>
            </div>
            <div id = "table3">
                <table border="0.2"class="table table-hover" id = "table_result3" style = "margin-top: 0px;margin-left:49%;width:40%">
  
                </table>
            </div>
        </div>
        <div id = "myModal" class = "modal">
            <div class="modal-content">
                <p style="text-align: center;"><span style="font-size: 14pt;"><b><span style="font-size: 24pt;">공지</span></b></span></p>
                <p style="text-align: center; line-height: 1.2;"><br />지금 벌점 점수가 너무 위험해요ㅠㅠ</p>
                <p style="text-align: center; line-height: 1.2;color:rgb(231, 117, 117);font-size:16px;font-weight:bold"><br />상점을 모으지 않으면 곧 퇴소!!</p>
                <p style="text-align: center; line-height: 1.2;"><br />밑에 상점모으기 버튼을 눌러서 봉사하세요^^</p>
                <p style="text-align: center; line-height: 1.2;"><br />힘들더라도 화이팅!!!</p>
                <p><br /></p>
                <div style="cursor:pointer;background-color:#DDDDDD;text-align: center;padding-bottom: 10px;padding-top: 10px;" onClick="close_pop();">
                    <span class="pop_bt" style="font-size: 13pt;" >
                         상점 모으기
                    </span>
                </div>
            </div>
        </div>
    </BODY>
</HTML>