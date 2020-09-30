<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, viewport-fit=cover" />
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="lan" content="{{ $result['lan'] }}" />

<title>{{ $company->nameShow }}</title>

<link rel="stylesheet" type="text/css" href="/owl.carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/css/jquery.mCustomScrollbar.css">
<link href="/css/style.css" rel="stylesheet">

</head>

<body class="body_detail body_company">

<div class="company_list {{ $company->frontModeShow }}">
        <div class="version"><a href="/cn/" class="active">中文</a><a href="/en/">ENG</a></div>                
@if(in_array($result['lan'],['en', 'id', 'vi']) == true)
<!-- google 翻譯小工具 -->
<div id="google_translate_element" class="version" style="right: 140px; top:5px;"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,id,vi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- google 翻譯小工具 -->
@endif
	<div class="transform">
        <a href="/" class="btn_back"><img src="/images/icon_back_arrow.svg"></a>
        <div class="outer">
            <div class="logo"><div>
                <img src="/uploads{{ $company->logo2 }}">
            </div></div>
            <div class="company_name"><div>{{ $company->nameShow }}</div></div>
            <div class="info">
                <div class="col01">
                    <div class="website"><a href="#" target="_blank">Web</a></div>
                    <div class="desc">
                        @if(trim($company->email) != '')
                        <div class="item">EMAIL / {{ $company->email }}</div>
                        @else
                        <div class="item">&nbsp;</div>
                        @endif
                        @if(trim($company->contactLink1) != '')
                        <div class="item">TEL / {{ $company->contactLink1 }}</div>
                        @else
                        <div class="item">&nbsp;</div>
                        @endif
                        @if(trim($company->contactLink2) != '')
                        <div class="item">FAX / {{ $company->contactLink2 }}</div><br />
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
                        <img src="/images/company_img001.jpg">
                    -->
                    @if(trim($company->infoPath1) == '')
                    <img src="/images/company_img001.jpg" class="infoPathImg">
                    @elseif(trim($company->infoPath1) != '')
                    <img src="/uploads{{ $company->infoPath1 }}" class="infoPathImg">
                    @endif
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
                </div>
                <div class="col03">
                    <div class="img">
                    <!--
                        <img src="/images/company_img002.jpg">
                    -->
                    @if(trim($company->companyRightInfo) == '')
                        <img src="/images/company_img002.jpg">
                    @else
                        <img src="/uploads{{ $company->companyRightInfo }}">
                    @endif
                    </div>
                </div>
            </div>
            <div class="action">
                <a href="tami_03.html">PRODUCTS LIST<i></i></a>
            </div>
        </div>
    </div>    
</div>


