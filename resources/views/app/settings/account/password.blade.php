@extends('mailcoach-ui::app.settings.account.layouts.account', ['titlePrefix' => __('Password')])

@section('breadcrumbs')
    <li>
        <a href="{{ route('account') }}">
            {{ __('Account') }}
        </a>
    </li>
    <li>{{ __('Password') }}</li>
@endsection

@section('account')
    <form
        class="form-grid"
        action="{{ route('password') }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <x-mailcoach::text-field :label="__('Current password')" name="current_password" type="password"  required />
        <x-mailcoach::text-field :label="__('New password')" name="password" type="password"  required />
        <x-mailcoach::text-field :label="__('Confirm new password')" name="password_confirmation" type="password" required />

        <div class="form-buttons">
            <button type="submit" class="button">
                <x-mailcoach::icon-label icon="fa-lock" :text="__('Update password')" />
            </button>
        </div>
    </form>
@endsection
