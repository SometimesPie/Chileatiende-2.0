<?php

namespace App\Http\Controllers;

use App\Page;

class PrivacyPolicyController extends Controller{

    public function __invoke() {
        $content = view('pages/privacy');

        return view('layouts/layout',[
            'title' => 'Política de Privacidad',
            'content' => $content
        ]);
    }

}
