<?php
require_once __DIR__ . '/../controller/usercontroller.php';

$controller = new UserController();

if (isset($_POST['addUser'])) {
    $offer = new User( $_POST['nom'],$_POST['email'],  $_POST['pwd']);
    $controller->addUser($offer);
}

if (isset($_GET['deleteId'])) {
    $controller->deleteUser($_GET['deleteId']);
}

if (isset($_POST['updateUser'])) {
    $controller->updateUser($_POST['id'],$_POST['nom'], $_POST['email'], $_POST['pwd']); 
}      

    $users = $controller->getUsers(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Utilisateur</title>
    <style>
        body { font-family: 'Arial', sans-serif; padding: 20px; background: linear-gradient(to right,rgb(224, 144, 204),rgb(190, 213, 233)); color: white; }
        .container { max-width: 450px; margin: 50px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); color: #333; }
        h2 { text-align: center; color: #444; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: bold; margin-bottom: 20px; color: #555; }
        input { width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; }
        .btn { width: 100%; padding: 12px; font-size: 16px; background-color:rgb(182, 224, 192); color: white; border: none; border-radius: 5px; cursor: pointer; transition: 0.3s; }
        .btn:hover { background-color:rgb(220, 142, 195); }
        .message { margin-bottom: 20px; padding: 15px; border-radius: 5px; font-size: 14px; text-align: center; }
        .error { background-color:rgb(236, 181, 186); color:rgb(215, 103, 114); }
        .success { background-color:rgb(235, 175, 221); color:rgb(163, 217, 244); }
    </style>
</head>
<body>

    <h2>GESTION UTILISATEURS </h2>

    <form method="POST">
        <h3>Add a User</h3>
        <input type="nom" name="nom" placeholder="nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="pwd" placeholder="Password" required>
        <button type="submit" name="addUser">Add</button>
    </form>

    <hr>

    <h3> la liste des utilisateurs </h3>
    <?php if (!empty($users)): ?>
        <table border="3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nom</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nom']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['pwd']; ?></td>
                        <td>
                        <button onclick="openUpdateForm('<?php echo $user['id']; ?>', '<?php echo $user['nom']; ?>', '<?php echo $user['email']; ?>', '<?php echo $user['pwd']; ?>')">
                        Modify
                        </button>

                            <a href="?deleteId=<?php echo $user['id']; ?>" onclick="return confirm('are you sure ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>AUCUN UTILISATEURS</p>
    <?php endif; ?>

    <hr>

    <div id="updateForm" style="display:none;">
        <h3>Modifier</h3>
        <form method="POST">
            <input type="hidden" name="id" id="updateId">
            <input type="nom" name="nom" id="updateNom" placeholder="nom" required>
            <input type="email" name="email" id="updateEmail" placeholder="Email" required>
            <input type="password" name="pwd" id="updatePwd" placeholder="Password" required>
            <button type="submit" name="updateUser">Update</button>
            <button type="button" onclick="closeUpdateForm()">Cancel</button>
        </form>
    </div>

    <script>
        function openUpdateForm(id,nom,email, pwd) {
            document.getElementById('updateForm').style.display = 'block';
            document.getElementById('updateId').value = id;
            document.getElementById('updateNom').value = nom;
            document.getElementById('updateEmail').value = email;
            document.getElementById('updatePwd').value = pwd;
        } 
        function closeUpdateForm() {
            document.getElementById('updateForm').style.display = 'none';
        }
    </script>
    
</body>
</html>
