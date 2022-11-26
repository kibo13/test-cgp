@extends('admin.index')
@section('title-admin', __('Companies'))
@section('content-admin')
    <section id="companies-index" class="overflow-auto">
        <h3>{{ __('Companies') }}</h3>

        <div class="my-2 btn-group">
            <a class="btn btn-primary" href="{{ route('admin.companies.create') }}">
                {{ __('New record') }}
            </a>
        </div>

        @if(session()->has('success'))
        <div class="my-2 alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif

        <table id="is-datatable" class="dataTables table table-bordered table-hover table-responsive">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th class="w-25 bk-min-w-150">Name</th>
                <th class="w-25 bk-min-w-150">Number</th>
                <th class="w-25 bk-min-w-150">Director</th>
                <th class="w-25 bk-min-w-150">RegisteredAt</th>
                <th class="no-sort">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $index => $company)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->number }}</td>
                    <td>{{ $company->director }}</td>
                    <td>{{ dth_date($company->registered_at) }}</td>
                    <td>
                        <div class="bk-btn-actions">
                            <a class="bk-btn-action bk-btn-action--edit btn btn-warning"
                               href="{{ route('admin.companies.edit', $company) }}"
                               data-tip="Edit" ></a>
                            <a class="bk-btn-action bk-btn-action--delete btn btn-danger"
                               href="javascript:void(0)"
                               data-id="{{ $company->id }}"
                               data-toggle="modal"
                               data-target="#bk-delete-modal"
                               data-tip="Delete" ></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
