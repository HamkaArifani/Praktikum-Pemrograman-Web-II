<?php
namespace App\Controllers;

use App\Models\ProfileModel;

class PagesController extends BaseController{
    public function Home(){
        $model = new ProfileModel();

        $data['title']= 'Home';
        $data['Profile'] = $model->getHomeContent();

        return view('Pages/Home', $data);
    }

    public function Profile(){
        $model = new ProfileModel();

        $data['title']= 'Profile';
        $data['Profile'] = $model->getProfilContent();

        return view('Pages/Profile', $data);
    }
    
}
?>