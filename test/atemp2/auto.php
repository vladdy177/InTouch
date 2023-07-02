method=POST

<?php

session_start();
$user = $_POST["user"];
$pass = $_POST["pass"];

$users = [
    ["name"=>"vova", "pass"=>password_hash($pass, PASSWORD_DEFAULT), id=>"32"], 
    ["name"=>"boba", "pass"=>"$js$13b0JH0e85e7f70BBJKPL07b23959356VVBB4e.12saqvkgvqwe3", id=>"25"]
    ]

function heslo_se_shoduje($test, $ulozene){
    return password_verify($test, $ulozeno);
    }

foreach ($users as $u) {
    if ($u["name"] == $name) {
        if heslo_se_shoduje($pass, $u["pass"]) {
            $_SESSION["id"] = $u["id"];
        }
    }
}

?>

1) Heshovaci funkce je jednocestna
2) Heshovaci funkce je bezkolizni
arcticles.php?page=1
arcticles.php?page=2&categry=auto