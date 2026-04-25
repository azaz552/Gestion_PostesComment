@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card p-4 shadow-sm" style="border-radius: 12px; background: #ffffff;">

            <h3 class="text-center mb-4" style="color:#0d3b66;">
                Login
            </h3>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           class="form-control"
                           style="border:1px solid #0d3b66;">
                    <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           required
                           class="form-control"
                           style="border:1px solid #0d3b66;">
                    <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                </div>

                <!-- Remember -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between align-items-center">

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-decoration-none"
                           style="color:#0d3b66;">
                            Forgot password?
                        </a>
                    @endif

                    <button type="submit"
                            class="btn"
                            style="background:#0d3b66; color:#f5f1e9;">
                        Login
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>

@endsection