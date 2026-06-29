<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asset Management Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>

<div class="blob blob1"></div>
<div class="blob blob2"></div>
<div class="blob blob3"></div>


<div class="login-page">

    <div class="container-fluid">

        <div class="row vh-100">

            <!-- LEFT PANEL -->

            <div class="col-lg-4 left-panel d-none d-lg-flex">

                <div class="branding">

                    <div class="logo-box">
    <img src="{{ asset('images/logo.png') }}" alt="Logo">
</div>

                    <h1>
                        Asset
                        <span>Management</span>
                    </h1>

                    <div class="line"></div>

                    <h3>
                        Manage. Track. Secure. Optimize.
                    </h3>

                    <p>
                        A complete enterprise asset management system
                        for tracking company assets in real time.
                    </p>

                    <div class="feature">

                        <div class="icon">

                            <i class="fa-solid fa-box"></i>

                        </div>

                        <div>

                            <h5>Asset Tracking</h5>

                            <p>Track every asset with QR Code.</p>

                        </div>

                    </div>

                    <div class="feature">

                        <div class="icon">

                            <i class="fa-solid fa-shield-halved"></i>

                        </div>

                        <div>

                            <h5>Secure System</h5>

                            <p>Enterprise-grade security.</p>

                        </div>

                    </div>

                    <div class="feature">

                        <div class="icon">

                            <i class="fa-solid fa-chart-column"></i>

                        </div>

                        <div>

                            <h5>Analytics</h5>

                            <p>Professional dashboards & reports.</p>

                        </div>

                    </div>

                    <div class="feature">

                        <div class="icon">

                            <i class="fa-solid fa-users"></i>

                        </div>

                        <div>

                            <h5>User Management</h5>

                            <p>Role based access control.</p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT PANEL -->

            <div class="col-lg-8 col-12 right-panel">

    <img src="{{ asset('images/logo.png') }}"
         class="logo-watermark"
         alt="Logo">

    <div class="login-card">

                    <div class="login-icon">

                        <i class="fa-solid fa-lock"></i>

                    </div>

                    <h2>Welcome Back!</h2>

                    <p class="subtitle">
                        Sign in to continue
                    </p>

                    @if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label">
                                Username
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="fa-regular fa-user"></i>

                                </span>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    placeholder="Enter Username"
                                    required>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="fa-solid fa-lock"></i>

                                </span>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Enter Password"
                                    required>

                                <span
                                    class="input-group-text password-toggle">

                                    <i class="fa-regular fa-eye"></i>

                                </span>

                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox">

                                <label class="form-check-label">

                                    Remember Me

                                </label>

                            </div>

                            <a href="{{ route('forgot.password') }}" class="forgot">
    Forgot Password?
</a>

                        </div>

                        <button class="btn login-btn">

                            <i class="fa-solid fa-arrow-right-to-bracket me-2"></i>

                            Login

                        </button>

                    </form>

                    <div class="copyright">

                        © 2026 Asset Management System

                    </div>

                </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

const toggle=document.querySelector(".password-toggle");

const password=document.getElementById("password");

toggle.addEventListener("click",()=>{

if(password.type==="password"){

password.type="text";

toggle.innerHTML='<i class="fa-regular fa-eye-slash"></i>';

}else{

password.type="password";

toggle.innerHTML='<i class="fa-regular fa-eye"></i>';

}

});

</script>

</body>

</html>