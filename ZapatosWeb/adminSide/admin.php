<?php
include 'config.php';
 session_start();

if (!isset($_SESSION['name'])){
  header("location: admin-sign.php");
  exit();
}

$sessionName = $_SESSION['name'];
$sql = "SELECT * from admins WHERE a_username = '$sessionName'";
    $sqlquery = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($sqlquery);
?>

<!DOCTYPE html>
<html lang="en">
  <head>

<link id="admineStyle" href="adminStyle.css" rel="stylesheet"/>

<meta charset="utf-8" />
    <title>Admin Dashboard
    </title>
    <body>
    <h1> Welcome <?php echo $_SESSION['name'] ?></h1><br> 
  </head>

  <!----------------------- Start Top NavBar Menu ----------------------------------->


  <div id="main" class="topbar">
  <ul>
    <div class="dropdown">
    <li>    
      <a href=""><button class="dropbtn"><img src="img/user.png" width="25" height="25"><i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="adminlogout.php"><img src="img/logout.png" width="25" height="25">Signout </a>
        <!-- <a href="managment.php?id=<?=$_SESSION['name'];?>&type=<?=$row['a_id'];?>"><img src="img/editing.png" width="25" height="25">Edit profile</a> -->
        <a href="managment.php?id=<?=$_SESSION['name'];?>&type=<?=$row['a_id'];?>"><img src="img/editing.png" width="25" height="25">Edit profile</a> -->
      </div>
    </div>
      </a></li>
      <div class="dropdown">
    <li><a href=""><button  class="dropbtn"><img src="img/world.png"  width="25" height="25"><i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"><img src="img/united-kingdom.png" width="25" height="25">English(UK)</a>
      <a href="#"><img src="img/united-states.png" width="25" height="25">English(USA)</a>
    </div>
  </div> </a></li>
    
    <li><a><button class="openbtn" onclick="openNav()"><img src="img/menu.png" width="25" height="25"></button></a></li>
   
  </ul>
</div> 
<!-------------------------End Top NavBar Menu-------------------------------------------->





  <!----------------------------Start Side NavBar Menu ------------------------------------>
 

  <div id="mySidebar" class="sidebar">
    <a href="" class="closebtn" onclick="closeNav()"><img src="img/close.png" width="25" height="25"></a>
    <img src="img/logo.png" class="logo"  width="85%" height="85" >
    <br>
    <hr class="horizontal light mt-0 mb-2">
    <img src="img/dashboard.png"  width="25" height="25" style="float:left"> 
   <a href="admin.php" style="text-decoration: none ;"><i class="fa fa-fw fa-home" style="float: right;"></i> Dashboard</a>
    <br>
    <img src="img/add-user.png" width="25px" height="25" style="float:left">  
    <a href="availibility.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i> Availability </a>
    <br>
    <img src="img/shoe-shop.png" width="25px" height="25" style="float:left">  
    <a href="product.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i>Add Products</a>
    <br>
    <img src="img/orders-icon.png" width="25px" height="25" style="float:left">  
    <a href="orders.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i>Orders</a>
    <br>

   
      <h6>Account Management</h6>
    <img src="img/logout.png" width="25px" height="25" style="float:left">  
    <a href="adminlogout.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i> Sign out</a>
    <br>
    <img src="img/logout.png" width="25px" height="25" style="float:left">  
    <a href="managment.php?id=<?=$_SESSION['name'];?>&type=<?=$row['a_id'];?>" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i> Edit profile</a>
    <br>

    </div>



    

   <!----------------------------------------------- End Side NavBar Menu ----------------------------------------------------------->



<!---------------------------------------------------  Dashboard   -------------------------------------------------------------------------------------->

   


<section class="main--container">
  <article class= "card">
      <article class= "content">
      <h3> </h3>
      <p>
      <h2>Target customer goal for month</h2><br>
      <h2>20 men</h2><br>
      <h2>10 women</h2><br>
      <h2>10 kids</h2><br>
      </p>
      </article>
      <!--content--article-ends-here--->
      </article>
   
      </article>
          <article class= "card">
              

              <article class= "content">
              <h3»Title</h3>
              <p>
              <table>
        <thead>
          <h2> List of admins</h2>
          <tr>
            <th scope="col" >Admin-id</th>
            <th scope="col" >Admin Username</th>
            <th scope="col">Admin Email</th>
          </tr>
        </thead>
        <?php
        $search = "SELECT * from admins";
        $result = $conn -> query($search);

        if ($result ->num_rows >0){
          while($row = $result-> fetch_assoc()){
            echo "<tr>
            <td>" . $row["a_id"] ."</td>
            <td>" . $row["a_username"] ."</td>
            <td>" . $row["a_email"] . "</td>
            </tr>";
          }
        }
        else{
          echo "No admins found";
        }
        ?>
        <tbody>
     
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      </p>
          </article>
          <!--content--article-ends-here--->
          </article>
          <article class= "card">
              

              <article class= "content">
              <h3»Title</h3>
              <p>
              <table>
        <thead>
          <h2> List of customers</h2>
          <tr>
            <th scope="col" >Customer-id</th>
            <th scope="col" >Customer Username</th>
            <th scope="col">Customer Email</th>
          </tr>
        </thead>
        <?php
        $sql = "SELECT * from customers";
        $result = $conn -> query($sql);

        if ($result ->num_rows >0){
          while($row = $result-> fetch_assoc()){
            echo "<tr>
            <td>" . $row["c_id"] ."</td>
            <td>" . $row["c_username"] ."</td>
            <td>" . $row["c_email"] . "</td>
            </tr>";
          }
        }
        else{
          echo "No customers found";
        }
        ?>
        <tbody>
     
        </tbody>
        <tfoot>
        </tfoot>
      </table>
              </p>
              </article>
              <!--content--article-ends-here--->
              </article>
              <article class= "card">
    
        
                  <article class= "content">
                  <h3»Title</h3>
                  <p>
                  <h2>Shoe trends currently:</h2>
                  <p> Converse </p>
                  <p> Vans </p>
                  <p> Sliders </p>
                  <p> Nikes </p>
                  </p>
                  </article>
                  <!--content--article-ends-here--->
                  </article>
                  <article class= "card">

                      <article class= "content">
                      <h3»Title</h3>
                      <p>
                      <div class="card">  <h4>Pie Chart For product interactivity</h4>
                      <div class="chart"></div></div>
                      <p> Orange: Clicked on men products </p>
                      <p> Yellow: Clicked on men products </p>
                      <p> Blue: Clicked on kids products  </p>
                      <p> Black: Clicked on men products  </p>
                      <p> Purple: Clicked on men products  </p>
                   
          </section>
     




<!---------------------------------------------------  Dashboard   -------------------------------------------------------------------------------------->






<!----------------------------------------------  Butoton Script ------------------------------------------------------------------------>
   <script>

    function openNav() {
      document.getElementById("mySidebar").style.width = "180px";


    }
    
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    
    }
    </script>
<!----------------------------------------------   Butoton Script ------------------------------------------------------------------------>



<!---------------------------------------------- Start FileUpload Script ------------------------------------------------------------------------>
<script>

  const  img_input = document.querySelector("#img_input");
  var uploaded_img = ""

  img_input.addEventListener("Change", function(){
      const reader = new FileReader();
      reader.addEventListener("load",()=>{
        uploaded_img = reader.result;
        document.querySelector("#display-img").style.backgroundImage = ` url(${uploaded_img})`;

      });
      reader.readAsDataURL(this.files[0])
  });
</script>
<!----------------------------------------------  End FileUpload Script ------------------------------------------------------------------------>


  </body>
    </html>