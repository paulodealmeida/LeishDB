<?php

function webservicePubMED($pubmedid){
    $ch = curl_init();
    $timeout = 0;
    curl_setopt($ch, CURLOPT_URL, 'http://www.ebi.ac.uk/europepmc/webservices/rest/search?query='. $pubmedid.'&format=xml');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $conteudo = curl_exec ($ch);
    curl_close($ch);
    $xml = simplexml_load_string( $conteudo );
    $referencia = "";
    foreach( $xml -> resultList as $pub )
    {
        $referencia = tirarAcentos($pub -> result -> authorString). " (". tirarAcentos($pub -> result -> pubYear)."). <b>" .
            tirarAcentos($pub -> result -> title) . "</b> " . tirarAcentos($pub -> result -> journalTitle) . "(".
            tirarAcentos($pub -> result -> journalVolume). "), " . tirarAcentos($pub -> result -> pageInfo) . ". " .
            tirarAcentos($pub -> result -> doi) . "   <a href='http://www.ncbi.nlm.nih.gov/pubmed/". tirarAcentos($pub -> result -> pmid).
            "'>[PUBMEDID: ". tirarAcentos($pub -> result -> pmid)."]</a>";
    }
    return $referencia;
}

function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

?>