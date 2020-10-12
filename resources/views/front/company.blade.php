<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=yes, viewport-fit=cover" />
<meta name="title" content="{{ $result['title'] }}">
<meta name="description" content="{{ $result['description'] }}">
<meta name="author" content="">
<meta http-equiv="Cache-Control" content="no-cache">

<title>{{ $company->nameShow }}</title>


<link href="/css/style.css" rel="stylesheet">

</head>

<body class="body_company">

<div class="company_list {{ $company->frontModeShow }}">
        <div class="version">
            <a href="/cn/front/company/{{ $company->id }}" class="{{ $result['lan'] == 'cn' ? 'active' : '' }}">中文</a>
            <a href="/en/front/company/{{ $company->id }}" class="{{ $result['lan'] == 'en' ? 'active' : '' }}">ENG</a>
            <a href="/id/front/company/{{ $company->id }}" class="{{ $result['lan'] == 'id' ? 'active' : '' }}">IND</a>
            <a href="/vi/front/company/{{ $company->id }}" class="{{ $result['lan'] == 'vi' ? 'active' : '' }}">VIE</a>
        </div>                
	<div class="transform">

        <a href="/" class="btn_back"><img src="/images/icon_back_arrow.svg"></a>
        <div class="outer">
            <div class="logo"><div><img src="/uploads{{ $company->logo2 }}"></div></div>
            <div class="company_name"><div>{{ $company->nameShow }}</div></div>
            <div class="info">
                <div class="col01">
                    <div class="website"><a href="{{ $company->contactLink4 }}" target="_blank">Web</a></div>
                    <div class="desc">
                        @if(trim($company->email) != '')
                        <div class="item">EMAIL / <br />{{ $company->email }}</div>
                        @else
                        <div class="item">&nbsp;</div>
                        @endif
                        @if(trim($company->contactLink1) != '')
                        <div class="item">TEL / <br />{{ $company->contactLink1 }}</div>
                        @else
                        <div class="item">&nbsp;</div>
                        @endif
                        @if(trim($company->contactLink2) != '')
                        <div class="item">FAX / <br />{{ $company->contactLink2 }}</div><br />
                        @else
                        <div class="item">&nbsp;</div>
                        @endif
                        @if(trim($company->contactLink3) != '')
                        {{ $company->contactLink3 }}
                        @else
                        &nbsp;
                        @endif
                    </div>
                </div>
                <div class="col02">
                    <div class="img">
                    <!--
                    <img src="/images/company_img001.jpg" class="infoPathImg">
                    -->
                    @if(trim($company->infoPath1) == '')
                    <img src="/images/company_img001.jpg" class="infoPathImg">
                    @elseif(trim($company->infoPath1) != '')
                    <img src="/uploads{{ $company->infoPath1 }}" class="infoPathImg">
                    @endif
                    </div>
                    @if(trim($company->infoPath1) != '')
                    <input type="hidden" class="infoPath" value="/uploads{{ $company->infoPath1 }}" />
                    @endif
                    @if(trim($company->infoPath2) != '')
                    <input type="hidden" class="infoPath" value="/uploads{{ $company->infoPath2 }}" />
                    @endif
                    @if(trim($company->infoPath3) != '')
                    <input type="hidden" class="infoPath" value="/uploads{{ $company->infoPath3 }}" />
                    @endif
                    @if(trim($company->infoPath4) != '')
                    <input type="hidden" class="infoPath" value="/uploads{{ $company->infoPath4 }}" />
                    @endif
                    @if(trim($company->infoPath5) != '')
                    <input type="hidden" class="infoPath" value="/uploads{{ $company->infoPath5 }}" />
                    @endif
                </div>
                <div class="col03">
                    <div class="img">
                    @if(trim($company->companyRightInfo) == '')
                        <img src="/images/company_img002.jpg">
                    @else
                        <img src="/uploads{{ $company->companyRightInfo }}">
                    @endif
                    </div>
                </div>
            </div>
            <div class="action">
                <a href="/{{ $result['lan'] }}/front/company/{{ $company->id }}/product">PRODUCTS LIST<i></i></a>
            </div>
        </div>
    </div>    
</div>


<div class="body_overly"></div>
<div class="mobile_rotate">
	<img src="/images/mobile_rotate.svg" >
</div>



<script src="/js/front/js/jquery.min.js"></script>
<script src="/js/front/js/script.js"></script>
<script src="/js/front/js/company.js"></script>
<script src="js/front/js/script.js"></script>
@if(strpos(\Request::root(), 'www.twshoemaking.cn') > 0)
<script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279149839'%3E%3C/span%3E%3Cscript src='https://v1.cnzz.com/z_stat.php%3Fid%3D1279149839%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
@endif
</body>
</html>
