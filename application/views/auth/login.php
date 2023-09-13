<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
      background-image:url('https://foto.data.kemdikbud.go.id/getImage/20328986/12.jpg')
    }
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bootstrap</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
     .logo {
            max-width: 200px;
            height: auto; 
            display: block; 
            margin: 0 auto 40px; 
        }
</style>

<body >
  <div class="container py-5 ">
<div class="card w-50 justify-content-center mx-auto bg-aqua">
<div class="header">

<img class="d-flex justify-content-center logo" src="https://binusasmg.sch.id/ppdb/logobinusa.png" alt="image" height="200px" width="200px" >  
    <h3 class="text-center">SMK Bina Nusantara Demak</h3> 
    <h2 class="text-center pt-3 text-primary">LOGIN</h2>
</div>
  
<form action="connect_login.php" method="post" >
    <div class="card-body">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
  </div>
 <div class="text-center pb-3">
 <button type="submit"class="btn btn-primary">LOGIN</button>
 </div>
        </form>
        <br> 
          <p class="text-center">tidak punya akun? <a href="./auth">register akun</a></p>
        </div>
        </div>
</body>
</html>
