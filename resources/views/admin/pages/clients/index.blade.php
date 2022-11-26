@extends('admin.index')
@section('title-admin', __('Clients'))
@section('content-admin')
    <section id="clients-index" class="overflow-auto">
        <h3>{{ __('Clients') }}</h3>

        <div class="my-2 btn-group">
            <a class="btn btn-primary" href="{{ route('admin.clients.create') }}">
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
                    <th class="w-25 bk-min-w-200">Client</th>
                    <th class="w-25 bk-min-w-200">Number</th>
                    <th class="w-25 bk-min-w-200">Phone</th>
                    <th class="w-25 bk-min-w-200">Company</th>
                    <th class="no-sort">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clients as $index => $client)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td title="{{ $client->last_name . ' ' . $client->first_name . ' ' . $client->middle_name }}">
                        {{ fio($client->last_name, $client->first_name, $client->middle_name) }}
                    </td>
                    <td>{{ $client->number }}</td>
                    <td>{{ phone($client->phone) }}</td>
                    <td>
                        <ul>
                            @if($client->companies()->count() > 0)
                            @foreach($client->companies as $company)
                            <li>
                                {{ $company->name }}
                            </li>
                            @endforeach
                            @else
                            <li>-</li>
                            @endif
                        </ul>
                    </td>
                    <td>
                        <div class="bk-btn-actions">
                            <a class="bk-btn-action bk-btn-action--edit btn btn-warning"
                               href="{{ route('admin.clients.edit', $client) }}"
                               data-tip="Edit" ></a>
                            <a class="bk-btn-action bk-btn-action--delete btn btn-danger"
                               href="javascript:void(0)"
                               data-id="{{ $client->id }}"
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
