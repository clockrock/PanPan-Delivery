<?php

  require('db.php');
  include("auth.php");

  if (isset($_POST['submit_parcel'])){
    error_reporting(E_ALL ^ E_WARNING); 
    $parcel_name = stripslashes($_REQUEST['parcel_name']);
    $parcel_desc = stripslashes($_REQUEST['parcel_desc']);
    $parcel_receiver = stripslashes($_REQUEST['parcel_receiver']);
    $parcel_receiver_address = stripslashes($_REQUEST['parcel_receiver_address']);
    $parcel_weight = $_REQUEST['parcel_weight'];
    $parcel_size = $_REQUEST['parcel_size'];
    $parcel_coldhot = $_REQUEST['parcel_coldhot'];
    $parcel_fragile = $_REQUEST['parcel_fragile'];
    $parcel_prio = $_REQUEST['parcel_prio'];
    $parcel_pickup_date_start = $_REQUEST['parcel_pickup_date_start'];
    $parcel_pickup_date_end = $_REQUEST['parcel_pickup_date_end'];
    $parcel_delivery_date_start = $_REQUEST['parcel_delivery_date_start'];
    $parcel_delivery_date_end = $_REQUEST['parcel_delivery_date_end'];
    $parcel_prio = $_REQUEST['parcel_prio'];
    $parcel_price = $_COOKIE['parcel_price'];
    $trn_date = date("Y-m-d H:i:s");
    $user_id = $_SESSION['user_id'];

    if($_REQUEST['parcel_coldhot'] == NULL){
      $parcel_coldhot = "No";
    }
    if($_REQUEST['parcel_fragile'] == NULL){
      $parcel_fragile = "No";
    }

    $sql = "INSERT INTO parcels (parcel_name, parcel_desc, parcel_receiver, parcel_receiver_address, parcel_weight, parcel_size, parcel_coldhot, parcel_fragile, parcel_pickup_date_start, parcel_pickup_date_end, parcel_delivery_date_start, parcel_delivery_date_end, parcel_prio, parcel_price, trn_date, user_id)
    VALUES ('$parcel_name', '$parcel_desc', '$parcel_receiver', '$parcel_receiver_address', '$parcel_weight', '$parcel_size', '$parcel_coldhot', '$parcel_fragile', '$parcel_pickup_date_start', '$parcel_pickup_date_end', '$parcel_delivery_date_start', '$parcel_delivery_date_end', '$parcel_prio', '$parcel_price', '$trn_date', '$user_id')";

    if (mysqli_query($con, $sql)) {
      echo "New record created successfully";
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

  }
    $con->close();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <title>PANPAN - Create a parcel</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="css/main.css">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://unpkg.com/@metamask/legacy-web3@latest/dist/metamask.web3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="js/jquery-1.8.2.min.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <script src="js/main.js"></script>
      <style>
      .button {
        background-color: #44ab9d;
        color: white;
        padding: 10px 20px;
        text-align: center;
        font-size: 16px;
      }
      </style>
</head>
<body>


  <div id="footerdeadzone">
  PANPAN - Dashboard of PANPAN - Dashboard of <?php echo $_SESSION['username']; ?>
  </div>
    <span class=registerQ><a href="logout.php">Logout</a></span>


  <!-- +++++++ Logo +++++++ -->

  <a href="index.php"><img src="img/Logo.png" class="logoindex"></a><span class="logotekst">PANPAN Parcel Service</span><br />

  <!-- +++++++ Upper +++++++ -->
  
  <p>Fill in the form below to create your parcel </p>

  <div class="form">
  <!-- <div id="loginheader">Log In</div> -->
  <form id="createparcel-form" class="createparcel-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="createparcel">
  <img src="img/rounded/B_box.png">

    <input type="text" name="parcel_name" placeholder="Name your parcel (e.g. Toy dinosaur)" id="blocktop" required /> </br>
    <input type="text" name="parcel_desc" placeholder="Describe your parcel (optional)" id="blockbottom" />  </br>




  <img src="img/rounded/B_destination.png"> <input type="text" name="parcel_receiver" placeholder="Receivers' e-mail" id="blocktop" required /> </br>
   <input type="text" name="parcel_receiver_address" placeholder="Receivers' address" id="blockbottom" required /></br>
  <img src="img/rounded/B_weigth.png"> 
<select id="weight" name="parcel_weight" style="width:200px;"></p>
    <option value="None">Select...</option>
    <option value="Feather">Feather (0.0001 ETH)</option>
    <option value="Light">Light (0.0002 ETH)</option>
    <option value="Medium">Medium (0.0004 ETH)</option>
    <option value="Heavy">Heavy (0.0006 ETH)</option>
    <option value="Elephant">Elephant (0.001 ETH)</option>
</select >  "the weight of your parcel  </p>
<script type="text/javascript">
  var weight = 0;
  $(document).ready(function() {  
         $('#weight').change(function(){
            if($('#weight').val() == "None"){ weight = 0; }
            if($('#weight').val() == "Feather"){ weight = 0.0001; }
            else if($('#weight').val() == "Light"){ weight = 0.0002; }
            else if($('#weight').val() == "Medium"){ weight = 0.0004; }
            else if($('#weight').val() == "Heavy"){ weight = 0.0006; }
            else if($('#weight').val() == "Elephant"){ weight = 0.001; }
         });
      });
</script>
  <img src="img/rounded/B_size.png"> 
  <select id="size" name="parcel_size" style="width:200px;"></p>
    <option value="None">Select...</option>
    <option value="Tiny">Tiny (0.0001 ETH)</option>
    <option value="Small">Small (0.0002 ETH)</option>
    <option value="Medium">Medium (0.0004 ETH)</option>
    <option value="Big">Big (0.0006 ETH)</option>
    <option value="Humongous">Humongous (0.001 ETH)</option>
  </select> the size of your parcel </p>
  <script type="text/javascript">
    var size = 0;
  $(document).ready(function() {          
         $('#size').change(function(){
            if($('#size').val() == "None"){ size = 0; }
            else if($('#size').val() == "Tiny"){ size = 0.0001; }
            else if($('#size').val() == "Small"){ size = 0.0002; }
            else if($('#size').val() == "Medium"){ size = 0.0004; }
            else if($('#size').val() == "Big"){ size = 0.0006; }
            else if($('#size').val() == "Humongous"){ size = 0.001; }
         });
      });
</script>
<img src="img/rounded/B_hotcold.png"> Is your parcel Cold/hot sensitive? (0.0005 ETH)<input type="checkbox" id="coldhot" name="parcel_coldhot" value="Yes" class="checkboxx"/> </p>
  <script type="text/javascript">
    var coldhot = 0;
    $(document).ready(function() {  
      $('#coldhot').change(function(){
         if($('#coldhot').val() == "Yes"){ coldhot = 0.0005; }
      });
    });
  </script>
  <img src="img/rounded/B_fragile.png"> Is the parcel fragile? (0.0005 ETH)<input type="checkbox" id="fragile" name="parcel_fragile" value="Yes" class="checkboxx" /> </p>
  <script type="text/javascript">
    var fragile = 0;
    $(document).ready(function() {  
      $('#fragile').change(function(){
         if($('#fragile').val() == "Yes"){ fragile = 0.0005; }
      });
    });
  </script>
  <img src="img/rounded/B_callendar.png"> Pickup between <input type="date" name="parcel_pickup_date_start"  required /> and  <input type="date" name="parcel_pickup_date_end"  required /></p>
  <img src="img/rounded/B_courier.png"> Deliver between <input type="date" name="parcel_delivery_date_start"  required /> and  <input type="date" name="parcel_delivery_date_end"  required /></p>
  <img src="img/rounded/B_chrono.png"> This parcel needs to be picked up with priority 
  <select id="prio" name="parcel_prio"></p>
    <option value="None">Select...</option>
    <option value="Slow">Slow (0.0003 ETH)</option>
    <option value="Normal">Normal (0.0006 ETH)</option>
    <option value="Quick">Quick! (0.0009 ETH)</option>
  </select> </p>
  <script type="text/javascript">
    var prio = 0;
  $(document).ready(function() {  
         $('#prio').change(function(){
            if($('#prio').val() == "None"){ prio = 0; }
            else if($('#prio').val() == "Slow"){ prio = 0.0003; }
            else if($('#prio').val() == "Normal"){ prio = 0.0006; }
            else if($('#prio').val() == "Quick"){ prio = 0.0009; }
         });
      });
  </script>

  <div>
    <p><button type="button" id="pay_button" class="button" require>Pay</button>   Click pay button to see the price you need to pay</p>
    <div id="status"></div>
  </div>
  <button id="submit_parcel" name="submit_parcel" class="button" type="submit" value="Submit the parcel" >Submit the parcel</input>
  <script type="text/javascript">
    document.getElementById("submit_parcel").disabled = true;
    function check() {
      if(weight == 0 || size == 0 || prio == 0){
          document.getElementById("pay_button").disabled = true;
        }
      else {
        document.getElementById("pay_button").disabled = false;
      }
    }
    // check every 30 ms
    var inval = setInterval(check, 30);

    window.addEventListener('load', async () => {
      if (window.ethereum) {
        window.web3 = new Web3(ethereum);       
        try {
          await ethereum.enable();
          initPayButton()
        } catch (err) {
          $('#status').html('User denied account access', err)
        }
      } else if (window.web3) {
        window.web3 = new Web3(web3.currentProvider)
        initPayButton()
      } else {
        $('#status').html('No Metamask (or other Web3 Provider) installed')
      }
    })

    const initPayButton = () => {
      $('#pay_button').click(() => {
        // paymentAddress is where funds will be send to
        const paymentAddress = '0x192c96bfee59158441f26101b2db1af3b07feb40'
        var amountEth = weight + size + prio + coldhot + fragile
        console.log("ammount = "+amountEth)
        //alert(amountEth)

        web3.eth.sendTransaction({
          to: paymentAddress,
          value: web3.toWei(amountEth, 'ether')
        }, (err, transactionId) => {
          if  (err) {
            console.log('Payment failed', err)
            $('#status').html('Payment failed')
            
          } else {
            //assign()
            console.log('Payment successful', transactionId)
            $('#status').html('Payment successful')
            clearInterval(inval);
            document.getElementById("submit_parcel").disabled = false; 
            document.getElementById("pay_button").disabled = true;         
          }
        })

        $(document).ready(function () {
            createCookie("parcel_price", amountEth, "10");
        });
   
        // Function to create the cookie
        function createCookie(name, value, days) {
          var expires;
            
          if (days) {
              var date = new Date();
              date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
              expires = "; expires=" + date.toGMTString();
          }
          else {
              expires = "";
          }
            
          document.cookie = escape(name) + "=" + 
              escape(value) + expires + "; path=/";
        }
      })
    }
  </script>
  </form>
  </br>
  </div>






</body>
</html>
