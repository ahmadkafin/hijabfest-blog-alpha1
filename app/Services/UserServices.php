<?php
namespace App\Services;


class UserServices {


    /**
     * cek user validation
     * 
     * @return void
     */
    public function cekUser($request)
    {
        $pass = 'Sup3rm4n02';
        if($request->input('this_pass') == $pass)
        {
            return redirect('/admin/users');
        } else {
            abort(403);
        }
    }
    
    public function popData($request){
        return ['roles' => $request->roles];
    }
}