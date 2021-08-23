<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class Contactcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function addContact(){
        return view('admin.contact.add-contact');
    }
    public function saveContact(Request $request){
        $this->validate($request,[
           'address' => 'required'
        ]);
        $saveContact = new Contact();
        $saveContact->address = $request->address;
        $saveContact->email = $request->email;
        $saveContact->phone = $request->phone;
        $saveContact->save();
        return redirect()->route('admin-contact')->with('message','Contact Info saved successfully');
    }
    public function contact(){
        $contact = Contact::first();
        return view('frontend.contact.contact',compact('contact'));
    }
    public function saveContactForm(Request $request){
        $saveContactForm = new ContactForm();
        $saveContactForm->name = $request->name;
        $saveContactForm->email = $request->email;
        $saveContactForm->subject = $request->subject;
        $saveContactForm->message = $request->message;
        $saveContactForm->save();
        return redirect()->back()->with('message','Information saved successfully');
    }
    public function contactMessage(){
        $messages = ContactForm::all();
        return view('admin.contact.message',compact('messages'));
    }
    public function deleteMessage($id){
        $message = ContactForm::find($id);
        $message->delete();
        return redirect()->back()->with('message','Information deleted!!!');
    }
}
