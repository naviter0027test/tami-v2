<html>
    <head>
        <meta charset="utf-8">
        <title>管理系統</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/company/body.css' rel='stylesheet' />
    </head>
    <body>
@include('company.layout.menu')
        <div class="content">
            <h3>產品 - 新增</h3>
            <form method='post' action='/company/product/create' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h5><span>產品名稱</span></h5>
                <p> <input type="text" name="name" /> </p>
                <h5><span>產品名稱(英文)</span></h5>
                <p> <input type="text" name="nameEn" /> </p>
                <h5><span>產品聯絡人E-Mail</span></h5>
                <p>
                    <input type="email" name="email[]" />
                    <a href="#" class="addEmail"><i class="glyphicon glyphicon-add" >+</i></a>
                </p>
                <h5><span>產品圖片</span></h5>
                <p> <input type="file" name="picture1" /> </p>
                <h5><span>產品左下圖片1</span></h5>
                <p> <input type="file" name="picture2" /> </p>
                <h5><span>產品左下圖片2</span></h5>
                <p> <input type="file" name="picture3" /> </p>
                <h5><span>亮點資訊</span></h5>
                <p>
                    <div id="info" ></div>
                    <input type="hidden" name="info" />
                </p>
                <h5><span>亮點資訊(英文)</span></h5>
                <p>
                    <div id="infoEn" ></div>
                    <input type="hidden" name="infoEn" />
                </p>
                <h5><span>DM</span></h5>
                <p> <input type="file" name="dm" /> </p>
                <h5><span>是否啟用</span></h5>
                <p> 
                    <select type="text" name="active"> 
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select> 
                </p>
<!--
                <h5>影片(超連結，非內嵌)</h5>
                <p> 
                    <input type="text" name="video" /> 
                </p>
-->
                <p class=""> <button class="btn">新增</button> </p>
            </form>
        </div>
@include('admin.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/lib/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="/lib/jquery-validation/dist/localization/messages_zh_TW.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="/js/company/left.js"></script>
    <script src="/js/company/product/create.js"></script>
</html>
