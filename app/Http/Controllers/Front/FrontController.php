<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\ProductRepository;
use Session;
use Exception;

class FrontController extends Controller
{
    public function index(Request $request) {
        $params = $request->all();
        if(isset($params['lan']) == false && Session::has('lan') == true)
            $params['lan'] = Session::get('lan');
        else if(isset($params['lan']) == false)
            $params['lan'] = 'CN';
        else
            Session::put('lan', $params['lan']);
        $companyRepository = new CompanyRepository();
        $params['companyAreas'] = $companyRepository->getAreaWithCompany();
        $watchAmount = env('WATCH_AMOUNT', 0);
        $this->setEnvironmentValue(['WATCH_AMOUNT' => ++$watchAmount]);
        $params['watchAmount'] = str_pad($watchAmount, 5, '0', STR_PAD_LEFT);
        
        return view('front.index', ['result' => $params]);
    }

    public function company(Request $request, $companyId) {
        $params = $request->all();
        if(isset($params['lan']) == false && Session::has('lan') == true)
            $params['lan'] = Session::get('lan');
        else if(isset($params['lan']) == false)
            $params['lan'] = 'CN';
        else
            Session::put('lan', $params['lan']);
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
        case 'CN':
            $company->nameShow = $company->name;
            break;
        case 'EN':
            $company->nameShow = $company->nameEn;
            break;
        }
        return view('front.company', ['company' => $company]);
    }

    public function product(Request $request, $companyId) {
        $params = $request->all();
        if(isset($params['lan']) == false && Session::has('lan') == true)
            $params['lan'] = Session::get('lan');
        else if(isset($params['lan']) == false)
            $params['lan'] = 'CN';
        else
            Session::put('lan', $params['lan']);
        $companyRepository = new CompanyRepository();
        $company = $companyRepository->getById($companyId);
        if(trim($company->contactLink4) == '')
            $company->contactLink4 = '#';
        switch($params['lan']) {
        case 'CN':
            $company->nameShow = $company->name;
            break;
        case 'EN':
            $company->nameShow = $company->nameEn;
            break;
        }

        $productRepository = new ProductRepository();
        $products = $productRepository->getByCompanyId($companyId);
        foreach ($products as $i => $product) {
            switch($params['lan']) {
            case 'CN':
                $products[$i]->nameShow = $product->name;
                $products[$i]->infoShow = $product->info;
                break;
            case 'EN':
                $products[$i]->nameShow = $product->nameEn;
                $products[$i]->infoShow = $product->infoEn;
                break;
            }
        }
        return view('front.product', ['products' => $products, 'company' => $company] );
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
}
