<?php
    
    header('Content-type: application/json');

    //funções que retornam tudo
    function returnAgents()
    {
        $json_agents = json_decode(file_get_contents('./json/agents.json'));      
        return json_encode($json_agents);
    }


    //Funções que retornam por ID
    function returnAgentById()
    {
        $json_agents = json_decode(file_get_contents('./json/agents.json'));

        $id = $_GET['id'];

        foreach($json_agents as $agent)
        {
            if($agent->id == $id) return json_encode($agent);
        }
        http_response_code(404);

    }

    if(isset($_GET['id'])) echo returnAgentById();
    else echo returnAgents();

?>