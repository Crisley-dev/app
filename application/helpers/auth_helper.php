<?php

function permission() {
    $ci = get_instance();
    $loggeduser = $ci->session->userdata("logged_in");
    if(!$loggeduser) {
        $ci->session->set_flashdata("danger", "Você precisa estar logado para acessar esta pagina");
        redirect('login');
    }
    return $loggeduser;

}