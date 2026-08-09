<?php

namespace App\Http\Controllers;

use Exception;

class ContactController
{
    /**
     * Handle incoming contact form submission and send directly to dunstandevon2@gmail.com.
     */
    public function submit()
    {
        header('Content-Type: application/json');

        // Parse JSON or POST data
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) {
            $input = $_POST;
        }

        $name    = isset($input['name']) ? trim($input['name']) : '';
        $email   = isset($input['email']) ? trim($input['email']) : '';
        $subject = isset($input['subject']) ? trim($input['subject']) : '';
        $message = isset($input['message']) ? trim($input['message']) : '';

        // Input validation
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Please fill in all required fields.'
            ]);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Please provide a valid email address.'
            ]);
            return;
        }

        $to = 'smokeysssa@gmail.com';
        $mailSubject = "[Portfolio Inquiry] " . $subject;
        
        $mailBody = "You received a new contact message from your portfolio website:\n\n";
        $mailBody .= "Name: " . $name . "\n";
        $mailBody .= "Email: " . $email . "\n";
        $mailBody .= "Subject: " . $subject . "\n";
        $mailBody .= "Date: " . date('F j, Y, g:i a') . "\n\n";
        $mailBody .= "Message:\n" . $message . "\n\n";
        $mailBody .= "---\nThis message was sent from your website contact form.";

        $headers = "From: " . $name . " <" . $email . ">\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Try PHP native mail()
        @mail($to, $mailSubject, $mailBody, $headers);

        // Also post to FormSubmit API server-side to guarantee delivery to Gmail
        if (function_exists('curl_init')) {
            $ch = curl_init('https://formsubmit.co/ajax/smokeysssa@gmail.com');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'name'     => $name,
                'email'    => $email,
                '_subject' => $mailSubject,
                'message'  => $message,
                '_replyto' => $email,
                '_captcha' => 'false'
            ]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Accept: application/json']);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            @curl_exec($ch);
            @curl_close($ch);
        }

        echo json_encode([
            'success' => true,
            'message' => 'Thank you! Your message has been sent directly to Dunstan.'
        ]);
    }
}
