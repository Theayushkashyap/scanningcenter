<!DOCTYPE HTML>
<html>
<head>
  <title>Register Form</title>
</head>
<body>
<center>
    <table border="4">
        <thread>
            <tr>
                <th>Hospital</th>
                <td><input type="text" name="hospital" id="hospital"></td>
                </tr>
                </thread>
                <tbody>
                    <tr>
                        <tr>
                            <th>first Name</th>
                            <td><input type="text" name="fname" id="fname"></td>
                            </tr>
                            <tr>
                                <th>last Name</th>
                                <td><input type="text" name="lname" id="lname"></td>
                                </tr>
                                <tr>
                                    <th>Emailid</th>
                                    <td><input type="text" name="email" id="email"></td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <td><input type="text" name="age" id="age"></td>
                                        </tr>
                                        <tr id="btna">
                                            <td><input type="button" name="button" name="button" id="btn" value="Add" onclick="AddRow()"></td>
                                            </tr>
                        
                        </tr>
                        </tbody>
                        </table>
                        <table border="4" id="show">
                            <thead>
                                <tr>
                                    <th>Hospital</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                        </table>
                        </center>
<script>
    var list1 = [];
    var list2 = [];
    var list3 = [];
    var list4 = [];
    var list5 = [];

    var n = 1;
    var x = 0;

    function AddRow(){

        var AddRown = document.getElementById('show');
        var NewRow = AddRown.insertRow(n);

        list1[x] = document.getElementById("hospital").value;
        list2[x] = document.getElementById("fname").value;
        list3[x] = document.getElementById("lname").value;
        list4[x] = document.getElementById("email").value;
        list5[x] = document.getElementById("age").value;

        var cel1 = NewRow.insertCell(0);
        var cel2 = NewRow.insertCell(1);
        var cel3 = NewRow.insertCell(2);
        var cel4 = NewRow.insertCell(3);
        var cel5 = NewRow.insertCell(4);

        cel1.innerHTML = list1[x];
        cel2.innerHTML = list2[x];
        cel3.innerHTML = list3[x];
        cel4.innerHTML = list4[x];
        cel5.innerHTML = list5[x];

        n++;
        x++;
        
        
    }
</script>
</body>
</html>