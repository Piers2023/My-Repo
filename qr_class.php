<?php 
class qrClass{
    private $link;
    private $url;
    private $domain;
    public function __construct(){
        
    }
    public function qrcreate($std_id, $table){
        $this->domain = $_SERVER["HTTP_HOST"];
        $this->link = "https://$this->domain/scan.php?std_id=$std_id&table=$table";
        $this->url = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" . urlencode($this->link);
    }
    public function qrrender(){
        echo "<img src = '".$this->url."' alt = 'generateqrcode'>";
    }

    }
    $qrcode = new qrClass();
    ?>