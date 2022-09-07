<?php

namespace App\Http\Controllers;

use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\Contracts\TransactionInterface;
use Laudis\Neo4j\ClientBuilder;
use Illuminate\Http\Request;
use Exception;
use Log;

class Neo4jController extends Controller
{
    public function index(){
        try {
            $auth = Authenticate::basic(env('NEO4J_USERNAME'), env('NEO4J_PASSWORD'));
            $client = ClientBuilder::create()
                ->withDriver('bolt', env('NEO4J_URI'), $auth)
                ->build();

            $client->writeTransaction(static function (TransactionInterface $tsx) {
                $result = $tsx->run('MATCH (n) RETURN n LIMIT 25');
                return response()->json([
                    "data" => $result
                ], 200);
            });
            
        } catch(Exception $e){
            return $e;
        }
    }
}