<?php include 'partials/header.php'; ?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top " id="sideNav">
        <div class="dropdown  ms-md-auto" >
            <button class="btn text-white  fs-3  " type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><a class="dropdown-item" href="<?= ROOT."/home" ?>">Home</a></li>
              
            </ul>
        </div>
      
        <div  class="my-auto ">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Bulacan Polytechnic College</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile  rounded-circle mx-auto " src="../app/views/assets/img/logo.png" alt="..." /></span>
            </a>
        </div>
    </nav>
  
    <form method="POST">

        <section class="resume-section pb-0" id="about">
            <div class="container-fluid p-0">
                <div class="resume-section-content mb-5">
                
                <?php if(!empty($message)){ ?>
                    
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong> <?= $message ?></strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 
                 <?php } ?>
                 
                    <h1 class="mb-0 text-center" >
                        <span class="text-dark">Find My Schedule</span>
                    </h1>
                </div>
                
                <div class="d-flex mb-5">
                    
                    <div class="__form-body mx-auto" style="width:70%;" >
                        
                        <input type="text" class="form-control mb-3" placeholder="username" style="border:1px solid lightgray;" name="username" required>
                        <input type="password" class="form-control mb-4" placeholder="password" style="border:1px solid lightgray;" name="password" required>
                        <div style="width: 50%; " class="mx-auto">
                            <input type="submit" name="login" class="form-control bg-primary text-white p-2 mx-auto" value="LOGIN" style="width:50%;">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </form>
 
    
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>