<?php




class test {

    public function initial_fbsdk() {
        $var = "<!-- initial facebook SDK -->";
        $var .= "<div id=\"fb-root\"></div> ";
        $var .= "<script>(function(d, s, id) { ";
        $var .= "  var js, fjs = d.getElementsByTagName(s)[0]; ";
        $var .= "  if (d.getElementById(id)) return; ";
        $var .= "  js = d.createElement(s); js.id = id; ";
        $var .= "  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8\"; ";
        $var .= "  fjs.parentNode.insertBefore(js, fjs); ";
        $var .= " }(document, 'script', 'facebook-jssdk'));</script>";
        $var .= "<!-- initial facebook SDK --> </br>";
        echo $var;
    }

   public  function facebook_like_button($url, $_share) {
        $share = (!is_bool($_share)?"true":strtolower($_share));   
        $this->initial_fbsdk();
        $var = "<!-- facebook like button -->";
        $var .= "<div class=\"fb-like\"  ";
        $var .= "	data-href=\"" . $url . "\"  ";
        $var .= "	data-layout=\"button_count\"  ";
        $var .= "	data-action=\"like\"  ";
        $var .= "	data-size=\"small\"  ";
        $var .= "	data-show-faces=\"true\"  ";
        $var .= "	data-share=\"" . $share . "\"> ";
        $var .= "</div> ";
        $var .= "<!-- facebook like button --> </br>";
        echo $var;
    }

}
