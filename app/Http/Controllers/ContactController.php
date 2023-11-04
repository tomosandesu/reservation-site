<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function create()
    {
        return view('guests.contact');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:50',
            'message' => 'required|max:400',
        ]);
        $contact = Contact::create($validated);
        Mail::to($request->email)->send(new ContactFormMail($validated));
        Mail::to('admin@example.com')->send(new ContactFormMail($validated));
        $request->session()->flash('message', '送信しました');
        return redirect()->route('welcome');
    }
    //一覧画面表示
    public function index()
    {
        $contact=Contact::orderBy('created_at', 'desc')->get();
        return view('employee.inquiry', compact('contact'));
    }
    //ステータスについて、「未対応ボタン」をクリック→「対応済みボタン」表示
    //どのcontact_idの未対応ボタンが押されたが大切なので、材料は「$id」
    public function updateStatus($id)
    {
        //contactモデルから該当のIDの情報を取得する
        $contact=Contact::find($id);
        //$contactがあれば＝idが明確になる＝未対応ボタン押される
        if($contact) {
            //ステータスが「０」の時、「１」とする。
            $contact->status = $contact->status === 0?1:0;
            $contact->save();
        }
        return redirect()->route('contact.index');
    }

}
