<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\ContactRepository;
use Session;
use Exception;

class UserController extends Controller
{
    public function index(Request $request) {
        return redirect('/company/home');
    }

    public function home(Request $request) {
        $company = Session::get('company');
        $params = $request->all();
        $validate = Validator::make($request->all(), [
            'nowPage' => 'integer',
            'offset' => 'integer',
        ]);

        if($validate->fails()) {
            $res['status'] = false;
            $res['message'] = $validate->errors();
            return response()->json($res, 200);
        }
        $params['nowPage'] = isset($params['nowPage']) ? $params['nowPage'] : 1;
        $params['offset'] = isset($params['offset']) ? $params['offset'] : 10;
        $params['companyId'] = $company->id;

        $contactRepository = new ContactRepository();

        $result = [
            'result' => true,
            'msg' => 'success',
            'nowPage' => $params['nowPage'],
            'offset' => $params['offset'],
        ];
        try {
            $result['processCount'] = $contactRepository->amountList($params);
            if($contactRepository->listsAmount($params) > 0) {
                $result['jobTitleList'] = $contactRepository->statisticsJobTitleListByCompany($company->id);
                $result['industryList'] = $contactRepository->statisticsIndustryListByCompany($company->id);
            } else {
                $result['jobTitleList'] = [];
                $result['industryList'] = [];
            }
        }
        catch(Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
            return view('company.proccessResult', ['adm' => $company, 'result' => $result]);
        }
        return view('company.home', ['adm' => $company, 'result' => $result]);
    }

    public function loginPage(Request $request) {
        return view('company.login');
    }

    public function passAdmin(Request $request) {
        $company = Session::get('company');
        return view('company.setting.index', ['adm' => $company]);
    }

    public function login(Request $request) {
        $params = $request->all();
        $params['account'] = isset($params['account']) ? $params['account'] : '';
        $params['password'] = isset($params['password']) ? $params['password'] : '';
        $companyRepository = new CompanyRepository();
        $company = $companyRepository->checkPassword($params);
        $result = [
        ];
        if(isset($company->id) == true && $company->active == 1) {
            Session::put('company', $company);
            return redirect('/company/home');
        } else if(isset($company->id) == true && $company->active == 0) {
            $result['errMsg'] = '帳號未啟用';
        } else
            $result['errMsg'] = '帳密有誤';
        return view('company.login', ['result' => $result]);
    }

    public function logout(Request $request) {
        Session::flush();
        return redirect('/company/login');
    }

    public function passUpdate(Request $request) {
        $company = Session::get('company');
        $params = $request->all();
        $params['account'] = $company->account;
        $result = [
            'result' => true,
            'msg' => 'success',
        ];

        try {
            $companyRepository = new CompanyRepository();
            $companyRepository->updatePassword($params);
        }
        catch(Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.proccessResult', ['adm' => $company, 'result' => $result]);
    }

    public function edit(Request $request) {
        $company = Session::get('company');
        $result = [
            'result' => true,
            'msg' => 'success',
        ];
        try {
            $companyRepository = new CompanyRepository();
            $result['company'] = $companyRepository->getById($company->id);
        }
        catch(Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.edit', ['result' => $result]);
    }

    public function update(Request $request) {
        $company = Session::get('company');
        $params = $request->all();
        $files = [];
        $result = [
            'result' => true,
            'msg' => 'success',
        ];
        if($request->hasFile('logo'))
            $files['logo'] = $request->file('logo');
        if($request->hasFile('logo2'))
            $files['logo2'] = $request->file('logo2');
        if($request->hasFile('infoPath1'))
            $files['infoPath1'] = $request->file('infoPath1');
        if($request->hasFile('infoPath2'))
            $files['infoPath2'] = $request->file('infoPath2');
        if($request->hasFile('infoPath3'))
            $files['infoPath3'] = $request->file('infoPath3');
        if($request->hasFile('infoPath4'))
            $files['infoPath4'] = $request->file('infoPath4');
        if($request->hasFile('infoPath5'))
            $files['infoPath5'] = $request->file('infoPath5');
        if($request->hasFile('companyRightInfo'))
            $files['companyRightInfo'] = $request->file('companyRightInfo');

        try {
            $companyRepository = new CompanyRepository();
            $companyRepository->updateById($company->id, $params, null, $files);
        } catch (Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.proccessResult', ['result' => $result]);
    }

    public function forgetPage(Request $request) {
        return view('company.forget');
    }

    public function forget(Request $request) {
        $res = [
            'status' => true,
            'message' => '發送新密碼至您的信箱'
        ];
        $params = $request->all();
        $email = isset($params['email']) ? $params['email'] : '';
        $companyRepository = new CompanyRepository();
        try {
            $newPass = $companyRepository->sendNewPassword($email);
        } catch (Exception $e) {
            $res['status'] = false;
            $res['message'] = $e->getMessage();
        }

        return view('company.forgetResult', ['res' => $res] );
    }

    public function removeCompanyInfo(Request $request, $infoId) {
        $company = Session::get('company');
        $companyId = $company->id;
        $files = [];
        $result = [
            'result' => true,
            'msg' => 'success',
        ];

        try {
            $companyRepository = new CompanyRepository();
            $companyRepository->delCompanyInfoPic($companyId, $infoId);
        } catch (Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.proccessResult', ['adm' => $company, 'result' => $result]);
    }
}
