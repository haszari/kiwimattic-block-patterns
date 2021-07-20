<?php 
    $content = file_get_contents('https://opentdb.com/api.php?amount=1');
    $json = json_decode( $content, true );

    $question = $json[ 'results' ][ 0 ][ 'question' ];
    $answer = $json[ 'results' ][ 0 ][ 'correct_answer' ];

    $url = 'https://api.giphy.com/v1/gifs/search?q=' . urlencode( $answer ) . '&api_key=t1PkR1Vq0mzHueIFBvZSZErgFs9NBmYW&limit=1';
    $giphy_content = file_get_contents( $url );
    $giphy_json = json_decode( $giphy_content, true );
    $giphy_url = $giphy_json[ 'data' ][ 0 ][ 'embed_url' ];
?>

<!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":1,"align":"wide"} -->
<h1 class="alignwide">WTF Trivia</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo $question ?></p>
<!-- /wp:paragraph -->

<!-- wp:jetpack/gif {"giphyUrl":"<?php echo $giphy_url ?>","searchText":"<?php echo $answer ?>","paddingTop":"99%"} /--></div></div>
<!-- /wp:group -->
