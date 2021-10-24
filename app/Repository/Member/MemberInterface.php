<?php


namespace App\Repository\Member;


interface MemberInterface
{
    public function getAllData();

    public function storeOrUpdate($id = null,$data);

    public function view($id);

    public function delete($id);
}
