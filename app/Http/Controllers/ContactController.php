<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => __('message.name_required'),
            'email.required' => __('message.email_required'),
            'email.email' => __('message.email_invalid'),
            'subject.required' => __('message.subject_required'),
            'message.required' => __('message.message_required'),
        ]);

        try {
            // حفظ الرسالة في قاعدة البيانات
            $contactMessage = ContactMessage::create($validated);

            // إرسال إيميل للمالك
            $config = \App\Models\Config::first();
            if ($config && $config->email) {
                Mail::to($config->email)->send(new ContactMessageMail($contactMessage));
            }

            return redirect()->back()->with('success', __('message.message_sent_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('message.message_send_failed'));
        }
    }
}
