<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ContactRepository;
use Session;
use Exception;

class FrontController extends Controller
{
    public function index(Request $request, $lan = 'cn') {
        $params = $request->all();
        $params['lan'] = $lan;
        if(isset($params['lan']) == false && Session::has('lan') == true) {
            $params['lan'] = Session::get('lan');
            \App::setLocale($params['lan']);
        }
        else if(isset($params['lan']) == false) {
            $params['lan'] = 'cn';
            \App::setLocale($params['lan']);
        }
        else {
            Session::put('lan', $params['lan']);
            \App::setLocale($params['lan']);
        }
        $companyRepository = new CompanyRepository();
        $params['companyAreas'] = $companyRepository->getAreaWithCompany();
        $watchAmount = env('WATCH_AMOUNT', 0);
        $this->setEnvironmentValue(['WATCH_AMOUNT' => ++$watchAmount]);
        $params['watchAmount'] = str_pad($watchAmount, 5, '0', STR_PAD_LEFT);

        foreach ($params['companyAreas'] as $companyArea) {
            $params['companyAreas'][$companyArea->name] = $companyArea;
            foreach ($params['companyAreas'][$companyArea->name]['companies'] as $i => $company) {
                switch($params['lan']) {
                case 'cn':
                    $params['companyAreas'][$companyArea->name]['companies'][$i]->nameShow = $company->name;
                    break;
                case 'en':
                case 'id':
                case 'vi':
                    $params['companyAreas'][$companyArea->name]['companies'][$i]->nameShow = $company->nameEn;
                    break;
                }
            }
        }
        
        $frontDir = env('FRONT_DIR', 'front');

        switch($params['lan']) {
        case 'cn':
            if($frontDir == 'front-v3') {
                $params['logo'] = '/images/tami-v3/home_logo_cn.png';
                $params['logoMobile'] = '/images/tami-v3/home_logo_cn_mobile.png';
            } else {
                $params['logo'] = '/images/home_logo.gif';
                $params['logoMobile'] = '/images/home_logo_mobile.png';
                $params['area1'] = '/images/platform_04_title_tw.png';
                $params['area2'] = '/images/platform_02_title_tw.png';
                $params['area3'] = '/images/platform_03_title_tw.png';
                $params['area4'] = '/images/platform_01_title_tw.png';
                $params['backMobile'] = '../images/tami_01_mobile_tw.jpg';
                $params['title'] = "2020年台灣鞋機拓銷越南及印尼線上台灣館";
                $params['description'] = "台灣鞋機全球市占率約7成，年產量世界第一，在國際鞋業產業鏈中扮演了相當重要的角色，主要出口至越南、印尼等國家。
今年因應疫情無法出國參展，機械公會特別偕同40家台灣主要鞋機廠商，以線上展的形式，將最先進的台灣鞋機產品展現給越南及印尼的買主，內容將包括鞋面成型及鞋幫機、鞋底加工及橡塑膠製鞋設備、縫紉機及針織機、自動化設備與整廠規劃等產品。
";
            }
            break;
        case 'en':
            if($frontDir == 'front-v3') {
                $params['logo'] = '/images/tami-v3/home_logo_eng.png';
                $params['logoMobile'] = '/images/tami-v3/home_logo_eng_mobile.png';
            } else {
                $params['logo'] = '/images/home_logo_e2.gif';
                $params['logoMobile'] = '/images/home_logo_mobile.png';
                $params['area1'] = '/images/platform_04_title_eng.png';
                $params['area2'] = '/images/platform_02_title_eng.png';
                $params['area3'] = '/images/platform_03_title_eng.png';
                $params['area4'] = '/images/platform_01_title_eng.png';
                $params['backMobile'] = '../images/tami_01_mobile_eng.jpg';
                $params['title'] = "Taiwan Shoemaking Online Pavilion 2020 – Sole Provider for Vietnam and Indonesia";
                $params['description'] = 'Taiwan shoemaking machinery plays a very important role in the global shoe industrial chain with the highest productivity and accounts for 70% global market share and exports mainly to Vietnam and Indonesia.
                    This year due to Covid-19, international exhibitions are cancelled. TAMI(Taiwan Association of Machinery Industry) organizes this online show with 40 Taiwan shoemaking machinery manufacturers instead, showing vietnamese and indonesian buyers the latest and most advanced Taiwan shoemaking machinery, including vamp making and lasting machinery,
                        sole process and rubber/plastic shoe making machinery, sewing machine & knitting machine, automatic equipment and turnkey solution, etc.
';
            }
            break;
        case 'id':
            if($frontDir == 'front-v3') {
                $params['logo'] = '/images/tami-v3/home_logo_eng.png';
                $params['logoMobile'] = '/images/tami-v3/home_logo_eng_mobile.png';
            } else {
                $params['logo'] = '/images/home_logo_e2.gif';
                $params['logoMobile'] = '/images/home_logo_mobile.png';
                $params['area1'] = '/images/platform_04_title_indonesian.png';
                $params['area2'] = '/images/platform_02_title_indonesian.png';
                $params['area3'] = '/images/platform_03_title_indonesian.png';
                $params['area4'] = '/images/platform_01_title_indonesian.png';
                $params['backMobile'] = '../images/tami_01_mobile_indonesian.jpg';
                $params['title'] = "Taiwan Shoemaking Online Pavilion 2020 – Sole Provider for Vietnam and Indonesia";
                $params['description'] = 'Taiwan shoemaking machinery plays a very important role in the global shoe industrial chain with the highest productivity and accounts for 70% global market share and exports mainly to Vietnam and Indonesia.
                    This year due to Covid-19, international exhibitions are cancelled. TAMI(Taiwan Association of Machinery Industry) organizes this online show with 40 Taiwan shoemaking machinery manufacturers instead, showing vietnamese and indonesian buyers the latest and most advanced Taiwan shoemaking machinery, including vamp making and lasting machinery,
                        sole process and rubber/plastic shoe making machinery, sewing machine & knitting machine, automatic equipment and turnkey solution, etc.
';
            }
            break;
        case 'vi':
            if($frontDir == 'front-v3') {
                $params['logo'] = '/images/tami-v3/home_logo_eng.png';
                $params['logoMobile'] = '/images/tami-v3/home_logo_eng_mobile.png';
            } else {
                $params['logo'] = '/images/home_logo_e2.gif';
                $params['logoMobile'] = '/images/home_logo_mobile.png';
                $params['area1'] = '/images/platform_04_title_vietbam.png';
                $params['area2'] = '/images/platform_02_title_vietbam.png';
                $params['area3'] = '/images/platform_03_title_vietbam.png';
                $params['area4'] = '/images/platform_01_title_vietbam.png';
                $params['backMobile'] = '../images/tami_01_mobile_vietbam.jpg';
                $params['title'] = "Taiwan Shoemaking Online Pavilion 2020 – Sole Provider for Vietnam and Indonesia";
                $params['description'] = 'Taiwan shoemaking machinery plays a very important role in the global shoe industrial chain with the highest productivity and accounts for 70% global market share and exports mainly to Vietnam and Indonesia.
                    This year due to Covid-19, international exhibitions are cancelled. TAMI(Taiwan Association of Machinery Industry) organizes this online show with 40 Taiwan shoemaking machinery manufacturers instead, showing vietnamese and indonesian buyers the latest and most advanced Taiwan shoemaking machinery, including vamp making and lasting machinery,
                        sole process and rubber/plastic shoe making machinery, sewing machine & knitting machine, automatic equipment and turnkey solution, etc.
';
            }
            break;
        }
        return view($frontDir. '.index', ['result' => $params]);
    }

