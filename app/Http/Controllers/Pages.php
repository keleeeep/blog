<?php

namespace App\Http\Controllers;

class Pages extends Controller{

    public function getIndex(){
        #process variable & params
        #talk to the model
        #receive from the model
        #compile or process data from the model if needed
        #pass the data to the correct view
        return view('pages.welcome');
    }

    public function getAbout(){
        // $first = "Fredy";
        // $last = "Gunawan";
        // $full = $first . " " .$last;
        // $mail = "gunawan.fredy97@gmail.com";
        // $data = [];
        // $data["fullname"] = $full;
        // $data["email"] = $mail;
        // return view('pages.about')->withFullname($full)->withEmail($mail);
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

}