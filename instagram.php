<form action="#">
    <p>Digitar Username do Instagram</p>
    <input type="text" name="username">
    <button type="submit">Buscar</button>
</form>

<br>
<hr>

<?php

if(!empty($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    $username = $_GET['username'];
    $response = @file_get_contents( "https://www.instagram.com/$username/?__a=1" );

        if ( $response !== false ) {
            $data = json_decode( $response, true );
            if ( $data !== null ) {
                $nome = $data['graphql']['user']['full_name'];
                $seguidores  = $data['graphql']['user']['edge_followed_by']['count'];
                $seguindo  = $data['graphql']['user']['edge_follow']['count'];
                echo "$nome tem $seguidores seguidores, ele segue $seguindo pessoas";
            }
        } else {
            echo 'erro ao Buscar username';
        }

        die();
} 

?>