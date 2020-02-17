<!DOCTYPE html>
<html>
    <head>
        <title>Szukaj</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="header-styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:400,700&display=swap&subset=latin-ext" rel="stylesheet">
        
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    </head>   
    <body>
        <div class="body-wrapper">
            <header>
                <div class="top-bar">
                    <div class="wrapper">
                        <div class="inzerat-pocitadlo">
                            <span>Partnerské weby: <strong>Řemeslníci</strong> | <strong>Autoservis</strong></span>
                        </div>
                        <div class="user-logged">                           
                            <a href="#" class="logged"><img src="img/header/uzivatel-prihlasen.png" alt=""/><span>Josef Vomáčka</span></a>
                            <div class="user-login-block">
                                <div class="user-login-content">
                                    <a href="#">Můj profil</a>
                                    <a href="#">Upravit profil</a>
                                    <a href="#">Odhlásit se</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="full-menu">
                    <div class="main-header">
                        <div class="wrapper">
                            <div class="logo"><img src="img/header/logo-bydleni.png" alt=""/></div>                    

                            <nav id="menu" class="menu">
                                <ul>
                                    <li><a href="#">Vyhledat</a></li>
                                    <li><a href="#">Výpis inzerátů</a></li>
                                    <li><a href="#">Ceník</a></li>
                                    <li><a href="#">Jak to funguje</a></li>
                                    <li><a href="#">Služby</a></li>
                                    <li><a href="#" class="btn">Přidat inzerát</a></li>
                                </ul>
                            </nav>
                        </div>
</div>
                    <div class="menu-bar">
                        <div class="wrapper">
                            <nav class="menu">
                                <ul>
                                    <li><a href="#">Prodej</a></li>
                                    <li><a href="#">Pronájem</a></li>
                                    <li><a href="#">Spolubydlení</a></li>
                                    <li><a href="#">Komerční nemovitosti</a></li>
                                    <li><a href="#">Pozemky</a></li>
                                </ul>
                            </nav>
                        </div>
</div>
                </div>
                <div class="mobile-menu">
                    <div class="logo"><img src="img/header/logo-bydleni.png" alt=""></div>
                    <div id="nav-icon3" class="burger-menu-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    
                    <div class="menu-wrap">
                        <ul>
                            <li><span>Kategorie</span></li>
                            <li><a href="#">Prodej</a></li>
                            <li><a href="#">Pronájem</a></li>
                            <li><a href="#">Spolubydlení</a></li>
                            <li><a href="#">Komerční nemovitosti</a></li>
                            <li><a href="#">Pozemky</a></li>
                            <li class="separator"></li>
                            <li><span>Nabídka</span></li>
                            <li><a href="#">Vyhledat</a></li>
                            <li><a href="#">Výpis inzerátů</a></li>
                            <li><a href="#">Ceník</a></li>
                            <li><a href="#">Jak to funguje</a></li>
                            <li><a href="#">Služby</a></li>
                            <li><a href="#" class="btn">Přidat inzerát</a></li>
                        </ul>
                    </div>
                </div>
            </header>
        </div>

        <script>
            $(document).ready(function(){                
                $("#nav-icon3").click(function(){
                    $(this).toggleClass("open");
                    $(".menu-wrap").toggleClass("active");
                    
                });
            });
        </script>
        
    </body>
</html>
