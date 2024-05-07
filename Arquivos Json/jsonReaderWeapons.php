<?php
    header('content-type: application/json');

    //funções que retornam tudo
    function returnWeapons()
    {
        $json_weapons = json_decode(file_get_contents('./json/weapons.json'));
        return json_encode($json_weapons);
    }

    //Funções que retornam por ID
    function returnWeaponById()
    {

        $json_weapons = json_decode(file_get_contents('./json/weapons.json'));

        $id = $_GET['id'];

        foreach($json_weapons as $weapon)
        {
            if($weapon->id == $id) return json_encode($weapon);
        }
        http_response_code(404);

    }

    if(isset($_GET['id'])) echo returnWeaponById();
    else echo returnWeapons();

?>