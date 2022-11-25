<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media  screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<div class="container">
<div class="card">
<form action="<?php echo e(url('/')); ?>/signup" method="post">
  <?php echo csrf_field(); ?>
<div class="">
    <h1>Registration</h1>
</div>
  <div class="container">
    <label for="email"><b>EmailAdress</b></label>
    <input type="text" placeholder="Enter EmailAdress" name="email" required class="">

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required class="">
    <label for="number"><b>Number</b></label>
    <input type="text" placeholder="Enter number" name="number" required class="">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Register</button>
  </div>
</form>
</div>
</div>
</body>
</html><?php /**PATH /Users/chiraggupta/Sites/localhost/chirag/srchout/infospeed_admin/resources/views/Admin/admin-auth/registration.blade.php ENDPATH**/ ?>