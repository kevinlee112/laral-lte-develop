<!DOCTYPE html>
<html>
    <head>
        <title>404.</title>

        <link href="https://fonts.lug.ustc.edu.cn/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Sorry, the page you are looking for could not be found.</div>
                <p class="btn btn-block btn-default disabled"  type="button" href="javascript:history.go(-1);">2秒后自动返回</p>
            </div>
        </div>
        <script type="text/javascript">
            function delayAct()
            {
                history.back();
            }
            var int = self.setInterval("delayAct()", 2000);
        </script>
    </body>
</html>
