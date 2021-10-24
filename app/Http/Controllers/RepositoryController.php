<?php

namespace App\Http\Controllers;

use App\Repository\Member\MemberInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RepositoryController extends Controller
{
    protected $user;
    public function __construct(MemberInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $page = 'index';
        if (View::exists('welcome')){
            return view('welcome', [
                'members' => $this->user->getAllData(),
                'page' => $page
            ]);
        }
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $data = $request->only(['first_name', 'last_name', 'phone', 'email', 'password']);
        $dataUpdate = $request->only(['first_name', 'last_name', 'phone', 'email']);
        if (!is_null($id)){
            //dd($dataUpdate);
            $this->user->storeOrUpdate($id, $dataUpdate);
            return redirect('/')->with('success', 'Member information updated');
        }else{
            $this->user->storeOrUpdate($id = null, $data);
            return redirect()->back()->with('success', 'Member information added');
        }
    }

    public function view($id)
    {
        $page = 'edit';
        if (View::exists('welcome')){
            return view('welcome', [
                'member' => $this->user->view($id),
                'members' => $this->user->getAllData(),
                'page' => $page
            ]);
        }
    }

    public function delete($id)
    {
        $this->user->delete($id);
        return redirect()->back()->with('success', 'Member information deleted');
    }
}
