<?php
@include 'config.php';
session_start();
if(!isset( $_SESSION['user_name'])){
    header('location:http://localhost:3000/hospital-website-template/login.php');
}
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
         <link rel="stylesheet" href="sstaffpage.css">

         </head>

<body>
    
<div class="hero">
        <nav>
            <img src="../images/Untitled-1.png" class="logo">

            <ul>
                <li><a href="http://localhost:3000/staffpage/staffpage.php">Home</a></li>
                <li><a href="daily.php">Daily Report</a></li>
                <li><a href="#">Payment Details</Details></a></li>
                
            </ul>
            

            <img src="../images/user.png" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
            
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../images/user.png">
                        <h2><span><?php echo $_SESSION['user_name'] ?></span></h2>
                        
                    </div>
                    <hr>

                    <a href="edit.php" class="sub-menu-link">
                        <img src="../images/profile.png" >
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="settings.php" class="sub-menu-link">
                        <img src="../images/setting.png" >
                        <p>Settings & Privacy </p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/help.png" >
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="http://localhost:3000/hospital-website-template/index.html" class="sub-menu-link">
                        <img src="../images/logout.png" >
                        <p>Logout</p>
                        <span>></span>
                    </a>
                   
                    
                    
                </div>
            </div>
        
        </nav>
        <div class="search">
        <div class="icon"></div>
        <div class="input">
            <input type="text" id="mysearch" onkeyup='tableSearch()' placeholder="Search">
        </div>
        <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
    </div>

    <script type="application/javascript">
        function tableSearch(){
            let input, filter, table, tr, td, i, txtValue;
   
        input = document.getElementById("mysearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable")
        tr = table.getElementsByTagName("tr");

        for(let i = 0; i < tr.length; i++){
            td = tr[i].getElementsByTagName("td")[0];
            if(td){
                txtValue = td.textContent || td.innerText;
                if(txtValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                        
            }
            else{
                tr[i].style.display = "none";
            }
        }
        }
    }
    const icon = document.querySelector('.icon');
        const search = document.querySelector('.search');
        icon.onclick = function(){
            search.classList.toggle('active')
        }
    </script>
<?php
                    include("connection.php");
error_reporting(0);
$query = "SELECT * FROM patient_form";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);



//echo $total;

if($total != 0)
{
    ?>
   
<h2 align="center">Displaying All Records</h2>
<center><table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true" cellspacing="8" width="85%">
    <tr>
    <th width="10%">Patient ID</th>
    <th width="10%">Patient Name</th>
    <th width="5%">Age</th>
    <th width="5%">Gender</th>
    <th width="15%">Study Description</th>
    <th width="10%">Contact No</th>
    <th width="10%">Referral Doctor</th>
    <th width="20%">Operations</th>
    </tr>



<?php
 
   while($result = mysqli_fetch_assoc($data))
   {
    echo "<tr>
    <td>".$result['patient_id']."</td>
    <td>".$result['patient_name']."</td>
    <td>".$result['age']."</td>
    <td>".$result['gender']."</td>
    <td>".$result['study_description']."</td>
    <td>".$result['contact_no']."</td>
    <td>".$result['referral_doctor']."</td>

    <td><a href='update_staffpage.php?id=$result[patient_id]'><input type='submit' value='Update' class='update'></a>
   
    <a href='http://localhost:3000/editor.html?id=$result[patient_id]'><input type='submit' value='Report' class='report'></a>
    <a href='print.php?id=$result[patient_id]'><input type='submit' value='Print' class='print'></a>
    </td>
    </tr>
     
    ";
   } 
}
else
{
    echo "No records found";
}

?>

    </div>
<script>
    
    let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>

</body>

</table>
</center>
<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete this record ?');
    }
    </script>
</html>