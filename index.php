<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
 echo "<pre>".var_dump($getReactions)."</pre>";

if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => "Ieniminie",
        'email' => "ieniminie@sesamstraat.nl",
        'message' => "Geweldig dit"
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
</head>
<body>
<iframe width="560" height="315" src="https://www.youtube.com/embed/l5SKYA9qQes?si=yQD4Y41SvWXvHQxB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
   <form action = "" method = "POST" >  
<div>
    <input type = "text" name = "Name" required/>
</div>
<div>
    <input type = "text" name = "Comment" required/> <br />
</div>
<div>
    <input type = "email" name = "Email" required/> 
</div>
<div>
    <input type = "submit" name = "Submit"  value="Submit"/> 
</div>

    </form>

    <p>Maak hier je eigen pagina van aan de hand van de opdracht</p>
</body>
</html>
<?php
$sql =
"INSERT INTO `reactions` (name, email,message)
    VALUES ('".$_POST["Name"]."','".$_POST["Email"]."','".$_POST["Comment"]."')";   
$con->query($sql);
?>
<?php
foreach ($getReactions as $reaction){

 echo $reaction["name"]." <br>";
}
foreach ($getReactions as $reaction){

    echo $reaction["email"]." <br>";
   }
   foreach ($getReactions as $reaction){

    echo $reaction["Comment"]." <br>";
   }
$con->close();
?>  