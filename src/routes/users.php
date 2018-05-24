<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group('/user',function(){
    $this->get('/get', function (Request $request, Response $response, array $args) {
        $users = $this->db->select("users","*");
        return $response->withJson($users);
    });

    $this->delete('/delete/{id}', function (Request $request, Response $response, array $args) {
        $this->db->delete("users",[
            "id_user" => $args['id']
        ]);

        $msg = $this->db->error();

        if($msg[0] != "00000"){
            return $response->withJson(array(
                "code" => 0,
                "msg" => "Query failed",
                "error" => $msg[2]
            ));
        }else{
            return $response->withJson(array(
                "code" => 1,
                "msg" => "Query success"
            ));
        }

    });

    $this->put('/update/{id}', function (Request $request, Response $response, array $args) {
        $data = [
            "username" => $request->getParsedBodyParam("username")
        ];

        $this->db->update("users",$data,[
            "id_user" => $args['id']
        ]);

        $msg = $this->db->error();

        if($msg[0] != "00000"){
            return $response->withJson(array(
                "code" => 0,
                "msg" => "Query failed",
                "error" => $msg[2]
            ));
        }else{
            return $response->withJson(array(
                "code" => 1,
                "msg" => "Query success"
            ));
        }

    });

    $this->post('/insert', function (Request $request, Response $response, array $args) {
        $data = [
            "username" => $request->getParsedBodyParam("username"),
            "password" => md5($request->getParsedBodyParam("password")),
            "level" => $request->getParsedBodyParam("level"),
            "created_date" => date('c')
        ];
        
        $this->db->insert("users",$data);
        $msg = $this->db->error();
    
        if($msg[0] != "00000"){
            return $response->withJson(array(
                "code" => 0,
                "msg" => "Query failed",
                "error" => $msg[2]
            ));
        }else{
            return $response->withJson(array(
                "code" => 1,
                "msg" => "Query success"
            ));
        }
    });
});


