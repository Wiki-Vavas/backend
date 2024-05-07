<?php

    header('content-type: application/json');


    //funções que retornam tudo
    function returnNews()
    {
        $json_news = json_decode(file_get_contents('./json/news.json'));
        return json_encode($json_news);
    }

    //Funções que retornam por ID
    function returnNewById()
    {

        $json_news = json_decode(file_get_contents('./json/news.json'));

        $id = $_GET['id'];

        foreach($json_news as $new)
        {
            if($new->id == $id) return json_encode($new);
        }
        http_response_code(404);
    }

    if(isset($_GET['id'])) echo returnNewById();
    else echo returnNews();

?>