<!DOCTYPE html>
    <head>
    </head>
    <body>
        <form action = "inserttest.php" method = "get">
            <input type="hidden" name = "grade" id="grade" value="1">
            <label for="">학생코드</label>
            <input type = "text" id = "code" name = "code">
            <label for="">선생코드<label>
            <input type = "text" id = "serial" name = "serial">
            <label for="">상점점수</label>
            <input type = "text" id = "bonus" name = "bonus">
            <label for="">상점사유</label>
            <input type = "text" id = "reason" name = "reason">
            <input type = "submit">
        </form>
        <form action = "inserttest.php" method = "get">
            <input type="hidden" id="grade" value="2" name = "grade">
            <label for="">학생코드</label>
            <input type = "text" id = "code" name = "code">
            <label for="">선생코드<label>
            <input type = "text" id = "serial" name = "serial">
            <label for="">벌점점수</label>
            <input type = "text" id = "bonus" name = "bonus">
            <label for="">벌점사유</label>
            <input type = "text" id = "reason" name = "reason">
            <input type = "submit">
        </form>
    </body>
</html>