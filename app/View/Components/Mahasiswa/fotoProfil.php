<?php

namespace App\View\Components\mahasiswa;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class fotoProfil extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct( 
        public string $foto,
        public string $nama,
    )
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mahasiswa.foto-profil');
    }
}
