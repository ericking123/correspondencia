@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')

    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}

        {{-- NOMBRE COMPLETO --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- NUMERO DE CI --}}
        {{--<div class="input-group mb-3">
            <input type="text" name="ci" class="form-control {{ $errors->has('ci') ? 'is-invalid' : '' }}"
                   value="{{ old('ci') }}" placeholder="Ingrese su CI" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-hashtag {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>--}}

        {{-- CODIGO DE REGIONAL --}}
        <div class="input-group mb-3">
            <input type="text" name="cod_reg" onkeyup="this.value = this.value.toUpperCase();" class="form-control {{ $errors->has('cod_reg') ? 'is-invalid' : '' }}"
                   value="{{ old('cod_reg') }}" placeholder="Código de Regional o Estación" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-code {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('cod_reg'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('cod_reg') }}</strong>
                </div>
            @endif
        </div>

        {{-- DESCRIPCION DE REGIONAL --}}
        <div class="input-group mb-3">
            <input type="text" name="descRegional" onkeyup="this.value = this.value.toUpperCase();" class="form-control {{ $errors->has('descRegional') ? 'is-invalid' : '' }}"
                   value="{{ old('descRegional') }}" placeholder="Descripción de Regional o Estación" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-keyboard {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

{{-- @section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop --}}
