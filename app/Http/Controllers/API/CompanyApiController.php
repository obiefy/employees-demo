<?php

namespace App\Http\Controllers\API;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest as StoreRequest;
class CompanyApiController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $company = Company::make($request->validated());
        if($logo = $request->file('logo')){
            $company->logo = $logo->store('public/companies');
        }

        $company->save();
        return response()->json([
            'company' => $company,
            'message' => __('operation.successfully.create', ['item' => $company->name])
        ]);
    }

}
