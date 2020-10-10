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
@include('company.layout.menu')
        <div class="content">
            <h3>廠商編輯 - 內容</h3>
            @if($result['result'] == false) 
            {{ $result['msg'] }}
            @else
            <form method='post' action='/company/edit' companyId="{{ $result['company']->id }}" class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h5><span>帳號</span></h5>
                <p> <input type="text" name="account" value="{{ $result['company']->account }}" readonly /> </p>
                <h5><span>廠商名稱</span></h5>
                <p> <input type="text" name="name" value="{{ $result['company']->name }}" /> </p>
                <h5><span>廠商名稱(英文)</span></h5>
                <p> <input type="text" name="nameEn" value="{{ $result['company']->nameEn }}" /> </p>
                <h5><span>Logo (建議寬高: 150x150)</span> </h5>
                <p>
                @if($result['company']->logo != '')
                    <img src="/uploads{{ $result['company']->logo }}" class="custPic" /> <br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <input type="file" name="logo" /> </p>
                <h5><span>前台公司頁 Logo (建議寬高: 125x50)</span> </h5>
                <p>
                @if($result['company']->logo2 != '')
                    <img src="/uploads{{ $result['company']->logo2 }}" class="custPic" /> <br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <input type="file" name="logo2" /> </p>
<!--
                <h5><span>亮點資訊 標題</span></h5>
                <p> <input type="text" name="title" value="{{ $result['company']->title }}" /> </p>
                <h5><span>亮點資訊 標題(英文)</span></h5>
                <p> <input type="text" name="titleEn" value="{{ $result['company']->titleEn }}" /> </p>
                <h5><span>亮點資訊 描述</span></h5>
                <p> <textarea name="contactDesc" >{{ $result['company']->contactDesc }}</textarea> </p>
                <h5><span>亮點資訊 描述(英文)</span></h5>
                <p> <textarea name="contactDescEn" >{{ $result['company']->contactDescEn }}</textarea> </p>
