@extends('admin.index')
@section('title-admin', __('Clients'))
@section('content-admin')
    <section id="clients-form" class="overflow-auto">
        <h3>{{ isset($client) ? __('Edit') : __('New record') }}</h3>
        <form class="bk-form"
              action="{{ isset($client) ? route('admin.clients.update', $client) : route('admin.clients.store') }}"
              method="POST">
            <div class="bk-form__wrapper">
                @csrf
                @isset($client) @method('PUT') @endisset
                <!-- last_name -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="last_name">
                        Last name {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="last_name"
                           type="text"
                           name="last_name"
                           value="{{ isset($client) ? $client->last_name : null }}"
                           placeholder="Last name"
                           required/>
                </div>
                <!-- first_name -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="first_name">
                        First name {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="first_name"
                           type="text"
                           name="first_name"
                           value="{{ isset($client) ? $client->first_name : null }}"
                           placeholder="First name"
                           required/>
                </div>
                <!-- middle_name -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="middle_name">
                        Middle name {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="middle_name"
                           type="text"
                           name="middle_name"
                           value="{{ isset($client) ? $client->middle_name : null }}"
                           placeholder="Middle name"
                           required/>
                </div>
                <!-- number -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="number">
                        Number {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="number"
                           type="text"
                           name="number"
                           value="{{ isset($client) ? $client->number : null }}"
                           required/>
                    @error('number')
                    <span class="bk-validation">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- address -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="address">
                        Address {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="address"
                           type="text"
                           name="address"
                           value="{{ isset($client) ? $client->address : null }}"
                           required/>
                </div>
                <!-- phone -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="phone">
                        Phone {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="phone"
                           type="text"
                           name="phone"
                           value="{{ isset($client) ? $client->phone : null }}"
                           required/>
                </div>
                <!-- companies -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="">
                        Companies
                    </label>
                    <ul class="bk-form__list">
                        @foreach($companies as $index => $company)
                        <li class="bk-form__list-item">
                            <input class="bk-form__list-checkbox"
                                   id="{{ 'company-' . $company->id }}"
                                   type="checkbox"
                                   name="companies[]"
                                   value="{{ $company->id }}"
                                   @isset($client) @if($client->companies->where('id', $company->id)->count())
                                   checked
                                   @endif @endisset>
                            <label class="bk-form__list-label" for="{{ 'company-' . $company->id }}">
                                {{ $company->name }}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-1 mb-0 form-group">
                    <button class="btn btn-outline-success">
                        {{ __('Save') }}
                    </button>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.clients.index') }}">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection
