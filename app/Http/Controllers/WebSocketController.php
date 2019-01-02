<?php

namespace App\Http\Controllers;

use \Exception;
use Illuminate\Http\Request;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class WebSocketController extends Controller
  implements MessageComponentInterface
{
  private $connections;

  function __construct() {
      $this -> connections = collect();
  }

  function onOpen(ConnectionInterface $connection) {
      echo "Connection opened".<br>;
      $this -> connections -> push($connection);
  }

  function onClose(ConnectionInterface $connection) {
      echo "Connection closed".<br>;
      $this -> connections -> reject(function($elem) {
          return $connection == $elem;
      });
  }

  function onError(ConnectionInterface $connection, Exception $exception) {
      echo "Error occured: " . $exception -> getMessage().<br>;
  }

  function onMessage(ConnectionInterface $connection, $message) {
      echo "Message received: " . $message .<br>;

      foreach ($this -> connections as $connection) {
          $connection -> send($message);
      }
  }
}
