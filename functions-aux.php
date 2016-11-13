<?php

function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

function session_start_if_not_exist()
{
    if (!is_session_started()){
        session_start();
    }
}

function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

//Request data about pubmed papers.
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

function redireciona($link){
    if ($link==-1){
        echo" <script>history.go(-1);</script>";
    }else{
        $_REQUEST["p"] = $link;
        echo"<script>document.location.href=". "'../index.php" . "?p=" . "$link'" . "</script>";
    }
}

function get_source($url,$show_headers=0)
{
    if(preg_match('!^http://!',$url))
        $url=substr($url,7,strlen($url));

    if($start=strpos($url,'/'))
        $uri=substr($url,$start,strlen($url));
    else
        $uri='';

    $fp=fsockopen($url,80,$errno,$errstr,4);
    if(!$fp)
    {
        echo "<b><font color=\"red\">Unable to connect to: $url</font></b>";
        return false;
    }
    else
    {
        $buffer='';
        $headers='';

        fputs($fp,"GET /$uri HTTP/1.0\r\n");
        fputs($fp,"Host: $url\r\n");
        //fputs($fp,"Referer: http://www.plebian.com\r\n");
        fputs($fp,"User-Agent: sourcegetter\r\n");
        //fputs($fp,"Cookie: x=y;a=b\r\n");
        fputs($fp,"Connection: close\r\n");

        fputs($fp,"\r\n");
        while(!feof($fp))
        {
            if(!isset($end_of_headers))
            {
                $header=fgets($fp,4096);
                if($header=="\r\n")
                    $end_of_headers=1;
                $headers.=$header;
            }
            else
            {
                $buffer.=fgets($fp,4096);
            }
        }

        fclose($fp);

        if($show_headers)
        {
            $headers=htmlentities($headers);
            $headers=nl2br($headers);

            echo $headers;
        }

        $buffer=htmlentities($buffer);
        $buffer=nl2br($buffer);

        echo $buffer;

        return true;
    }
}
