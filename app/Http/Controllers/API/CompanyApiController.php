<?php

namespace App\Http\Controllers\API;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest as StoreRequest;
use Illuminate\Http\JsonResponse;

class CompanyApiController extends Controller
{

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request)
    {
        $company = Company::make($request->validated());
        if($logo = $request->file('logo')){
            $company->logo = $logo->store('public/companies');
        }

        $company->save();
        return response()->json([
            'company' => $company->only('name', 'logo'),
            'message' => __('operations.successful.store', ['item' => $company->name])
        ]);
    }

}
