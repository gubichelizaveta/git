<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'D:/курсач/PHPMailer/src/Exception.php';
  require 'D:/курсач/PHPMailer/src/PHPMailer.php';

  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru','D:/курсач/PHPMailer/language/');
  $mail->IsHTML(true);

  $mail-> setFrom('gubichelizaveta@gmail.com');
  $mail-> addAddress('elizaveta.gubich@mail.ru');

  $mail-> Subject = 'Данные формы Took Coffee';

  $body = '<h1>Инфа: </h1>';

  if(trim(!empty($_POST['name']))) {
      $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
  }
  if(trim(!empty($_POST['email']))) {
    $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
  }
  if(trim(!empty($_POST['phone']))) {
    $body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
  }
  if(trim(!empty($_POST['message']))) {
    $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
  }

  $mail->Body = $body;

  if(!$mail->send()) {
      $message = 'Ошибка';
  } else {
      $message = 'Данные отправлены!';
  }
  
  $response = ['message' => $message];
  header('Content-type: application/json');
  echo json_encode($response);
?>