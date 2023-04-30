<?php
    include_once 'header.php';
?>
   
        
         <section
      class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start"
    >
             
             <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
            <div>
            <h1>Hello,
                
                <?php
                if (isset($_SESSION["username"])) {
                        
                        echo "<span class='text-warning'>" .$_SESSION['username'] ."</span></h1>";
                        
                           }
                else {
                                            echo "<span class='text-warning'> Ready to Save? </span></h1>";

                }
               
                    ?>
                
                
            <p class="lead my-4">
              We focus on teaching our students the fundamentals of the latest
              and greatest technologies to prepare them for their first dev role
            </p>
            <button
              class="btn btn-warning btn-lg"
              data-bs-toggle="modal"
              data-bs-target="#enroll"
              onclick = "document.location =
              
              <?php 
                 if (isset($_SESSION["username"])) {
                     ?>
              'addExpense.php'"
              <?php
                 }
                 else { ?>
                     'signup.php'"
                     
                     <?php
                 }

              ?>   
               > 
              Start Saving 
              <!--take me to sign up or log in
              if im not logged in
              if im logged in take me to budget-->
            </button>
            

          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="images/moneyHomePage-removebg-preview.png"
            alt=""
          />
        </div>
      </div>

        </section>
        
        
        <!-- Boxes -->
    <section class="p-5">
      <div class="container">
        <div class="row text-center g-4">
          <div class="col-md">
            <div class="card bg-secondary text-light">
              <div class="card-body text-center">                  
                <div class="h1 mb-3">
                  <img
                        src="images/budget.png" width ="90" height ="90"
                        alt=""
                    />
                </div>
                  <h3 class="card-title mb-3">Budget</h3>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Iure, quas quidem possimus dolorum esse eligendi?
                </p>
                <button type="button" class="btn btn-light" onclick = "document.location = 'budget.php'">Start Budgeting</button>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card bg-secondary text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
<!--                  <i class="bi bi-bell"></i>-->
                   <img
                        src="images/reminders.png" width ="90" height ="90"
                        alt=""
                    />
                </div>
                <h3 class="card-title mb-3">Reminders</h3>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Iure, quas quidem possimus dolorum esse eligendi?
                </p>
                <button type="button" class="btn btn-light">Set My Reminders</button>
               
              </div>
            </div>
          </div>
          <div class="col-md">
        <div class="card bg-secondary text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
<!--                  <i class="bi bi-bar-chart"></i>-->
                </div>
                  <img  src="images/analytics.png" width ="90" height ="90" alt=""/>
                  
                <h3 class="card-title mb-3">Analytics</h3>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Iure, quas quidem possimus dolorum esse eligendi?
                </p>
               <button type="button" class="btn btn-light">View</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
        
         <!-- Newsletter -->
    <section class="bg-primary text-light p-5">
      <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
          <h3 class="mb-3 mb-md-0">Sign Up To Receive Weekly Money Tips!</h3>

          <div class="input-group news-input">
            <input type="text" class="form-control" placeholder="Enter Email" />
            <button class="btn btn-dark btn-lg" type="button">Submit</button>
          </div>
        </div>
      </div>
    </section>
        
<?php
include_once 'footer.php';
   