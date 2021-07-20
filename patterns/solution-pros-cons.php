
<?php
$content = file_get_contents('https://v2.jokeapi.dev/joke/Any');
$json=json_decode($content);
?>
<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading -->
<h2>Solution 1</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?=(isset($json->joke)?$json->joke:$json->setup)?></p>
<!-- /wp:paragraph -->

<!-- wp:image -->
<figure class="wp-block-image"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading -->
<h2>Pros</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>pro1</li><li>pro2</li><li>...</li></ul>
<!-- /wp:list -->

<!-- wp:heading -->
<h2>Cons</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>con1</li><li>con2</li><li>...</li></ul>
<!-- /wp:list -->

<!-- wp:heading -->
<h2>Conclusion</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The conclusion is that...</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group -->
