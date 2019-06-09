<?php
namespace ChatApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use ChatApp\Model\Message;

class Chat implements MessageComponentInterface {
    
    protected $clients;
    
    public function __construct(){
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg){
        foreach($this->clients as $client){
            if($client !== $from){
                $client->send($msg);
            }
        }
        Message::create([
            'text' => $msg
        ]);
    }

    public function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
        echo "Connection ({$conn->resourceId}) has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e){
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

}

?>

