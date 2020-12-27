<?php

namespace Tests\Feature;

use Tests\TestCase;

class MailTest extends TestCase
{

    public function testSendMail()
    {
//        Mail::send('errors.503', [], function ($message) {
//            $message->to('abcd@xyz.com')->subject('this works!');
//        });
//
//        Mail::fake();
//
//        // Assert that no mailables were sent...
//        Mail::assertNothingSent();
//
//        // Perform order shipping...
//
//        // Assert a specific type of mailable was dispatched meeting the given truth test...
//        Mail::assertSent(function (OrderShipped $mail) use ($order) {
//            return $mail->order->id === $order->id;
//        });
//
//        // Assert a message was sent to the given users...
//        Mail::assertSent(OrderShipped::class, function ($mail) use ($user) {
//            return $mail->hasTo($user->email) &&
//                $mail->hasCc('...') &&
//                $mail->hasBcc('...');
//        });
//
//        // Assert a mailable was sent twice...
//        Mail::assertSent(OrderShipped::class, 2);
//
//        // Assert a mailable was not sent...
//        Mail::assertNotSent(AnotherMailable::class);
    }
}
