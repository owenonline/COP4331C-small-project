<?php
session_start();
$userID = $_SESSION['ID'];
$conn = new mysqli("localhost", "webappUser", "cop4331SmallProjectAPI", "COP4331"); 	
	if( $conn->connect_error )
	{
		returnWithError( $conn->connect_error );
	}
  else { 
    $f = "select * from Contacts where UserID = '$userID'";
    $result = mysqli_query($conn, $f);
  }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/coolStyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <script src="https://kit.fontawesome.com/6bfbfd351b.js" crossorigin="anonymous"></script>
       	<script type="text/javascript" src="js/code.js"></script>
        <link href="css/contacts.css" rel="stylesheet">	
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.1.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" ></script>
        <script>
            $(document).ready(function (){
                $('#example').DataTable();
            });
        </script>
        <title>COP4331 Coolest Contacts List App Ever</title>
    </head>
    <body>
       <div class="container">
           <header class="header">

              <section class="return">
                <a name="logout" id="logout" onclick="doLogout();">
                    <i class="fas fa-arrow-circle-left back-btn"></i>
                </a>
                <label for="logout">Logout</label>
              </section>

              <section class="add">
                    <a name="addContactButton" id="addContactButton" href="addContact.html">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                    <label for="addContactButton">Add Contact</label>
              </section>
           </header>


           <section class="contacts-title">C  O  N  T  A  C  T  S</section>
           <section class="contacts-slogan">beloved by baristas</section>

            <section class="theTable">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>First Name</th>        
                            <th>Last Name</th>       
                            <th>Email Address</th>       
                            <th>Phone Number</th> 
                            <th>Edit/Delete</th>            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      while ($row = mysqli_fetch_assoc($result)) {
                        $contactID = $row['ID'];
                        $contactFirstName = $row['firstName'];
                        $contactLastName = $row['lastName'];
                        $contactEmail = $row['email'];
                        $contactPhone = $row['phoneNumber'];
                      
                    ?>
                        <tr>
                            <td><?php echo $contactFirstName?></td>     
                            <td><?php echo $contactLastName?></td>       
                            <td><?php echo $contactEmail?></td> 
                            <td><?php echo $contactPhone?></td>
                            <td>
                              <button onclick="location.href='editContact.php?contactID=<?php echo $contactID?>';"">
                                <i class="fa-solid fa-edit"></i>
                              </a> 
                              <button onclick="deleteContact(<?php echo $contactID?>)">
                                <i class="fa-solid fa-trash"></i>
                              </a>
                            </td>
                            <span id="contactDeleteResult"></span>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </tfoot>
                </table>
            </section>
        </div>
    </body>
</html>