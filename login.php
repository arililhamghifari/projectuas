<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary-color: #64748b;
            --text-dark: #1e293b;
            --text-light: #f8fafc;
            --bg-light: #ffffff;
            --bg-alt: #f1f5f9;
        }

    header {
            background-color: var(--bg-light);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .btn-login {
            padding: 0.5rem 1.5rem;
            border: 2px solid var(--primary-color);
            color: var(--primary-color) !important;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: var(--primary-color);
            color: white !important;
        }
</style>
<body class="bg-light">
    <header>
        <nav>
            <a href="#" class="logo" style="color: #2563eb;">EventKu</a>
            <div class="nav-links">
                <a href="index.html">Beranda</a>
                <a href="jadwal.html">Jadwal</a>
            </div>
        </nav>
    </header>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 350px;">
            <div class="card-body">
                <h4 class="text-center mb-4">Login Admin</h4>

                <form action="proses_login.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
