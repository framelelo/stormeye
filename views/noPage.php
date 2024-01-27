<?php


function showNoPage()
{ 
    ob_start();?>
    <div class="nopage-background">
        <img src="https://zupimages.net/up/24/04/l876.jpeg" alt="The eye of storm">
        <div class="text-container">
            <p>Erreur <br> 404<br> Page introuvable</p>
        </div>
    </div>
<?php
$content = ob_get_clean();
require_once 'layout.php';
};
