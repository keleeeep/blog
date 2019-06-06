<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;
use Illuminate\Support\Facades\URL;

class PagesController extends Controller{

    public function getIndex(){
        #process variable & params
        #talk to the model
        #receive from the model
        #compile or process data from the model if needed
        #pass the data to the correct view
        $posts = Post::orderBy('updated_at', 'desc')->limit(4)->get();

        return view('pages.welcome')->withPosts($posts);
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

    public function postContact(Request $request)
    {
        $this->validate($request,array(
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ));

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        Mail::send('emails.contact',$data,function($message) use($data){
            $message->from($data['email']);
            $message->to('gunawan.fredy97@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','Your email was sent!');

        return redirect('/');

    }

}
