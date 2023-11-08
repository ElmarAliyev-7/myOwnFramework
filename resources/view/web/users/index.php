<?php
include_once 'resources/view/web/layouts/header.php';
//Prepare html
$html = "<div class='card-deck'>";
    $html = "<div class='container'>";
        $html = "<div class='row' style='margin-right: 0px;'>";
            foreach ($users as $user) :
                $html .= "<div class='card col-3'>";
                    $html .= "<div class='card-body'>";
                        $html .= "<img class='card-img-top' src='https://cdn2.iconfinder.com/data/icons/instagram-outline/19/11-512.png' alt='Card image cap'>";
                        $html .= "<h5 class='card-title'>" . $user['name'] . " " . $user['surname'] . "</h5>";
                        $html .= "<p class='card-text'>Card text.</p>";
                        $html .= "<p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
                    $html .= "</div>";
                $html .= "</div>";
            endforeach;
        $html .= "</div>";
    $html .= "</div>";
$html .= "</div>";
echo $html;
include_once 'resources/view/web/layouts/footer.php';
