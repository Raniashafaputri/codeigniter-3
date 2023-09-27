<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    body {
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStFTFc3epFUwOuWHJPyczqAsB4d4Wm9Tw9dXmYLcD4rWeIE5wH-_Gjh-635g_bPlTAUno&usqp=CAU');
    }
</style>
</head>
<body>
<div class="container py-5 "> 
<div class="card w-50 justify-content-center mx-auto bg-light   "> 
<div class="header"> 
<div class="jumbotron text-center">
         <img src="https://binusasmg.sch.id/ppdb/logobinusa.png" alt="image" height="200px" width="250px" >
        </div>
        <div style="text-align: center;">
        <h1>SMK Bina Nusantara</h1>
        </div>
    <h2 class="text-center pt-3 text-primary">LOGIN </h2> 
</div> 
   
<form action="<?php echo base_url(); ?>Auth/aksi_login" method="post" class="space-y-12"> 
    <div class="card-body"> 
    <div class="mb-3"> 
    <label for="exampleInputEmail1" class="form-label">Email </label> 
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"> 
  </div> 
  <div class="mb-3"> 
    <label for="exampleInputPassword1" class="form-label">Password</label> 
    <input type="password" class="form-control" id="exampleInputPassword1" name="password"> 
    </div> 
  </div> 
 <div class="text-center pb-3"> 
 <button type="submit" class="btn btn-primary">LOGIN</button> 
 </div> 
 <br>  
          <p class="text-center"> belum punya akun? <a href="./auth">register akun</a></p> 
        <br>  
        </form> 
=======
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login</title> 
    <!-- Tambahkan link ke Bootstrap CSS --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"> 
 
    <style> 
 
        body { 
            background-image: url('https://mocipay.com/blog/wp-content/uploads/2022/09/gambar-pemandangan-hitam-aesthetic.jpg'); 
            background-size: cover;  
            background-repeat: no-repeat; 
            background-attachment: fixed;  
        } 
        .card-title { 
            color: #fff; 
        } 
        .card { 
            background-color: rgba(255, 255, 255, 0.3);  
            padding: 20px; 
        } 
        .logo { 
            max-width: 200px; 
            height: auto;  
            display: block;  
            margin: 0 auto 40px;  
        } 
 
    </style> 
</head> 
<body> 
    <div class="min-vh-100 d-flex align-items-center"> 
        <div class="container"> 
            <div class="row justify-content-center"> 
                <div class="col-md-4"> 
                    <div class="card"> 
                        <div class="card-body"> 
                            <img src="https://binusasmg.sch.id/ppdb/logobinusa.png" alt="Logo" class="mb-4 logo"> 
                            <h2 class="card-title text-center">Login</h2> 
                            <form action="<?php echo base_url(); ?>Auth/process_login" method="post" method="post">
                                <div class="mb-3"> 
                                    <input type="text" class="form-control" name="email" placeholder="Email" required> 
                                </div> 
                                <div class="mb-3"> 
                                    <input type="password" class="form-control" name="password" placeholder="Password" required> 
                                </div> 
                                <div class="text-center"> 
                                    <button type="submit" class="btn btn-primary">Login</button> 
                                </div> 
                            </form> 
                        </div> 
                    </div> 
                </div> 
            </div> 
>>>>>>> 94dfb78fe3c1402bc17c1ba5abf44364073005a0
        </div> 
    </div> 
    <!-- Tambahkan script untuk Bootstrap JS jika diperlukan --> 
</body> 
</html>