<!DOCTYPE html>
<html>
    <head>
        <title>Výpis inzerátů - Szukaj</title>
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
                <div class="slider_sub">                    
                    <div class="wrapper">
                        <div class="slider-content">
                            <div class="slider-title-second">
                                <h1><strong>Výpis nemovitostí</strong></h1>                                
                            </div>                             
                        </div>
                    </div>
                </div>
            </section>
            
            
            <section>
                <div class="top-nemovitosti">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-sm filtr-blok"> 
                                <div class="bg-filtr one"></div> 
                                
                                <div class="filtr-single">
                                    <label>Typ inzerátu
                                        <select name="">
                                            <option value="">Pronájem</option>
                                        </select>
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                    <label>Typ nemovitosti
                                        <select name="">
                                            <option value="">Pronájem</option>
                                        </select>
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                    <label>Typ stavby
                                        <select name="">
                                            <option value="">Pronájem</option>
                                        </select>
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                    <label>Cena od
                                        <input type="text">
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                    <label>Cena do
                                        <input type="text">
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm filtr-blok"> 
                                <div class="bg-filtr two"></div> 
                                
                                <div class="filtr-single">
                                    <label>Typ inzerátu
                                        <select name="">
                                            <option value="">Pronájem</option>
                                        </select>
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                    <label>Typ inzerátu
                                        <select name="">
                                            <option value="">Pronájem</option>
                                        </select>
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                    <label>Typ inzerátu
                                        <select name="">
                                            <option value="">Pronájem</option>
                                        </select>
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                    <label>Cena od
                                        <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="50" class="ranger" id="myRange">
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="filtr-single">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>     
            
            <section>
                <div class="top-nemovitosti">
                    <div class="wrapper">
                        <div class="filtr-lista">
                          <div class="row underline">
                              <div class="col-sm-3">  
                                  <div class="section-title-special">
                                      <h3>Výsledky vyhledávání</h3>
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <strong>Řadit dle:</strong>  
                                      <select name="">
                                          <option value="">Nejnovější</option>
                                      </select>
                              </div>
                              <div class="col-sm-6 right">
                                  <strong>Nalezených inzerátů:</strong> 1012    
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
  
                        <div class="section-paging">
                            <a class="btn sub" href="#">Předchozí</a>
                            <ul class="paging">
                                <li>1</li>
                                <li class="active">2</li>
                                <li>3</li>
                                <li>4</li>
                            </ul>
                            <a class="btn sub" href="#">Další</a>
                        </div>
                        
                        <div class="show-on-map">
                            <h3>Použijte k vyhledávání mapu</h3>
                            <div class="btn">Najít na mapě</div>
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
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>        
    </body>
</html>
