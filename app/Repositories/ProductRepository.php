<?php

namespace App\Repositories;

use App\Product;
use Exception;

class ProductRepository
{
    public function create($params, $company, $files) {
        $product = new Product();
        $product->name = isset($params['name']) ? $params['name'] : '';
        $product->nameEn = isset($params['nameEn']) ? $params['nameEn'] : '';
        if(isset($params['email'])) {
            foreach($params['email'] as $ei => $email)
                if(trim($email) == '')
                    unset($params['email'][$ei]);
                else
                    $params['email'][$ei] = trim($email);
            $product->emailMulti = implode(',', $params['email']);
        } else {
            $product->emailMulti = '';
        }
        $product->info = isset($params['info']) ? $params['info'] : '';
        $product->infoEn = isset($params['infoEn']) ? $params['infoEn'] : '';
        $product->active = isset($params['active']) ? $params['active'] : 1;
        $product->video = isset($params['video']) ? $params['video'] : '';
        $product->companyId = $company->id;
        $product->save();

        $root = config('filesystems')['disks']['product']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['picture1'])) {
            $ext = $files['picture1']->getClientOriginalExtension();
            $filename = $product->id. "_picture1.$ext";
            $product->picture1 = $path. $filename;
            $product->save();
            $files['picture1']->move($root. $path, $filename);
        }
        if(isset($files['picture2'])) {
            $ext = $files['picture2']->getClientOriginalExtension();
            $filename = $product->id. "_picture2.$ext";
            $product->picture2 = $path. $filename;
            $product->save();
            $files['picture2']->move($root. $path, $filename);
        }
        if(isset($files['picture3'])) {
            $ext = $files['picture3']->getClientOriginalExtension();
            $filename = $product->id. "_picture3.$ext";
            $product->picture3 = $path. $filename;
            $product->save();
            $files['picture3']->move($root. $path, $filename);
        }
        if(isset($files['dm'])) {
            $ext = $files['dm']->getClientOriginalExtension();
            $filename = $product->id. "_dm.$ext";
            $product->dm = $path. $filename;
            $product->save();
            $files['dm']->move($root. $path, $filename);
        }
    }

    public function lists($params) {
        $nowPage = isset($params['nowPage']) ? (int) $params['nowPage'] : 1;
        $offset = isset($params['offset']) ? (int) $params['offset'] : 10;
        if(isset($params['companyId']) == false)
            throw new Exception('please input company id');

        $productQuery = Product::orderBy('id', 'desc')
            ->where('companyId', '=', $params['companyId'])
            ->skip(($nowPage-1) * $offset)
            ->take($offset);
        $companies = $productQuery->get();
        foreach($companies as $i => $product) {
            switch($product->active) {
            case 0:
                $companies[$i]->activeShow = '否';
                break;
            case 1:
                $companies[$i]->activeShow = '是';
                break;
            }
        }
        return $companies;
    }

    public function listsAmount($params) {
        if(isset($params['companyId']) == false)
            throw new Exception('please input company id');
        $productQuery = Product::orderBy('id', 'desc')
            ->where('companyId', '=', $params['companyId']);
        return $productQuery->count();
    }

    public function getById($id) {
        $product = Product::where('id', '=', $id)
            ->first();
        if(isset($product->id) == false) {
            throw new Exception("產品不存在 id:[$id]");
        }
        return $product;
    }

    public function updateById($id, $params, $admin = null, $files) {
        $product = Product::where('id', '=', $id)
            ->first();
        if(isset($product->id) == false)
            throw new Exception("資料不存在 id:[$id]");
        if(isset($params['account']) == true)
            $product->account = $params['account'];
        $product->name = isset($params['name']) ? $params['name'] : '';
        $product->nameEn = isset($params['nameEn']) ? $params['nameEn'] : '';
        \Log::info($params);
        if(isset($params['email'])) {
            foreach($params['email'] as $ei => $email)
                if(trim($email) == '')
                    unset($params['email'][$ei]);
                else
                    $params['email'][$ei] = trim($email);
            $product->emailMulti = implode(',', $params['email']);
        } else {
            $product->emailMulti = '';
        }
        $product->info = isset($params['info']) ? $params['info'] : '';
        $product->infoEn = isset($params['infoEn']) ? $params['infoEn'] : '';
        if(isset($params['active']) == true)
            $product->active = isset($params['active']) ? $params['active'] : 1;
        $product->video = isset($params['video']) ? $params['video'] : '';
        $product->dm = isset($params['dm']) ? $params['dm'] : '';
        $product->save();

        $root = config('filesystems')['disks']['product']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['picture1'])) {
            $ext = $files['picture1']->getClientOriginalExtension();
            $filename = $product->id. "_picture1.$ext";
            $product->picture1 = $path. $filename;
            $product->save();
            $files['picture1']->move($root. $path, $filename);
        }
        if(isset($files['picture2'])) {
            $ext = $files['picture2']->getClientOriginalExtension();
            $filename = $product->id. "_picture2.$ext";
            $product->picture2 = $path. $filename;
            $product->save();
            $files['picture2']->move($root. $path, $filename);
        }
        if(isset($files['picture3'])) {
            $ext = $files['picture3']->getClientOriginalExtension();
            $filename = $product->id. "_picture3.$ext";
            $product->picture3 = $path. $filename;
            $product->save();
            $files['picture3']->move($root. $path, $filename);
        }
        if(isset($files['dm'])) {
            $ext = $files['dm']->getClientOriginalExtension();
            $filename = $product->id. "_dm.$ext";
            $product->dm = $path. $filename;
            $product->save();
            $files['dm']->move($root. $path, $filename);
        }
    }

    public function del($id) {
        $product = Product::where('id', '=', $id)
            ->first();
        if(isset($product->id) == false) {
            throw new Exception('廠商不存在');
        }
        $product->delete();
    }

    public function getByCompanyId($companyId) {
        $products = Product::where('companyId', '=', $companyId)
            ->where('active', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
        return $products;
    }
}
