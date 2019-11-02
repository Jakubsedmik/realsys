<!DOCTYPE html>
<html>
    <head>
        <title>Szukaj</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    </head>   
    <body>
        <div class="body-wrapper">
            <header>
                <div class="top-bar">
                    <div class="wrapper">
                        <div class="inzerat-pocitadlo">
                            <span>Partnerské weby: <strong>Řemeslníci</strong> | <strong>Autoservis</strong></span>
                        </div>
                        <div class="user-login">
                            <a href="#" class="login"><img src="img/header/prihlaseni.png" alt=""/>Přihlášení</a>                            
                            <a href="#" class="signup"><img src="img/header/registrace.png" alt=""/>Registrace</a>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="main-header">
                    <div class="wrapper">
                        <div class="logo"><img src="img/header/logo-bydleni.png" alt=""/></div>                    

                        <nav class="menu">
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
            </header>
            
            <section>    
                <div class="slider">                    
                    <div class="wrapper">
                        <img class="obr-slider pozadi okno" src="img/slider/okno.png" alt=""/>
                        <img class="obr-slider pozadi lednice" src="img/slider/lednice.png" alt=""/> 
                        
                        <div class="slider-content">
                            <div class="slider-title">
                                <h1><strong>Najdi si nový domov</strong>
                                    <br>Bez realitky a bez provize</h1> 
                                <div class="subtitle">
                                    <h2>Nebo Inzeruj...</h2>
                                    <a class="btn inzeruj">Přidat inzerát</a>
                                </div> 
                                
                                <img class="obr-slider popredi lampicka" src="img/slider/lampicka.png" alt=""/>
                            </div>

                            <div class="home-search">
                                <form>
                                    <div class="customSel-wrapper typ-nemovitosti">  
                                        <select name="typ-nemovitosti" class="select-hidden">
                                            <option value="byt">Byt</option>
                                            <option value="dum">Dům</option>
                                            <option value="pozemek">Pozemek</option>
                                            <option value="garaz">Garáž</option>
                                            <option value="kancelar">Kancelář</option>
                                            <option value="nebytovy-prostor">Nebytový prostor</option>
                                        </select>
                                        
                                        <div class="customSelect">
                                            <label>Typ nemovitosti</label>
                                            <div class="selectInput"><span class="inputVal">Rodinné domy</span><a class="small-arrow down"><span class="arrow-ico"></span></a></div>
                                            <div class="selectMenu">
                                                <span class="selectOption">Byt</span>
                                                <span class="selectOption">Dům</span>
                                                <span class="selectOption">Pozemek</span>
                                                <span class="selectOption">Garáž</span>
                                                <span class="selectOption">Kancelář</span>
                                                <span class="selectOption">Nebytový prostor</span>                        
                                            </div>
                                        </div>                                        
                                    </div>  
                                    <div class="customSel-wrapper typ-inzerátu">  
                                        <select name="typ-nemovitosti" class="select-hidden">
                                            <option value="byt">Byt</option>
                                            <option value="dum">Dům</option>
                                            <option value="pozemek">Pozemek</option>
                                            <option value="garaz">Garáž</option>
                                            <option value="kancelar">Kancelář</option>
                                            <option value="nebytovy-prostor">Nebytový prostor</option>
                                        </select>
                                        
                                        <div class="customSelect">
                                            <label>Typ inzerátu</label>
                                            <div class="selectInput"><span class="inputVal">Rodinné domy</span><a class="small-arrow down"><span class="arrow-ico"></span></a></div>
                                            <div class="selectMenu">
                                                <span class="selectOption">Byt</span>
                                                <span class="selectOption">Dům</span>
                                                <span class="selectOption">Pozemek</span>
                                                <span class="selectOption">Garáž</span>
                                                <span class="selectOption">Kancelář</span>
                                                <span class="selectOption">Nebytový prostor</span>                        
                                            </div>
                                        </div>                                        
                                    </div>  
                                    
                                    <label>Lokalita</label>
                                    <input type="text" placeholder="Zadej svoje místo">
                                    
                                    <input type="submit" class="btn submit-btn" value="HLEDEJ INZERÁT"> 
                                </form>
                                
                                <a class="find-more-btn">Rozšířené hledání</a>
                            </div>                              
                        </div>
                        <img class="obr-slider popredi skrin" src="img/slider/skrinka.png" alt=""/>
                        <img class="obr-slider popredi lampa" src="img/slider/lampa.png" alt=""/>
                        <img class="obr-slider popredi kreslo" src="img/slider/kreslo.png" alt=""/>
                        <img class="obr-slider popredi vaza" src="img/slider/vaza.png" alt=""/> 
                    </div>
                </div>
            </section>
            <section>
                <div class="top-nemovitosti">
                    <div class="wrapper">
                        <div class="section-title">
                            <h2>Top Nemovitosti</h2>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            <div class="col-sm nemovitost">    
                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                    <div class="nemovitost-text">
                                        <h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img src="img/ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
                                            </div> 
                                            <div class="infoIco size">
                                                <img src="img/ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
                                            </div>                                        
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">22 850 Kč</h4>
                                            <a class="btn more">Více info</a>                                                
                                        </div>    
                                    </div>   
                                </div>                                
                            </div>
                            
                            
                        </div>
                        
                        <div class="section-btn">
                            <a class="btn" href="#">Další inzeráty</a>
                        </div>
                    </div>
                </div>
            </section>
            
            <section>
                <div class="cta neplatte">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-8">
                                <h2>Neplaťte provizi realitce,<br> když nemusíte</h2>
                                <p>S námi je to snadné! Inzerujte zdarma a neplaťte provizi nám, ani realitnímu makléři.</p>
                            </div>
                            <div class="col-4 cta-btns">
                                <a class="btn bcg-btn" href="#">Přidat inzerát</a>
                                <a class="btn free" href="#">Je to zdarma</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section style="display:none">
                <div class="proc-my">
                    <div class="wrapper">
                         
                        <div class="section-title">
                            <h2>Proč inzerovat u nás</h2>
                        </div> 
                    
                        <div class="row">
                            <div class="col-sm">                                   
                                <div class="why_box">
                                    <div class="image_box first">
                                        <img src="/img/ikony/kvalita.png">
                                    </div>
                                    <h3>Solidní přístup</h3>
                                </div>
                            </div>
                            
                            <div class="col-sm">                                   
                                <div class="why_box">
                                    <div class="image_box second">
                                        <img src="/img/ikony/money.png">
                                    </div>
                                    <h3>0% provize</h3>
                                </div>
                            </div>
                            
                            <div class="col-sm">                                   
                                <div class="why_box">
                                    <div class="image_box third">
                                        <img src="/img/ikony/shield.png">
                                    </div>
                                    <h3>Zabezpečené rozhraní</h3>
                                </div>
                            </div>
                            
                            <div class="col-sm">                                   
                                <div class="why_box">
                                    <div class="image_box fourth">
                                        <img src="/img/ikony/users.png">
                                    </div>
                                    <h3>Prověření uživatelé</h3>
                                </div>
                            </div>
                            
                            <div class="col-sm">                                   
                                <div class="why_box">
                                    <div class="image_box fifth">
                                        <img src="/img/ikony/bez-realitky.png">
                                    </div>
                                    <h3>Žádné realitky</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <footer>
                <div class="wrapper">
                    <div class="row">
                       <div class="col-sm">  
                            <div class="footer_block">
                                <img src="/img/footer/logo-white.png">
                                <p>
                                    Mauris tincidunt sem sed arcu. Temporibus autem quibusdam et aut officiis debitis aut rerum necessit atibus saepe eveniet ut et voluptates repudiandae.
                                </p>
                            </div>
                       </div>
                       
                       <div class="col-sm">  
                            <div class="footer_block">
                                <h3>Účet</h3>
                                <ul class="footer_menu">
                                    <li><a href="#">Můj účet</a></li>
                                    <li class="active"><a href="#">Moje inzeráty</a></li>
                                    <li><a href="#">Nastavení účtu</a></li>
                                    <li><a href="#">Přidat inzerát</a></li>
                                </ul>
                            </div>
                       </div>
                       
                       <div class="col-sm">  
                            <div class="footer_block">
                                <h3>O nás</h3>
                                <ul class="footer_menu">
                                    <li><a href="#">Můj účet</a></li>
                                    <li><a href="#">Moje inzeráty</a></li>
                                    <li><a href="#">Nastavení účtu</a></li>
                                    <li class="active"><a href="#">Přidat inzerát</a></li> 
                                </ul>
                            </div>
                       </div>
                       
                       <div class="col-sm">  
                            <div class="footer_block">
                                <h3>Kontakt</h3>
                                <p>Mauris tincidunt sem sed arcu. Temporibus autem quibusdam</p>
                                <span class="phone">+48 777 888 555</span>
	                            <span class="mail">info@szukajmieskac.pl</span>
                            </div>
                       </div>
                   </div>
                </div>
            </footer>
        </div>
    </body>
</html>
