<?php
include_once 'resources/view/web/layouts/header.php';
//Prepare html
$html = "<form class='container'>";
    $html .= "<div class='form-group row' style='margin-right: 0px;'>";
        $html .= "<h2 class='text-center'>Create User</h2>";

        $html .= "<div class='form-group col-md-6'>";
            $html .= "<label for='name'>Name</label><input type='text' class='form-control' id='name' placeholder='Name'>";
        $html .= "</div>";

        $html .= "<div class='form-group col-md-6'>";
            $html .= "<label for='surname'>Surname</label><input type='text' class='form-control' id='name' placeholder='Surname'>";
        $html .= "</div>";

        $html .= "<div class='form-group col-md-6'>";
            $html .= "<label for='inputPassword4'>Password</label><input type='password' class='form-control' id='inputPassword4' placeholder='Password'>";
        $html .= "</div>";

        $html .= "<div class='form-group col-md-2'>";
            $html .= "<label for='avatar'>Avatar</label><input type='file' class='form-control' id='avatar'>";
        $html .= "</div>";

    $html .= "</div>";

    $html .= "<div class='form-group row mt-2'>";
        $html .= "<div class='col-sm-10'>";
            $html .= "<button type='submit' class='btn btn-primary'>Sign in</button>";
        $html .= "</div>";
    $html .= "</div>";

$html .= "</form>";
echo $html;
include_once 'resources/view/web/layouts/footer.php';
