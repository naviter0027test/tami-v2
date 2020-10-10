<html>
    <head>
        <meta charset="utf-8">
        <title>管理系統</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/admin/body.css' rel='stylesheet' />
    </head>
    <body>
@include('admin.layout.menu')
        <div class="content">
            <h3>廠商 - 新增</h3>
            <form method='post' action='/admin/company/create' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h5><span>帳號</span></h5>
                <p> <input type="text" name="account" required /> </p>
                <h5><span>密碼</span></h5>
                <p> <input type="password" name="password" required /> </p>
                <h5><span>廠商名稱</span></h5>
                <p> <input type="text" name="name" /> </p>
                <h5><span>廠商名稱(英文)</span></h5>
                <p> <input type="text" name="nameEn" /> </p>
                <h5><span>Logo</span> </h5>
                <p> <input type="file" name="logo" /> </p>
                <h5><span>前台公司頁 Logo (建議寬高: 125x50)</span> </h5>
                <p> <input type="file" name="logo2" /> </p>
                <h5><span>是否啟用</span></h5>
                <p> 
                    <select type="text" name="active"> 
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select> 
                </p>
            @if(isset($companyAreas) && count($companyAreas) > 0)
                <h5><span>區域選擇</span></h5>
                <p class="companyAreaP"> 
                    <select type="text" name="companyAreaId[]" class="companyAreaId" required> 
                        <option value=""></option>
                    @foreach($companyAreas as $companyArea)
                        <option value="{{ $companyArea->id }}">{{ $companyArea->name }}</option>
                    @endforeach
                    </select> 
                </p>
            @endif
<!--
                <h5><span>亮點資訊 標題</span></h5>
                <p> <input type="text" name="title" /> </p>
                <h5><span>亮點資訊 標題(英文)</span></h5>
                <p> <input type="text" name="titleEn" /> </p>
                <h5><span>亮點資訊 描述</span></h5>
                <p> <textarea name="contactDesc" ></textarea> </p>
                <h5><span>亮點資訊 描述(英文)</span></h5>
                <p> <textarea name="contactDescEn" ></textarea> </p>
-->
                <h5><span>點亮資訊 如下圖，可放五張 (建議寬高: 250x210, Max:5M)</span></h5>
                <img src="/images/company2020_07_24/company_info.png" class="schematic" />
                <h5><span>點亮資訊1</span></h5>
                <p> 
                    <select type="text" name="infoMode1" class="infoMode hidden" infoNum="1"> 
                        <option value="1">圖片上傳</option>
                        <option value="2">影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath1" /> 
                    <input type="text" name="infoVideo1" /> 
                </p>
                <h5><span>點亮資訊2</span></h5>
                <p> 
                    <select type="text" name="infoMode2" class="infoMode hidden" infoNum="2"> 
                        <option value="1">圖片上傳</option>
                        <option value="2">影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath2" /> 
                    <input type="text" name="infoVideo2" /> 
                </p>
                <h5><span>點亮資訊3</span></h5>
                <p> 
                    <select type="text" name="infoMode3" class="infoMode hidden" infoNum="3"> 
                        <option value="1">圖片上傳</option>
                        <option value="2">影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath3" /> 
                    <input type="text" name="infoVideo3" /> 
                </p>
                <h5><span>點亮資訊4</span></h5>
                <p> 
                    <select type="text" name="infoMode4" class="infoMode hidden" infoNum="4"> 
                        <option value="1">圖片上傳</option>
                        <option value="2">影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath4" /> 
                    <input type="text" name="infoVideo4" /> 
                </p>
                <h5><span>點亮資訊5</span></h5>
                <p> 
                    <select type="text" name="infoMode5" class="infoMode hidden" infoNum="5"> 
                        <option value="1">圖片上傳</option>
                        <option value="2">影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath5" /> 
                    <input type="text" name="infoVideo5" /> 
                </p>
                <h5><span>前台公司頁右下圖 (建議寬高: 80x125, Max: 5M)</span></h5>
                <h6>示意圖</h6>
                <img src="/images/company2020_07_24/company_right_down.png" class="schematic" />
                <h6></h6>
                <p> <input type="file" name="companyRightInfo" /> </p>
                <h5><span>E-mail</span></h5>
                <p> <input type="text" name="email" /> </p>
                <h5><span>聯絡方式 tel</span></h5>
                <p> <input type="text" name="contactLink1" /> </p>
                <h5><span>聯絡方式 fax</span></h5>
                <p> <input type="text" name="contactLink2" /> </p>
                <h5><span>聯絡方式 add</span></h5>
                <p> <input type="text" name="contactLink3" /> </p>
                <h5><span>官網網址 web ("http://"為必加  ex: http://www.google.com)</span></h5>
                <p> <input type="text" name="contactLink4" /> </p>
                <h5><span>前台樣式</span></h5>
                <p>
                    <img src="/" class="custPic frontModePic" /> <br />
                    <select type="text" name="frontMode" class="frontMode "> 
                        <option value="1" >黑</option>
                        <option value="2" >藍</option>
                        <option value="3" >綠</option>
                        <option value="4" >紅</option>
                        <option value="5" >紫</option>
                        <option value="6" >黃</option>
                    </select> 
                </p>
                <p class=""> <button class="btn">新增</button> </p>
            </form>
        </div>
@include('admin.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/lib/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="/lib/jquery-validation/dist/localization/messages_zh_TW.min.js"></script>
    <script src="/js/admin/left.js"></script>
    <script src="/js/admin/company/create.js"></script>
</html>
