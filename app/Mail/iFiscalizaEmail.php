<?php

namespace App\Mail;

use App\Models\Denuncia;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class iFiscalizaEmail extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Denuncia $denuncia)
    {
        $this->denuncia = $denuncia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status alterado!')
            ->from('informacoes@ifiscaliza.com.br')
            ->markdown('denuncias.send', ['denuncia' => $this->denuncia]);
    }
}
