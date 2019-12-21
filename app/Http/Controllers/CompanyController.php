<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompanyRequest as UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('company.index')->with([
            'companies' => Company::paginate(config('ok-tamam.pagination'))
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return View
     */
    public function show(Company $company)
    {
        return view('company.show')->withCompany($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return View
     */
    public function edit(Company $company)
    {
        return view('company.edit')->withCompany($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Company $company)
    {
        $company->fill($request->validated());
        if($logo = $request->file('logo')){
            $originalLogo = $company->getOriginal()['logo'];
            if(Storage::exists($originalLogo)){
                Storage::delete($originalLogo);
            }
            $company->logo = $logo->store('public/companies');
        }
        $company->update();
        return redirect()->route('companies.show', $company)->withSuccess('Company Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company)
    {
        $originalLogo = $company->getOriginal()['logo'];
        if(Storage::exists($originalLogo)){
            Storage::delete($originalLogo);
        }

        $company->delete();
        return redirect()->route('companies.index')->withSuccess($company->name . ' Deleted successfully');
    }
}
