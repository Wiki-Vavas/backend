<?php

    header('content-type: application/json');

    //funções que retornam tudo
    function returnMaps()
    {
        $json_maps = json_decode(file_get_contents('./json/maps.json'));
        return json_encode($json_maps);
    }

    //Funções que retornam por ID
    function returnMapById()
    {
        $json_maps = json_decode(file_get_contents('./json/maps.json'));

        $id = $_GET['id'];

        foreach($json_maps as $map)
        {
            if($map->id == $id) return json_encode($map);
        }
        http_response_code(404);

    }

    if(isset($_GET['id'])) echo returnMapById();
    else echo returnMaps();

?>