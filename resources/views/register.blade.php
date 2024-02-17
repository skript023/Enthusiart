<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enthusiart</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-72.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="background-color: #D8E0FF;">
    <section class="register-section align-items-center">
        <div class="container">
            <div class="row align-items-left mb-5">
                <div class="col-md-6">
                    <div class="logo-wrapper mt-3">
                        <a class="logo-img" href="#">
                            <img src="../assets/img/logo-72.png" alt="Enthusiart Logo">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Form Register -->
            <div class="row align-items-center">
                <div class="col-md-6 order-sm-first mb-5">
                    <div class="container left-signin align-items-center">
                        <img src="../assets/img/vector-04.png" class="vector4 mx-auto d-block" alt="Sign Up" width="440">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container form-wrapper">
                        <h2 class="section-title text-center mb-4 m-3" style="font-size: 28px;">Sign Up</h2>
                        <form action="#" method="POST">
                            <!-- Register as -->
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">Register as</label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="artist" value="Artist" required>
                                        <label class="form-check-label" for="Artist">Artist</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="artlover" value="Artlover" required>
                                        <label class="form-check-label" for="artlover">Artlover</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Full Name -->
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter full name" required>
                            </div>
                            <!-- Email -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email address" required>
                            </div>
                            <!-- Password -->
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-process mt-4 text-center">Sign Up</button>
                            <p class="form-label text-center mt-2">
                                Already have an account?
                                <a href="login.html">Sign In</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>