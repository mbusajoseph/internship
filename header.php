<!DOCTYPE html>
<html> 
    <head>  
    <link rel="icon" href="" size="16x16" type=""/>
        <title>Dashboard | TOURISM CENTER</title>  
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head> 
    <body>  
       <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="dashboard.php" class="navbar-brand">TOURISM CENTER</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
        <a href="#" class="nav-item nav-link active"></a>
            <a href="dashboard.php" class="nav-item nav-link">Home</a>
            <a href="orders.php" class="nav-item nav-link">Orders</a>
          
           
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tourism centers</a>
                <div class="dropdown-menu">
                  
                    <a href="tourism_centers.php" class="dropdown-item">View Tourism centers</a>
                    <a href="create_tourism_centers.php" class="dropdown-item">Create Tourism centers</a>
                   
                </div>
            </div>
        </div>
       
        <div class="navbar-nav">
           <a href="javascript:void(0)" class="nav-item nav-link">      
       <strong class="text-primary"><i class="fas fa-user"></i>
        <?php 
          if (isset($username)) {
             echo $username;
          }

         ?>
     </strong>
            <a href="auth.php?logout='1'" class="nav-item nav-link" onclick="return confirm('Logout?')">Logout</a>
        </div>
    </div>
</nav>