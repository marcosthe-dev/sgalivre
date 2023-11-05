<?php

/**
 * 
 * Copyright (C) 2009 DATAPREV - Empresa de Tecnologia e Informações da Previdência Social - Brasil
 *
 * Este arquivo é parte do programa SGA Livre - Sistema de Gerenciamento do Atendimento - Versão Livre
 *
 * O SGA é um software livre; você pode redistribuí­-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como 
 * publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença, ou (na sua opnião) qualquer versão.
 *
 * Este programa é distribuído na esperança que possa ser útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer
 * MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "LICENCA.txt", junto com este programa, se não, escreva para a 
 * Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA.
 *
**/

@SGA::check_login('sga.triagem');
/**
 * carrega pagina passada pelo GET
 */
try {

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = DB::getInstance()->get_menu_link($_GET['page']);
        if (file_exists("modules/sga/triagem/$page")) {
            SGA::_include("modules/sga/triagem/$page");
        } else {
            throw new Exception("Pagina nao encontrada.");
        }
    }

} catch(Exception $e) {
	TTriagem::display_exception($e);
}

?>