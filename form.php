<?php
// Define the variables

$userNameErr = $firstNameErr = $emailErr = $phoneErr = $sujetErr = $messageErr = "";
$userName = $firstName = $email = $phone = $sujet = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user_name"])) {
      $userNameErr = "Il faut inscrire un nom";
    } else {
      $userName = test_input($_POST["user_name"]);
    }
  
    if (empty($_POST["first_name"])) {
      $firstNameErr = "Il faut inscrire un prénom";
    } else {
      $firstName = test_input($_POST["first_name"]);
    }
  
    if (empty($_POST["user_email"])) {
      $emailErr = "Tu dois mettre un mail";
    } else {
      $email = test_input($_POST["user_email"]);
    }
  
    if (empty($_POST["tel"])) {
      $phoneErr = "Il faut inscrire un numéro de télephone";
    } else {
      $phone = test_input($_POST["tel"]);
    }
  
    if (empty($_POST["sujet"])) {
      $sujetErr = "Il faut me dire quel est ta passion !";
    } else {
      $sujet = test_input($_POST["sujet"]);
    }

    if (empty($_POST["user_message"])) {
        $messageErr = "Mets un message !";
      } else {
        $message = test_input($_POST["user_message"]);
      }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

  if($userName = $firstName = $email = $phone = $sujet = $message != ""){
      include('thanks.php');
  }

  filter_var($email, FILTER_VALIDATE_EMAIL);

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="user_name" required="required">
        <span class="error"> <?php echo $userNameErr;?></span>
    </div>
    <div>
        <label for="first_name">Prénom :</label>
        <input type="text" id="first_name" name="first_name" required="required">
        <span class="error"> <?php echo $firstNameErr;?></span>
    </div>
    <div>
        <label for="courriel">Courriel :</label>
        <input type="email" id="courriel" name="user_email" required="required">
        <span class="error"> <?php echo $emailErr;?></span>
    </div>
    <div>
        <label for="telephone">Téléphone</label>
        <input type="tel" name="tel" required="required">
        <span class="error"> <?php echo $phoneErr;?></span>
        <div>
            <div>
                <label for="select">
                    Votre passion :
                </label>
                <select id="sujet" name="sujet" required="required"> 
                    <option value="" selected disabled hidden>Selectionnez votre sujet</option>
                    <option value="1">la politique</option>
                    <option value="2">la science</option>
                    <option value="3">les poules</option>
                    <option value="4">la constitution hongroise</option>
                </select>
                <span class="error"> <?php echo $sujetErr;?></span>
            </div>
            <label for="message" >Message :</label>
            <textarea id="message" name="user_message" required="required"></textarea>
            <span class="error"> <?php echo $messageErr;?></span>
        </div>
        <div class="button">
            <button type="submit">Envoyer votre message</button>
        </div>
</form>

