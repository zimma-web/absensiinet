<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login E-Absensi PT.Inet Global Indo</title>
    <link href="{{ asset('tabler/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        .login-form {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px; /* Limit width for mobile */
            margin: auto; /* Center the form */
            position: relative; /* For positioning the decorative elements */
        }
        .form-footer {
            margin-top: 1rem;
        }
        .btn-primary {
            background-color: #007bff; /* Bright blue color */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
            border-color: #0056b3;
        }
        .decorative-element {
            position: absolute;
            top: -50px; /* Adjust position as needed */
            left: 50%;
            transform: translateX(-50%);
            width: 100px; /* Adjust size as needed */
        }
        @media (max-width: 768px) {
            .login-form {
                padding: 1.5rem; /* Adjust padding for smaller screens */
            }
        }
    </style>
</head>

<body class="d-flex flex-column">
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
                        </div>
                        <div class="login-form">
                            <img src="{{ asset('tabler/static/illustrations/undraw_secure_login_pdn4.svg') }}" class="decorative-element" alt="Decorative Element">
                            <h2 class="h2 text-center mb-4">Login to your account</h2>
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <p>{{ $errors->first() }}</p>
                                </div>
                            @endif
                            <form action="/proseslogin" method="POST" autocomplete="off" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" name="password" class="form-control" placeholder="Your password" required>
                                        <span class="input-group-text">
                                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" onclick="togglePasswordVisibility()">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" />
                                        <span class="form-check-label">Remember me on this device</span>
                                    </label>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('tabler/dist/js/demo.min.js') }}" defer></script>
    <script src="{{ asset('tabler/dist/js/tabler.min.js') }}" defer></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.querySelector('input[name="password"]');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>

</html>
