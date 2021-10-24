<?php


namespace App\Repository\Member;


use App\Models\User;

class MemberRepository implements MemberInterface
{
    public function getAllData()
    {
        return User::latest()->get();
    }

    public function storeOrUpdate($id = null, $data = [])
    {
        if (is_null($id)){
            $member = new User();
            $member->first_name = $data['first_name'];
            $member->last_name = $data['last_name'];
            $member->phone = $data['phone'];
            $member->email = $data['email'];
            $member->password = bcrypt($data['password']);
            $member->save();
        }else{
            $member = User::find($id);
            $member->first_name = $data['first_name'];
            $member->last_name = $data['last_name'];
            $member->phone = $data['phone'];
            $member->email = $data['email'];
            $member->save();
        }
    }

    public function view($id)
    {
        return User::find($id);
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }
}
