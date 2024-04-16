
<?php include 'partials/header.php'; ?>

<body>
      
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top " id="sideNav">
        
    <div class="dropdown  ms-md-auto" >
            <button class="btn text-white  fs-3  " type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><a class="dropdown-item" href="<?= ROOT."/login" ?>">Login</a></li>
         
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
    <section class="resume-section pb-0" id="search">
        <div class="container-fluid p-0">
            <div class="resume-section-content mb-5">
                <h1 class="mb-0 text-center mb-3" >
                    <span class="text-dark">Find My Schedule</span>
                </h1>

                <p class="lead text-secondary text-center mb-5 mx-auto" style="font-size:1rem; width:60%;">Only ID numbers are allowed to be typed in the search bar. Once your input is correct, your schedule will be displayed below.</p>

                <div class="__form-body mx-auto" >
                    
                    <input name="id" type="text text-center" class="form-control mb-5" placeholder="Ex. MA2019XXXX" >
                    <div style="width: 50%;  " class="mx-auto">
                        <input onclick="scrollToSection('result_schedule')" type="submit" name="submit" class="form-control bg-primary text-white p-2 mx-auto" style="width:60%;" value="SEARCH">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>

<form  method="POST">
    <section class="pb-0 mt-0 <?php echo $schedule ?>"  id="result_schedule">
        <div class="container-fluid p-0">
            <div class="resume-section-content mb-5">
              <div class="__container-show">
                <div class="row">
                    <div class="col-12 col-md-8" >
                        <div style="height: 600px; width: 80%; " class="mx-auto shadow-lg rounded">
                            <img src="../app/views/assets/img/<?php echo $filename ?>" alt="schedule" class="__img-schedule rounded">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex" >
                       <div class="__container-download my-auto">
                            <h3 class="mb-0 text-center" >
                                <span class="text-dark">Do you want to download?</span>
                            </h3>
                            <p class="lead text-secondary text-center mt-2">Believe in yourself and your abilities. Best of luck with your studies!</p>

                            <div style="width: 50%; " class="mx-auto">
                                <input type="submit" name="downloadBtn" class="form-control bg-primary text-white p-2" value="DOWNLOAD">
                            </div>
                       </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </section>
</form>

</body>

<?php include 'partials/footer.php'; ?>