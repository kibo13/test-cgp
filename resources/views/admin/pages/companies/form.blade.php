@extends('admin.index')
@section('title-admin', __('Companies'))
@section('content-admin')
    <section id="companies-form" class="overflow-auto">
        <h3>{{ isset($company) ? __('Edit') : __('New record') }}</h3>
        <form class="bk-form"
              action="{{ isset($company) ? route('admin.companies.update', $company) : route('admin.companies.store') }}"
              method="POST">
            <div class="bk-form__wrapper">
                @csrf
                @isset($company) @method('PUT') @endisset
                <!-- name -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="name">
                        Name {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="name"
                           type="text"
                           name="name"
                           value="{{ isset($company) ? $company->name : null }}"
                           placeholder="Name"
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
                           value="{{ isset($company) ? $company->number : null }}"
                           placeholder="Number"
                           required/>
                    @error('number')
                    <span class="bk-validation">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- director -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="director">
                        Director {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="director"
                           type="text"
                           name="director"
                           value="{{ isset($company) ? $company->director : null }}"
                           placeholder="Director"
                           required/>
                </div>
                <!-- registered_at -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="registered_at">
                        Registration date {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="registered_at"
                           type="date"
                           name="registered_at"
                           value="{{ isset($company) ? $company->registered_at : null }}"
                           required/>
                </div>
                <!-- account -->
                <div class="bk-form__field">
                    <label class="bk-form__label" for="account">
                        Account {{ mandatory() }}
                    </label>
                    <input class="bk-form__input bk-max-w-300"
                           id="account"
                           type="text"
                           name="account"
                           value="{{ isset($company) ? $company->account : null }}"
                           required/>
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
                           value="{{ isset($company) ? $company->address : null }}"
                           required/>
                </div>
                <div class="mt-1 mb-0 form-group">
                    <button class="btn btn-outline-success">
                        {{ __('Save') }}
                    </button>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.companies.index') }}">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection
