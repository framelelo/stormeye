<?php

ob_start();

function showNoPage()
{?>
<div class="nopage-background"> 
    <img src="assets/img/nopage.png"  alt="The eye of storm">
</div>
<?php
};
$content = ob_get_clean();
