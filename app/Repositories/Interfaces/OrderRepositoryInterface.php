<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function browse();

    public function read($id);
    
    public function edit($id, $request);

    public function add($request);

    public function delete($id);
}