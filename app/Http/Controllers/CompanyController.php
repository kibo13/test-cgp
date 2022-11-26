<?php

namespace App\Http\Controllers;

use App\Http\Requests\Companies\CompanyStoreRequest;
use App\Http\Requests\Companies\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $perPage   = $request->per_page ?? 1000;
        $companies = Company::orderBy('created_at', 'DESC')->paginate($perPage);

        return view('admin.pages.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.pages.companies.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(CompanyStoreRequest $request): RedirectResponse
    {
        Company::create($request->all());

        $request->session()->flash('success', __('Record has been successfully added'));
        return redirect()->route('admin.companies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return View
     */
    public function edit(Company $company): View
    {
        return view('admin.pages.companies.form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return RedirectResponse
     */
    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->all());

        $request->session()->flash('success', __('Record has been successfully updated'));
        return redirect()->route('admin.companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return RedirectResponse
     */
    public function destroy(Request $request, Company $company): RedirectResponse
    {
        $company->delete();

        $request->session()->flash('success', __('Record has been successfully deleted'));
        return redirect()->route('admin.companies.index');
    }
}
