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
                    $params['companyAreas'][$companyArea->name]['companies'][$i]->nameShow = $company->nameEn;
                    break;
                }
            }
        }
        
        $frontDir = env('FRONT_DIR', 'front');

        switch($params['lan']) {
        case 'cn':
            if($frontDir == 'front-v3') {
                $params['logo'] = 'images/tami-v3/home_logo_cn.png';
                $params['logoMobile'] = 'images/tami-v3/home_logo_cn_mobile.png';
            } else {
                $params['logo'] = 'images/home_logo.gif';
                $params['logoMobile'] = 'images/home_logo_mobile.png';
                $params['area1'] = 'images/platform_04_title.png';
                $params['area2'] = 'images/platform_02_title.png';
                $params['area3'] = 'images/platform_03_title.png';
                $params['area4'] = 'images/platform_01_title.png';
                $params['backMobile'] = '../images/tami_01_mobile.jpg';
            }
            break;
        case 'en':
            if($frontDir == 'front-v3') {
                $params['logo'] = 'images/tami-v3/home_logo_eng.png';
                $params['logoMobile'] = 'images/tami-v3/home_logo_eng_mobile.png';
            } else {
                $params['logo'] = 'images/home_logo_e2.gif';
                $params['logoMobile'] = 'images/home_logo_mobile.png';
                $params['area1'] = 'images/platform_04_title_eng.png';
                $params['area2'] = 'images/platform_02_title_eng.png';
                $params['area3'] = 'images/platform_03_title_eng.png';
                $params['area4'] = 'images/platform_01_title_eng.png';
                $params['backMobile'] = '../images/tami_01_mobile_eng.jpg';
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
                break;
            case 'en':
                $company->nameShow = $company->nameEn;
                $company->titleShow = $company->titleEn;
                $company->contactDescShow = nl2br($company->contactDescEn);
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
            break;
        case 'en':
            $company->nameShow = $company->nameEn;
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
