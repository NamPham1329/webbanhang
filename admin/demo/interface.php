<?php
interface create{
    public function create();
}
interface CRUD
{
    public function selectAll();
    public function getDetail($id);
    public function update($roleID, $userID);
    public function delete($id);
}
interface Validator{
    public function validate($data):bool;
}