-->
                <h5><span>點亮資訊 如下圖，可放五張 (建議寬高: 250x210, Max:5M)</span></h5>
                <img src="/images/company2020_07_24/company_info.png" class="schematic" />
                <h5><span>點亮資訊1</span></h5>
                <p>
                @if($result['company']->infoPath1 != '' && $result['company']->infoMode1 == 1)
                    <img src="/uploads{{ $result['company']->infoPath1 }}" class="custPic" /> <br />
                @elseif($result['company']->infoPath1 != '' && $result['company']->infoMode1 == 2)
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $result['company']->infoPath1 }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <select type="text" name="infoMode1" class="infoMode hidden" infoNum="1"> 
                        <option value="1" {{ $result['company']->infoMode1 == '1' ? 'selected="selected"' : '' }} >圖片上傳</option>
                        <option value="2" {{ $result['company']->infoMode1 == '2' ? 'selected="selected"' : '' }} >影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath1" /> 
                    <input type="text" name="infoVideo1" /> 
                </p>
                <h5><span>點亮資訊2</span></h5>
                <p>
                @if($result['company']->infoPath2 != '' && $result['company']->infoMode2 == 1)
                    <img src="/uploads{{ $result['company']->infoPath2 }}" class="custPic" /> <br />
                @elseif($result['company']->infoPath2 != '' && $result['company']->infoMode2 == 2)
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $result['company']->infoPath2 }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <select type="text" name="infoMode2" class="infoMode hidden" infoNum="2"> 
                        <option value="1" {{ $result['company']->infoMode2 == '1' ? 'selected="selected"' : '' }} >圖片上傳</option>
                        <option value="2" {{ $result['company']->infoMode2 == '2' ? 'selected="selected"' : '' }} >影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath2" /> 
                    <input type="text" name="infoVideo2" /> 
                </p>
                <h5><span>點亮資訊3</span></h5>
                <p>
                @if($result['company']->infoPath3 != '' && $result['company']->infoMode3 == 1)
                    <img src="/uploads{{ $result['company']->infoPath3 }}" class="custPic" /> <br />
                @elseif($result['company']->infoPath3 != '' && $result['company']->infoMode3 == 2)
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $result['company']->infoPath3 }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <select type="text" name="infoMode3" class="infoMode hidden" infoNum="3"> 
                        <option value="1" {{ $result['company']->infoMode3 == '1' ? 'selected="selected"' : '' }} >圖片上傳</option>
                        <option value="2" {{ $result['company']->infoMode3 == '2' ? 'selected="selected"' : '' }} >影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath3" /> 
                    <input type="text" name="infoVideo3" /> 
                </p>
                <h5><span>點亮資訊4</span></h5>
                <p>
                @if($result['company']->infoPath4 != '' && $result['company']->infoMode4 == 1)
                    <img src="/uploads{{ $result['company']->infoPath4 }}" class="custPic" /> <br />
                @elseif($result['company']->infoPath4 != '' && $result['company']->infoMode4 == 2)
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $result['company']->infoPath4 }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <select type="text" name="infoMode4" class="infoMode hidden" infoNum="4"> 
                        <option value="1" {{ $result['company']->infoMode4 == '1' ? 'selected="selected"' : '' }} >圖片上傳</option>
                        <option value="2" {{ $result['company']->infoMode4 == '2' ? 'selected="selected"' : '' }} >影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath4" /> 
                    <input type="text" name="infoVideo4" /> 
                </p>
                <h5><span>點亮資訊5</span></h5>
                <p>
                @if($result['company']->infoPath5 != '' && $result['company']->infoMode5 == 1)
                    <img src="/uploads{{ $result['company']->infoPath5 }}" class="custPic" /> <br />
                @elseif($result['company']->infoPath5 != '' && $result['company']->infoMode5 == 2)
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $result['company']->infoPath5 }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <select type="text" name="infoMode5" class="infoMode hidden" infoNum="5"> 
                        <option value="1" {{ $result['company']->infoMode5 == '1' ? 'selected="selected"' : '' }} >圖片上傳</option>
                        <option value="2" {{ $result['company']->infoMode5 == '2' ? 'selected="selected"' : '' }} >影片網址(Youtube)</option>
                    </select> 
                    <input type="file" name="infoPath5" /> 
                    <input type="text" name="infoVideo5" /> 
                </p>
                <h5><span>前台公司頁右上圖 (建議寬高: 80x125, Max: 5M)</span></h5>
                <h6>示意圖</h6>
                <img src="/images/company2020_07_24/company_right_down.png" class="schematic" />
                <h6></h6>
                <p>
                @if($result['company']->companyRightInfo != '')
                    <img src="/uploads{{ $result['company']->companyRightInfo }}" class="custPic" /> <br />
                @else
                    無<br />
                @endif
                    更換如下:
                    <input type="file" name="companyRightInfo" /> </p>
                <h5><span>E-mail</span></h5>
                <p> <input type="text" name="email" value="{{ $result['company']->email }}" /> </p>
                <h5><span>聯絡方式 tel</span></h5>
                <p> <input type="text" name="contactLink1" value="{{ $result['company']->contactLink1 }}" /> </p>
                <h5><span>聯絡方式 fax</span></h5>
                <p> <input type="text" name="contactLink2" value="{{ $result['company']->contactLink2 }}" /> </p>
                <h5><span>聯絡方式 add</span></h5>
                <p> <input type="text" name="contactLink3" value="{{ $result['company']->contactLink3 }}" /> </p>
                <h5><span>官網網址 web ("http://"為必加  ex: http://www.google.com)</span></h5>
                <p> <input type="text" name="contactLink4" value="{{ $result['company']->contactLink4 }}" /> </p>
                <h5><span>前台樣式</span></h5>
                <p>
                    <img src="/" class="custPic frontModePic" /> <br />
                    <select type="text" name="frontMode" class="frontMode "> 
                        <option value="1" {{ $result['company']->frontMode == '1' ? 'selected="selected"' : '' }} >黑</option>
                        <option value="2" {{ $result['company']->frontMode == '2' ? 'selected="selected"' : '' }} >藍</option>
                        <option value="3" {{ $result['company']->frontMode == '3' ? 'selected="selected"' : '' }} >綠</option>
                        <option value="4" {{ $result['company']->frontMode == '4' ? 'selected="selected"' : '' }} >紅</option>
                        <option value="5" {{ $result['company']->frontMode == '5' ? 'selected="selected"' : '' }} >紫</option>
                        <option value="6" {{ $result['company']->frontMode == '6' ? 'selected="selected"' : '' }} >黃</option>
                    </select> 
                </p>
                <p class=""> <button class="btn">更改</button> </p>
            </form>

            @endif
        </div>
@include('company.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/company/left.js"></script>
    <script src="/js/company/edit.js"></script>
</html>
