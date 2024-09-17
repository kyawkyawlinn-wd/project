<?php 
  include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$auth = Auth::check();

try {
  $table = new UsersTable(new MySQL);
  $users = $table->getAll();
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="Js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar bg-dark navbar-dark navbar-expand">
        <div class="container">
          <a href="#" class="navbar-brand">Admin</a>
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a href="profile.php" class="nav-link"><?= $auth->name ?></a>
              </li>
              <li class="nav-item">
                  <a href="_actions/logout.php" class="nav-link text-danger">Logout</a>
              </li>
          </ul>
        </div>
    </nav>
    <div class="container my-4">
      <table class="table table-striped table-bordered">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th></th>
          </tr>
          <?php if (!empty($users)) : ?>
              <?php foreach ($users as $user) : ?>
                  <tr>
                      <td><?= htmlspecialchars($user->id) ?></td>
                      <td><?= htmlspecialchars($user->name) ?></td>
                      <td><?= htmlspecialchars($user->email) ?></td>
                      <td><?= htmlspecialchars($user->phone) ?></td>
                      <td>
                          <?php if($user->role_id == 3) : ?>
                            <span class="badge bg-success">
                               <?= htmlspecialchars($user->role) ?>
                            </span>
                          <?php elseif ($user->role_id == 2) :?>
                            <span class="badge bg-primary">
                               <?= htmlspecialchars($user->role) ?>
                            </span>
                          <?php else : ?>
                            <span class="badge bg-secondary">
                               <?= htmlspecialchars($user->role) ?>
                            </span>
                          <?php endif ?>
                      </td>
                      <td>
                            <div class="btn-group dropdown">
                              <?php if ($auth->role_id == 3 ) :?>
                                <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">Role</a>
                                <div class="dropdown-menu drodown-menu-dark">
                                  <a href="_actions/role.php?id=<?= htmlspecialchars($user->id) ?>&role=1" class="dropdown-item">User</a>
                                  <a href="_actions/role.php?id=<?= htmlspecialchars($user->id) ?>&role=2" class="dropdown-item">Manager</a>  
                                  <a href="_actions/role.php?id=<?= htmlspecialchars($user->id) ?>&role=3" class="dropdown-item">Admin</a>
                                </div>
                              <?php endif ?>

                              <?php if ($auth->role_id >= 2) :?>
                                  <?php if($user->suspended) :?>
                                    <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-warning">Ban</a>
                                  <?php else : ?>
                                    <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-warning">Ban</a>
                                  <?php endif ?>
                              <?php endif ?>
                              <?php if($auth->role_id > 1) :?>
                                   <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm   btn-outline-danger">Delete</a>
                              <?php endif ?>
                            </div>
                      </td>
                  </tr>
              <?php endforeach; ?>
          <?php else : ?>
                <tr>
                      <td colspan="6">No users found.</td>
                </tr>
          <?php endif; ?>
      </table>
    </div>
</body>
</html>