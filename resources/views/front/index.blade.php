<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=yes, viewport-fit=cover" />
<meta name="title" content="{{ $result['title'] }}">
<meta name="description" content="{{ $result['description'] }}">
<meta name="author" content="">
<meta http-equiv="Cache-Control" content="no-cache">

<title>{{ $result['title'] }}</title>

<link rel="stylesheet" type="text/css" href="owl.carousel/owl.carousel.css">
<link href="css/style.css" rel="stylesheet">
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P3DZX3K');</script>
<!-- End Google Tag Manager -->


</head>

<body class="body_home">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3DZX3K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div class="home_list">
	<div class="visited">{{ trans('front/index.browse_amount') }}：{{ $result['watchAmount'] }}</div>
	<div class="transform">
        <div class="outer">    	
            <div class="home_title">
                <div class="logo"><img src="{{ $result['logo'] }}" class="web"><img src="{{ $result['logoMobile'] }}" class="mobile"></div>
                <div class="info">
                    <span>{{ trans('front/index.2020') }}</span>
                    {{ trans('front/index.international_shoes') }}<br />
                    {{ trans('front/index.leather_exhi') }}<br />
                    {{ trans('front/index.taiwan_online') }}
                </div>
            </div>              
            <div class="mobile_div">  
            	<div class="overly" title="Close with clicked !!" alt="Close with clicked !!"></div>
                <div class="mobile_black"><img src="images/icon_back_arrow_mobile.svg"></div>
                <div class="version">
                    <a href="cn/" class="{{ $result['lan'] == 'cn' ? 'active' : '' }}">中文</a>
                    <a href="en/" class="{{ $result['lan'] == 'en' ? 'active' : '' }}">ENG</a>
                    <a href="id/" class="{{ $result['lan'] == 'id' ? 'active' : '' }}">IND</a>
                    <a href="vi/" class="{{ $result['lan'] == 'vi' ? 'active' : '' }}">VIE</a>
                </div>                
                <div id="block01" class="block_img" data-id="popup01">
                    <img src="images/platform_01_block.png" class="block"/>
                    <img src="{{ $result['area4'] }}" class="title"/>
                    <div class="animate">
                        <div class="block01_animate"><img src="images/platform_01_01.png"></div>
                        <div class="block01_animate"><img src="images/platform_01_02.png"></div> 
                        <div class="block01_animate"><img src="images/platform_01_03.png"></div> 
                        <div class="block01_animate"><img src="images/platform_01_04.png"></div>
                        <div class="block01_animate"><img src="images/platform_01_05.png"></div>
                        <div class="block01_animate"><img src="images/platform_01_04.png"></div>
                        <div class="block01_animate"><img src="images/platform_01_03.png"></div> 
                        <div class="block01_animate"><img src="images/platform_01_02.png"></div>                                           
                    </div>
                    <div class="mobile_title">{{ trans('front/index.commpany_area4') }}</div>
                </div>
                <div id="block02" class="block_img" data-id="popup02">
                    <img src="images/platform_02_block.png" class="block"/>
                    <img src="{{ $result['area2'] }}" class="title"/>
                    <div class="animate">
                        <div class="block02_animate"><img src="images/platform_02_01.png"></div>
                        <div class="block02_animate"><img src="images/platform_02_02.png"></div>
                        <div class="block02_animate"><img src="images/platform_02_03.png"></div>
                    </div>
                    <div class="mobile_title">{{ trans('front/index.commpany_area2') }}</div>
                </div>
                <div id="block03" class="block_img" data-id="popup03">
                    <img src="images/platform_03_block.png" class="block"/>
                    <img src="{{ $result['area3'] }}" class="title"/>
                    <div class="animate">
                        <div class="block03_animate"><img src="images/platform_03_01.png"></div>
                        <div class="block03_animate"><img src="images/platform_03_02.png"></div>    
                        <div class="block03_animate"><img src="images/platform_03_03.png"></div> 
                        <div class="block03_animate"><img src="images/platform_03_04.png"></div> 
                        <div class="block03_animate"><img src="images/platform_03_05.png"></div> 
                        <div class="block03_animate"><img src="images/platform_03_06.png"></div> 
                        <div class="block03_animate"><img src="images/platform_03_05.png"></div> 
                        <div class="block03_animate"><img src="images/platform_03_04.png"></div> 
                        <div class="block03_animate"><img src="images/platform_03_03.png"></div> 
                        <div class="block03_animate"><img src="images/platform_03_02.png"></div>                    
                    </div>
                    <div class="mobile_title">{{ trans('front/index.commpany_area3') }}</div>
                </div>
                <div id="block04" class="block_img" data-id="popup04">
                    <img src="images/platform_04_block.png" class="block"/>
                    <img src="{{ $result['area1'] }}" class="title"/>
                    <div class="animate">
                        <div class="block04_animate"><img src="images/platform_04_01.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_02.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_03.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_04.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_05.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_06.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_05.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_04.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_03.png"></div>
                        <div class="block04_animate"><img src="images/platform_04_02.png"></div>
                    </div>
                    <div class="mobile_title">{{ trans('front/index.commpany_area1') }}</div>
                </div>
           </div>     
           
            	
                <div id="popup01" class="popup_block">
                    <div class="box">
                        <div class="title">{{ trans('front/index.commpany_area4') }}</div>
                        <div class="list_item">
                        @foreach($result['companyAreas']['縫紉機']['companies'] as $company)
                            <div class="item">
                                <a href="/{{ $result['lan'] }}/front/company/{{ $company->id }}">
                                    <div class="img"><img src="/uploads{{ $company->logo }}"></div>
                                    <div class="info">
                                        <h3>{{ $company->nameShow }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
<!--
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_02.png"></div>
                                    <div class="info">
                                        <h3>启翔股份有限公司</h3>
                                        <p>CHEE SIANG INDUSTRIAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
-->
                        </div>
                    </div>
                </div>
                <div id="popup02" class="popup_block">
                    <div class="box">
                        <div class="title">{{ trans('front/index.commpany_area2') }}</div>
                        <div class="mobile_arrow"><img src="images/icon_arrow_down_white.svg"></div>
                        <div class="list_item">
                        @foreach($result['companyAreas']['鞋底加工及像塑製鞋設備']['companies'] as $company)
                            <div class="item">
                                <a href="/{{ $result['lan'] }}/front/company/{{ $company->id }}">
                                    <div class="img"><img src="/uploads{{ $company->logo }}"></div>
                                    <div class="info">
                                        <h3>{{ $company->nameShow }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!--
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_07.png"></div>
                                    <div class="info">
                                        <h3>天岗精机科技股份有限公司</h3>
                                        <p>TIEN KANG CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_12.png"></div>
                                    <div class="info">
                                        <h3>皇尚企业股份有限公司</h3>
                                        <p>HWANG SUN ENTERPRISE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_03.png"></div>
                                    <div class="info">
                                        <h3>诚锋兴业股份有限公司</h3>
                                        <p>SINCERE PIONEER ENTERPRISE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_09.png"></div>
                                    <div class="info">
                                        <h3>鉅钢机械股份有限公司</h3>
                                        <p>KING STEEL MACHINERY CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_13.png"></div>
                                    <div class="info">
                                        <h3>润泽国际有限公司</h3>
                                        <p>RINK INTERNATIONAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_10.png"></div>
                                    <div class="info">
                                        <h3>颖晖机械股份有限公司</h3>
                                        <p>YING HUI MACHINE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_11.png"></div>
                                    <div class="info">
                                        <h3>龙渤实业股份有限公司</h3>
                                        <p>LUNG BOU INDUSTRIAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_06.png"></div>
                                    <div class="info">
                                        <h3>鸿绮机械股份有限公司</h3>
                                        <p>HORNG CHII MACHINE INDUSTRY CO., LTD.</p>
                                    </div>
                                </a>
                            </div>                    
-->
                        </div>
                    </div>
                </div>
                <div id="popup03" class="popup_block">
                    <div class="box">
                        <div class="title">{{ trans('front/index.commpany_area3') }}</div>
                        <div class="mobile_arrow"><img src="images/icon_arrow_down_white.svg"></div>
                        <div class="list_item">
                        @foreach($result['companyAreas']['鞋面成型及鞋帮機']['companies'] as $company)
                            <div class="item">
                                <a href="/{{ $result['lan'] }}/front/company/{{ $company->id }}">
                                    <div class="img"><img src="/uploads{{ $company->logo }}"></div>
                                    <div class="info">
                                        <h3>{{ $company->nameShow }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!--
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_05.png"></div>
                                    <div class="info">
                                        <h3>千附实业股份有限公司</h3>
                                        <p>CHENFULL INTERNATIONAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_14.png"></div>
                                    <div class="info">
                                        <h3>主典兴业股份有限公司</h3>
                                        <p>TRUE TEN INDUSTRIAL CO., LTD</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_12.png"></div>
                                    <div class="info">
                                        <h3>皇尚企业股份有限公司</h3>
                                        <p>HWANG SUN ENTERPRISE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_01.png"></div>
                                    <div class="info">
                                        <h3>益鋐企业有限公司</h3>
                                        <p>YE HONE ENTERPRISE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_02.png"></div>
                                    <div class="info">
                                        <h3>启翔股份有限公司</h3>
                                        <p>CHEE SIANG SEWING MACHINE (S.H.) CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_15.png"></div>
                                    <div class="info">
                                        <h3>裕铭机械有限公司</h3>
                                        <p>NEW YU MING MACHINERY CO.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_03.png"></div>
                                    <div class="info">
                                        <h3>诚锋兴业股份有限公司</h3>
                                        <p>SINCERE PIONEER ENTERPRISE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_13.png"></div>
                                    <div class="info">
                                        <h3>润泽国际有限公司</h3>
                                        <p>RINK INTERNATIONAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_10.png"></div>
                                    <div class="info">
                                        <h3>颖晖机械股份有限公司</h3>
                                        <p>YING HUI MACHINE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_16.png"></div>
                                    <div class="info">
                                        <h3>鸿宇自动化设备股份有限公司</h3>
                                        <p>AITECK AUTOMATION INTEGRATION TECH CORP</p>
                                    </div>
                                </a>
                            </div>
                           --> 
                            
                        </div>
                    </div>
                </div>
                <div id="popup04" class="popup_block">
                    <div class="box">
                        <div class="title">{{ trans('front/index.commpany_area1') }}</div>
                        <div class="mobile_arrow"><img src="images/icon_arrow_down_white.svg"></div>
                        <div class="list_item">
                        @foreach($result['companyAreas']['自動化設備與整廠規劃']['companies'] as $company)
                            <div class="item">
                                <a href="/{{ $result['lan'] }}/front/company/{{ $company->id }}">
                                    <div class="img"><img src="/uploads{{ $company->logo }}"></div>
                                    <div class="info">
                                        <h3>{{ $company->nameShow }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!--
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_05.png"></div>
                                    <div class="info">
                                        <h3>千附实业股份有限公司</h3>
                                        <p>CHENFULL INTERNATIONAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_07.png"></div>
                                    <div class="info">
                                        <h3>天岗精机科技股份有限公司</h3>
                                        <p>TIEN KANG CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_14.png"></div>
                                    <div class="info">
                                        <h3>主典兴业股份有限公司</h3>
                                        <p>TRUE TEN INDUSTRIAL CO., LTD</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_01.png"></div>
                                    <div class="info">
                                        <h3>益鋐企业有限公司</h3>
                                        <p>YE HONE ENTERPRISE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_15.png"></div>
                                    <div class="info">
                                        <h3>裕铭机械有限公司</h3>
                                        <p>NEW YU MING MACHINERY CO.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_09.png"></div>
                                    <div class="info">
                                        <h3>鉅钢机械股份有限公司</h3>
                                        <p>KING STEEL MACHINERY CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_17.png"></div>
                                    <div class="info">
                                        <h3>鼎圣机械有限公司</h3>
                                        <p>DING-SHEN MECHANICAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_13.png"></div>
                                    <div class="info">
                                        <h3>润泽国际有限公司</h3>
                                        <p>RINK INTERNATIONAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_10.png"></div>
                                    <div class="info">
                                        <h3>颖晖机械股份有限公司</h3>
                                        <p>YING HUI MACHINE CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_11.png"></div>
                                    <div class="info">
                                        <h3>龙渤实业股份有限公司</h3>
                                        <p>LUNG BOU INDUSTRIAL CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_16.png"></div>
                                    <div class="info">
                                        <h3>鸿宇自动化设备股份有限公司</h3>
                                        <p>AITECK AUTOMATION INTEGRATION TECH CORP</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="front/company">
                                    <div class="img"><img src="images/logo/logo_06.png"></div>
                                    <div class="info">
                                        <h3>鸿绮机械股份有限公司</h3>
                                        <p>HORNG CHII MACHINE INDUSTRY CO., LTD.</p>
                                    </div>
                                </a>
                            </div>
-->
                        </div>
                    </div>
                </div>
            
        </div>
    </div>    
</div>
<input type="hidden" name="mobileBackground" value="{{ $result['backMobile'] }}" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175242617-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175242617-7');
</script>




<script src="js/front/js/jquery.min.js"></script>
<script src="owl.carousel/owl.carousel.js"></script>
<script src="js/front/js/script.js"></script>
@if(strpos(\Request::root(), 'www.twshoemaking.cn') > 0)
<script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279149839'%3E%3C/span%3E%3Cscript src='https://v1.cnzz.com/z_stat.php%3Fid%3D1279149839%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
@endif
<script src="js/front/js/index.js"></script>

</body>
</html>
