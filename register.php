<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4 text-center" style="max-width: 600px;">
      <h1 class="h3 mb-3">Register</h1>

      <form action="_actions/create.php" method="post" class="mb-3">
            <input type="text" class="form-control mb-2" name="name" placeholder="Name" required>
            <input type="email" class="form-control mb-2" name="email" placeholder="Email" required>
            <input type="text" class="form-control mb-2" name="phone" placeholder="Phone" required>
            <textarea class="form-control mb-2" name="address" placeholder="Address" required> </textarea>
            <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>
            <button class="btn btn-primary w-100">Register</button>
      </form>
      <a href="index.php">Login</a>
    </div>
</body>
</html> 