    public function company(Request $request, $lan = 'cn', $companyId) {
        $params = $request->all();
        $params['lan'] = $lan;
        if(isset($params['lan']) == false && Session::has('lan') == true) {
            $params['lan'] = Session::get('lan');
            \App::setLocale($params['lan']);
        }
        else if(isset($params['lan']) == false) {
            $params['lan'] = 'cn';
            \App::setLocale($params['lan']);
        }
        else {
            Session::put('lan', $params['lan']);
            \App::setLocale($params['lan']);
        }
        try {
            $companyRepository = new CompanyRepository();
            $company = $companyRepository->getById($companyId);
            if(trim($company->contactLink4) == '')
                $company->contactLink4 = '#';
            switch($company->frontMode) {
            case 1:
                $company->frontModeShow = 'black';
                break;
            case 2:
                $company->frontModeShow = 'blue';
                break;
            case 3:
                $company->frontModeShow = 'green';
                break;
            case 4:
                $company->frontModeShow = 'red';
                break;
            case 5:
                $company->frontModeShow = 'purple';
                break;
            case 6:
                $company->frontModeShow = 'yellow';
                break;
            default:
                $company->frontModeShow = 'black';
                break;
            }
            switch($params['lan']) {
            case 'cn':
                $company->nameShow = $company->name;
                $company->titleShow = $company->title;
                $company->contactDescShow = nl2br($company->contactDesc);
                $params['title'] = "2020年台灣鞋機拓銷越南及印尼線上台灣館";
                $params['description'] = "台灣鞋機全球市占率約7成，年產量世界第一，在國際鞋業產業鏈中扮演了相當重要的角色，主要出口至越南、印尼等國家。
今年因應疫情無法出國參展，機械公會特別偕同40家台灣主要鞋機廠商，以線上展的形式，將最先進的台灣鞋機產品展現給越南及印尼的買主，內容將包括鞋面成型及鞋幫機、鞋底加工及橡塑膠製鞋設備、縫紉機及針織機、自動化設備與整廠規劃等產品。
";
                break;
            case 'en':
            case 'id':
            case 'vi':
                $company->nameShow = $company->nameEn;
                $company->titleShow = $company->titleEn;
                $company->contactDescShow = nl2br($company->contactDescEn);
                $params['title'] = "Taiwan Shoemaking Online Pavilion 2020 – Sole Provider for Vietnam and Indonesia";
                $params['description'] = 'Taiwan shoemaking machinery plays a very important role in the global shoe industrial chain with the highest productivity and accounts for 70% global market share and exports mainly to Vietnam and Indonesia.
                    This year due to Covid-19, international exhibitions are cancelled. TAMI(Taiwan Association of Machinery Industry) organizes this online show with 40 Taiwan shoemaking machinery manufacturers instead, showing vietnamese and indonesian buyers the latest and most advanced Taiwan shoemaking machinery, including vamp making and lasting machinery,
                        sole process and rubber/plastic shoe making machinery, sewing machine & knitting machine, automatic equipment and turnkey solution, etc.
';
                break;
            }
        } catch(Exception $e) {
            $result = [
                'result' => false,
                'msg' => $e->getMessage(),
            ];
            return view('front.company_not', ['result' => $result]);
        }
        if($company->active == 0) {
            $result = [
                'result' => false,
                'msg' => '該廠商不開放',
            ];
            return view('front.company_not', ['result' => $result]);
        }
        $frontDir = env('FRONT_DIR', 'front');
        return view($frontDir. '.company', ['company' => $company, 'result' => $params]);
    }

