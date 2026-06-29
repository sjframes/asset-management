@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <i class="fa-solid fa-key fa-3x text-primary mb-3"></i>

                        <h3>Forgot Password</h3>

                        <p class="text-muted">
                            Request a password reset from the administrator.
                        </p>

                    </div>

                    <form method="POST"
                          action="{{ route('forgot.password.store') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Employee ID
                            </label>

                            <input
                                type="text"
                                name="employee_id"
                                class="form-control"
                                required>

                        </div>

                        <button class="btn btn-primary w-100">

                            Request Password Reset

                        </button>

                    </form>

                    <div class="text-center mt-4">

                        <a href="{{ route('login') }}">

                            ← Back to Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection