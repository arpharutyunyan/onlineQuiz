<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Creation extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $name;
    public $table;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $name, $table)
    {
        $this->id = $id;
        $this->name = $name;
        $this->table = $table;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.creations')->subject('New creation');
    }
}