    public function product(Request $request, $lan = 'cn', $companyId) {
        $params = $request->all();
        $params['lan'] = $lan;
        if(isset($params['lan']) == false && Session::has('lan') == true) {
            $params['lan'] = Session::get('lan');
            \App::setLocale($params['lan']);
        }
        else if(isset($params['lan']) == false) {
            $params['lan'] = 'cn';
            \App::setLocale($params['lan']);
        }
        else {
            Session::put('lan', $params['lan']);
            \App::setLocale($params['lan']);
        }
        $companyRepository = new CompanyRepository();
        $company = $companyRepository->getById($companyId);
        if(trim($company->contactLink4) == '')
            $company->contactLink4 = '#';
        switch($company->frontMode) {
        case 1:
            $company->frontModeShow = 'black';
            break;
        case 2:
            $company->frontModeShow = 'blue';
            break;
        case 3:
            $company->frontModeShow = 'green';
            break;
        case 4:
            $company->frontModeShow = 'red';
            break;
        case 5:
            $company->frontModeShow = 'purple';
            break;
        case 6:
            $company->frontModeShow = 'yellow';
            break;
        default:
            $company->frontModeShow = 'black';
            break;
        }
        if(trim($company->contactLink4) == '')
            $company->contactLink4 = '#';
        switch($params['lan']) {
        case 'cn':
            $company->nameShow = $company->name;
            $params['title'] = "2020年台灣鞋機拓銷越南及印尼線上台灣館";
            $params['description'] = "台灣鞋機全球市占率約7成，年產量世界第一，在國際鞋業產業鏈中扮演了相當重要的角色，主要出口至越南、印尼等國家。
今年因應疫情無法出國參展，機械公會特別偕同40家台灣主要鞋機廠商，以線上展的形式，將最先進的台灣鞋機產品展現給越南及印尼的買主，內容將包括鞋面成型及鞋幫機、鞋底加工及橡塑膠製鞋設備、縫紉機及針織機、自動化設備與整廠規劃等產品。
";
            $params['detailBtnBg01'] = "/images/detail_btn_01_tw.png";
            $params['detailBtnBg02'] = "/images/detail_btn_02_tw.png";
            $params['detailBtnBg03'] = "/images/detail_btn_03_tw.png";
            $params['detailBtnBg04'] = "/images/detail_btn_04_tw.png";
            $params['detailBtnBg05'] = "/images/detail_btn_05_tw.png";
            $params['detailBtnBg06'] = "/images/detail_btn_06_tw.png";
            break;
        case 'en':
        case 'id':
        case 'vi':
            $company->nameShow = $company->nameEn;
                $params['title'] = "Taiwan Shoemaking Online Pavilion 2020 – Sole Provider for Vietnam and Indonesia";
                $params['description'] = 'Taiwan shoemaking machinery plays a very important role in the global shoe industrial chain with the highest productivity and accounts for 70% global market share and exports mainly to Vietnam and Indonesia.
                    This year due to Covid-19, international exhibitions are cancelled. TAMI(Taiwan Association of Machinery Industry) organizes this online show with 40 Taiwan shoemaking machinery manufacturers instead, showing vietnamese and indonesian buyers the latest and most advanced Taiwan shoemaking machinery, including vamp making and lasting machinery,
                        sole process and rubber/plastic shoe making machinery, sewing machine & knitting machine, automatic equipment and turnkey solution, etc.
';
            $params['detailBtnBg01'] = "/images/detail_btn_01_en.png";
            $params['detailBtnBg02'] = "/images/detail_btn_02_en.png";
            $params['detailBtnBg03'] = "/images/detail_btn_03_en.png";
            $params['detailBtnBg04'] = "/images/detail_btn_04_en.png";
            $params['detailBtnBg05'] = "/images/detail_btn_05_en.png";
            $params['detailBtnBg06'] = "/images/detail_btn_06_en.png";
            break;
        }

        $productRepository = new ProductRepository();
        $products = $productRepository->getByCompanyId($companyId);
        foreach ($products as $i => $product) {
            switch($params['lan']) {
            case 'cn':
                $products[$i]->nameShow = $product->name;
                $products[$i]->infoShow = $product->info;
                break;
            case 'en':
            case 'id':
            case 'vi':
                $products[$i]->nameShow = $product->nameEn;
                $products[$i]->infoShow = $product->infoEn;
                break;
            }
        }
        $frontDir = env('FRONT_DIR', 'front');
        return view($frontDir. '.product', ['products' => $products, 'company' => $company, 'result' => $params] );
    }

    public function mailTest(Request $request) {
        $emails = "";
        if(trim($emails) != '') {
            $title = 'hi hi mail test';
            \Mail::send('email.test', [], function($message) use ($emails, $title) {
                $message->to($emails)->subject($title);
            });
            return 'mail success';
        } else
            return 'no email receiver';
    }

    public function mmcTest(Request $request) {
        return view('front.mmc');
    }

    public function mmcProccess(Request $request) {
        $params = $request->all();
        if(env('MMC', true)) {
            $line = exec($params['mmc'], $retArr, $errCode);
            return $retArr;
        }
        return ['not open'];
    }

    public function setEnvironmentValue(array $values) {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;

    }

    public function contact(Request $request) {
        $params = $request->all();
        $result = [
            'result' => true,
            'msg' => 'success',
        ];
        try {
            $contactRepository = new ContactRepository();
            $contactRepository->create($params);
        }
        catch(Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return $result;
    }
}
