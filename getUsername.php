<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hello World</title>
    <!-- Add some CSS to change client UI -->
    <style>
    body {
        background-color: #232F3E;
        }
    label, button {
        color: #FF9900;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        margin-left: 40px;
        }
     input {
        color: #232F3E;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        margin-left: 20px;
        }
    </style>
    <script>
        // define the callAPI function that takes a first name and last name as parameters
        var callAPI = (firstName,lastName)=>{
            // instantiate a headers object
            var myHeaders = new Headers();
            // add content type header to object
            myHeaders.append("Content-Type", "application/json");
            // using built in JSON utility package turn object to string and store in a variable
            var raw = JSON.stringify({"firstName":firstName,"lastName":lastName});
            // create a JSON object with parameters for API call and store in a variable
            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };
            // make API call with parameters and use promises to get response
            fetch("https://t1131pozlk.execute-api.us-east-1.amazonaws.com/dev", requestOptions)
            .then(response => response.text())
           // .then(result => alert(JSON.parse(result).body))
            .then(result => alert(result))
            .catch(error => console.log('error', error)); 
    
          //  document.cookie="users=1";
              
            //        $users = $_COOKIE['users'];
                
    
    
 
        };
        
    </script>
</head>
<body>
    <form>
        <label>First Name :</label>
        <input type="text" id="fName">
        <label>Last Name :</label>
        <input type="text" id="lName">
        <!-- set button onClick method to call function we defined passing input values as parameters -->
        <button type="button" onclick="callAPI(document.getElementById('fName').value,document.getElementById('lName').value)">Call API</button>
      <?php 
//        if (isset($_COOKIE[$users])) {
//            echo ($users); 
//        }
//        foreach($users as $user) {
//            echo $user;
//        }
//    ?>
    
    </form>
<?php include_once 'footer.php';

