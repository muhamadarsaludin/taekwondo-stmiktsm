<?php

function sendEmail($to, $name, $subject, $template, $attachment = null)
{
  $response = [];

  $email = \Config\Services::email();
  $email->setTo($to);
  $email->setSubject($subject);

  if (is_file($attachment)) {
    $email->attach($attachment);
  }

  $template = view($template, compact("subject", "name"));
  $email->setMessage($template);

  if (!$email->send()) {
    $message = $email->printDebugger(['headers']);
    $response = [
      'status' => false,
      'message' => $message
    ];
  } else {
    $response = [
      'status' => true,
      'message' => 'Email successfully sent'
    ];
  }

  return $response;
}
