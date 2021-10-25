<?php

namespace App\Interfaces;

interface IProcessMessage {

    public function process(int $user_id, string $message);
}