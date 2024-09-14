<?php
/*
Constans
- Gunakan kyword const
- Gunakan huruf besar
 */
// class Web{
//     const NAMA_WEB = "myweb.com";
// }

// echo Web::NAMA_WEB;
// echo "<hr>";

/*
Static
- 
-
 */
// class Web {
//     public static $title = "My Page";
// }
// echo Web::$title;
// echo "<hr>";

// class Web
// {
//     public static $title = "My Page";

//     public function changeTitle()
//     {
//         self::$title = 'My Page2';
//         return self::$title;
//     }

//     public function changeTitle2()
//     {
//         self::$title;
//         return self::$title;
//     }
// }

// class YourWeb extends Web
// {
//     public function changeTitle()
//     {
//         self::$title = 'Your Page';
//         return self::$title;
//     }
// }

// echo Web::$title . "<br>";
// $myweb = new Web;
// echo $myweb->changeTitle() . "<br>" .
//     $myweb->changeTitle2();
// echo "<br>";
// $yourweb = new YourWeb;
// echo $yourweb->changeTitle() . "<br>" .
//     $myweb->changeTitle2();


// class Web{
//     public static $title = "First Page";

//     public static function getTitlePage(){
//         return "Nama Halaman Ini adalah " . " '". self::$title . "' ";
//     }
// }

// echo Web::$title;
// echo "<br>";
// echo Web::getTitlePage();


// class Web {
//     public static $title = "First Page";

//     public function getTitlePage(){
//         return "Nama Halaman Ini adalah '" . self::$title . " ' ";
//     }
// }
// class YourWeb extends Web{
//     public static function getTitlePage(){
//         return "Nama Halaman Depan Ini adalah '" . self::$title . " ' ";
//     }
// }

// echo Web::$title;
// echo "<br>";
// echo Web::getTitlePage();
// echo "<br>";
// echo YourWeb::getTitlePage();
// echo "<br>";
// echo Web::getTitlePage();

class Web {
    protected static $title = " First Page";

    protected static function getTitlePage(){
        echo "Nama Halaman Ini adalah " . self::$title;
    }
}

class Other2Web extends Web {
    public function __construct(){
        Web::getTitlePage();
    }
}

new Other2Web;