<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     $message =  $this;
    //     $data = $this->data;
    //     return $this->subject('subject email')
    //     ->markdown('emails.orders.shipped',['data' =>$data,'message' =>$message]);
      
      
    // }
    public function build()
    {
        $data = $this->data;
        return $this->markdown('emails.orders.shipped',['data'=>$data]);
    }
}