<div class="body_overly active"></div>
<div class="product_detail" >
	<div class="transform">
        <a href="/{{ $result['lan'] }}/front/company/{{ $company->id }}" class="btn_back"><img src="/images/icon_back_arrow.svg"></a>
        <div class="links">
            <div class="outer">
                <div class="col01">
                    <a href="/" class="btn_home"><img src="{{ $result['detailBtnBg01'] }}"><b></b></a>
                    <a href="#" class="btn_contact"><img src="{{ $result['detailBtnBg02'] }}"><b></b></a>
                </div>
                <div class="col02">
                    <a href="{{ $company->contactLink4 }}" class="btn_website"><img src="{{ $result['detailBtnBg03'] }}"><b></b></a>
                    <a target="_blank" href="#" class="btn_cate"><img src="{{ $result['detailBtnBg04'] }}"><b></b></a>
                    <a href="#" class="btn_share"><img src="{{ $result['detailBtnBg05'] }}"><b></b></a>
                </div>
            </div>
        </div>
        <input id="locationHref" />
        <input type="hidden" class="maxProductNum" value="{{ count($products) }}" />
        <div class="slider">
            <div class="owl-carousel owl_slider">
            @foreach($products as $i => $product)
                <div class="item">
                    <input type="hidden" class="pdf{{ $i }}" value="{{ $product->dm }}" />
                    <input type="hidden" class="product{{ $i }}" value="{{ $product->id }}" />
                    <div class="outer">
                        <div class="col01">
                            <div class="box">
                            	<div class="bg"><img src="/images/detail_bg_001.png"></div>
                                <div class="img"><img src="/product{{ $product->picture1 }}"></div>
                            </div>
                            <a href="/product{{ $product->picture1 }}" class="btn_zoom" target="_blank"><img src="/images/icon_zoom.svg" ></a>
                        </div>
                        <div class="col02">
                            <div class="top_div">
                                <div class="box">
                                	<div class="bg"><img src="/images/detail_bg_002.png"></div>
                                    <div class="info">
                                        <div class="label">{{ trans('front/product.product_name') }}</div>
                                        <div class="desc">
                                            {{ $product->nameShow }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom_div">
                                <div class="box">
                                	<div class="bg"><img src="/images/detail_bg_003.png"></div>
                                    <div class="info">
                                    	<div class="add_padding">
                                            <div class="scrollbar">
                                            {!! nl2br($product->infoShow) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            @endforeach
<!--
                <div class="item">
                    <div class="outer">
                        <div class="col01">
                            <div class="box">
                            	<div class="bg"><img src="/images/detail_bg_001.png"></div>
                                <div class="img"><img src="/images/detail_product_001.png"></div>
                            </div>
                            <a href="/images/detail_product_001.png" class="btn_zoom" target="_blank"><img src="/images/icon_zoom.svg" ></a>
                        </div>
                        <div class="col02">
                            <div class="top_div">
                                <div class="box">
                                	<div class="bg"><img src="/images/detail_bg_002.png"></div>
                                    <div class="info">
                                        <div class="label">产品名称</div>
                                        <div class="desc">
                                            LARGE HIGH-SPEED<br />PRECISION MACHINING SERIES<br />大型高速精密加工系列
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom_div">
                                <div class="box">
                                	<div class="bg"><img src="/images/detail_bg_003.png"></div>
                                    <div class="info">
                                    	<div class="add_padding">
                                            <div class="scrollbar">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi 
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi 
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="outer">
                        <div class="col01">
                            <div class="box">
                            	<div class="bg"><img src="/images/detail_bg_001.png"></div>
                                <div class="img"><img src="/images/detail_product_001.png"></div>
                            </div>
                            <a href="/images/detail_product_001.png" class="btn_zoom" target="_blank"><img src="/images/icon_zoom.svg" ></a>
                        </div>
                        <div class="col02">
                            <div class="top_div">
                                <div class="box">
                                	<div class="bg"><img src="/images/detail_bg_002.png"></div>
                                    <div class="info">
                                        <div class="label">产品名称</div>
                                        <div class="desc">
                                            LARGE HIGH-SPEED<br />PRECISION MACHINING SERIES<br />大型高速精密加工系列
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom_div">
                                <div class="box">
                                	<div class="bg"><img src="/images/detail_bg_003.png"></div>
                                    <div class="info">
                                    	<div class="add_padding">
                                            <div class="scrollbar">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi 
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi 
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
-->
            </div>
        </div>
    </div>    
</div>

<div id="contact_form" class="contact_form">
    <input type="hidden" name="none" class="askSuccess" value="{{ trans('front/product.ask_success') }}" />
    <input type="hidden" name="none" class="errMsg" value="{{ trans('front/product.err_msg') }}" />
    <input type="hidden" name="none" class="notifyAdm" value="{{ trans('front/product.notify_adm') }}" />
    <form action="/front/contact" method="post" autocomplete="off" class="contact">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="companyId" value="{{ $company->id }}" />
        <input type="hidden" name="productId" value="" />
	<div class="outer">
    	<div class="close_div"><button class="btn_close"><img src="/images/icon_close.svg"></button></div>
		<div class="form_div">
        	<div class="item">
        		<input type="text" name="companyName" placeholder="{{ trans('front/product.company_name') }}" required>
            </div>
        	<div class="item">
        		<input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="item">
        		<input type="text" name="name" placeholder="{{ trans('front/product.contact_name') }}" required>
            </div>
            <div class="item">
        		<input type="text" name="phone" placeholder="{{ trans('front/product.phone') }}" required>
            </div>
            <div class="item">
            	<textarea name="content" placeholder="{{ trans('front/product.content') }}" required></textarea>        		
            </div>
            <div class="item action">
        		<button>{{ trans('front/product.submit') }}<i></i></button>
            </div>
        </div>
	</div>
    </form>
</div>
<div class="mobile_rotate">
	<img src="/images/mobile_rotate.svg" >
</div>

<script src="/js/front/js/jquery.min.js"></script>
<script src="/owl.carousel/owl.carousel.js"></script>
<script src="/js/front/js/jquery.mCustomScrollbar.js"></script>
<script src="/js/front/js/script.js"></script>
<script src="/js/front/js/product.js"></script>
@if(strpos(\Request::root(), 'www.twshoemaking.cn') > 0)
<script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279149839'%3E%3C/span%3E%3Cscript src='https://v1.cnzz.com/z_stat.php%3Fid%3D1279149839%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
@endif
</body>
</html>
