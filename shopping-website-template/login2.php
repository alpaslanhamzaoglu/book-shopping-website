<!DOCTYPE html>
<html>
     <style>body {
  background: #1690A7;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
}

*{
  font-family: sans-serif;
  box-sizing: border-box;
}

form {
  width: 500px;
  border: 2px solid #ccc;
  padding: 30px;
  background: #fff;
  border-radius: 15px;
}

h2 {
  text-align: center;
  margin-bottom: 40px;
}

input {
  display: block;
  border: 2px solid #ccc;
  width: 95%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
}
label {
  color: #888;
  font-size: 18px;
  padding: 10px;
}

button {
  float: right;
  background: #555;
  padding: 10px 15px;
  color: #fff;
  border-radius: 5px;
  margin-right: 10px;
  border: none;
}
button:hover{
  opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
  text-align: center;
  color: #fff;
}

.ca {
  font-size: 14px;
  display: inline-block;
  padding: 10px;
  text-decoration: none;
  color: #444;
}
.ca:hover {
  text-decoration: underline;
}</style>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
      <h2>LOGIN</h2>

          <label>Email</label>
          <input type="email" name="email" placeholder="Email"><br>

          <label>Password</label>
          <input type="password" name="password" placeholder="Password"><br>

          <button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>

