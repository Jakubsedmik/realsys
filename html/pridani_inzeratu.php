<!DOCTYPE html>

<html>
    <head>
        <title>Szukaj</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:400,700&display=swap&subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="login-style.css" rel="stylesheet" type="text/css"/>
        <link href="FontAwesome/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
        <link href="my-profile-style.css" rel="stylesheet" type="text/css"/>
        <link href="real-estate-icons/font/flaticon.css" rel="stylesheet" type="text/css"/>
        <link href="real-estate-icons/next-ico/font/flaticon.css" rel="stylesheet" type="text/css"/>
        <link href="pridat-inz-style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="body-wrapper add-inz">

            <header>

            </header>
            <section> 

                <div class="add-inz-con">
                    <div class="wrapper">                        

                        <div class="section-title">                           
                            <h2>Hlavní informace</h2>  
                            <h3 class="green-highlight">Do 5 minut</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.</p>
                        </div>   

                        <form> 

                            <div class="row inz-nav tab-inz">
                                <div class="col-sm nav-box tab-inz-btn">
                                    <a class="nav-box-wrap btn tablinks" onclick="openTab(event, 'First')" id="defaultOpen">
                                        <span class="num">1</span><h2>Základní informace</h2>
                                    </a>
                                </div>

                                <div class="col-sm nav-box tab-inz-btn">
                                    <a class="nav-box-wrap btn tablinks" onclick="openTab(event, 'Second')">
                                        <span class="num">2</span><h2>Doplňující informace</h2>
                                    </a>
                                </div>

                                <div class="col-sm nav-box tab-inz-btn">
                                    <a class="nav-box-wrap btn tablinks" onclick="openTab(event, 'Third')">
                                        <span class="num">3</span><h2>Přihlášení</h2>
                                    </a>
                                </div>

                                <div class="col-sm nav-box tab-inz-btn">
                                    <a class="nav-box-wrap btn tablinks" onclick="openTab(event, 'Fourth')">
                                        <span class="num">4</span><h2>Sumarizace</h2>
                                    </a>
                                </div>

                                <div class="col-sm nav-box tab-inz-btn">
                                    <a class="nav-box-wrap btn tablinks" onclick="openTab(event, 'Fifth')">
                                        <span class="num">5</span><h2>Fotografie</h2>
                                    </a>
                                </div>

                            </div>





                            <section id="First" class="inz-form-sec tabcontent inz-sec-1">                                
                                <div class="inz-box">                                    
                                    <h3>Typ inzerátu</h3>

                                    <div class="row selects">                                       

                                        <div class="col-sm-3">
                                            <div class="select-box big w-icon">
                                                <i class="flaticon-149-hand-gesture ico"></i><span class="sel-input-name">Prodej</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="select-box big w-icon">
                                                <i class="flaticon-043-closing ico"></i><span class="sel-input-name">Pronájem</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="select-box big w-icon">
                                                <i class="flaticon-support ico"></i><span class="sel-input-name">Spolubydlení</span>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>  

                                <div class="inz-box">                                    
                                    <h3>Typ Nemovitosti</h3>

                                    <div class="row selects ico-smaller">                                       

                                        <div class="col-sm">
                                            <div class="select-box w-icon">
                                                <i class="flaticon-070-real-estate-4 ico"></i><span class="sel-input-name">Dům</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box w-icon">
                                                <i class="flaticon-021-sit-down ico"></i><span class="sel-input-name">Byt</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box w-icon">
                                                <i class="flaticon-115-picket ico"></i><span class="sel-input-name">Pozemek</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box w-icon">
                                                <i class="flaticon-136-book-bag ico"></i><span class="sel-input-name">Nebytový prostor</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box w-icon">
                                                <i class="flaticon-046-storehouse ico"></i><span class="sel-input-name">Ostatní</span>
                                            </div>
                                        </div>                                        
                                    </div>                                    
                                </div>  



                                <div class="row">
                                    <div class="col-sm bigger-label">
                                        <div class="inz-box align-left">

                                            <div class="form-row">
                                                <label>Místnosti</label>
                                                <input type="text" placeholder="Změnít informaci">
                                            </div>
                                            <div class="form-row">
                                                <label>Adresa</label>
                                                <input type="text" placeholder="Např. Jiráskova 15, Chomutov">
                                            </div>
                                            <div class="form-row">
                                                <label>K dispozici od</label>
                                                <input type="date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm col-spacer">

                                    </div>

                                    <div class="col-sm nazev-popis">
                                        <div class="inz-box align-left">
                                            <h3>Název a popis</h3>

                                            <div class="form-row">
                                                <label>Název</label>
                                                <input type="text" placeholder="Velký moderní dům v Jiráskově">
                                            </div>
                                            <div class="form-row form-message">
                                                <label>Popis</label>
                                                <textarea placeholder="Prodávám tento krásný dům..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <div class="inz-box center-inz-box bigger-label">
                                    <div class="form-row price-input">
                                        <label>Cena nemovitosti</label>
                                        <div class="currency-input"><input type="number" placeholder="100 000"><span class="currency">Kč</span></div>
                                    </div>
                                </div>                                

                                <div class="buttons-prevnext">
                                    <div class="inz-submit">
                                        <a class="btn  buttons-prevnext-a" onclick="openTab(event, 'Second')">Pokračovat</a>
                                    </div>
                                </div>

                            </section>

                            <section id="Second" class="inz-form-sec tabcontent inz-sec-2">   

                                <div class="inz-box">                                    
                                    <h3>Typ stavby</h3>

                                    <div class="row selects">                                       

                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Panel</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Cihla</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Dřevostavba</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Nízkoenergetický</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Ostatní</span>
                                            </div>
                                        </div>                                        
                                    </div>                                    
                                </div>  


                                <div class="inz-box">                                    
                                    <h3>Stav objektu</h3>

                                    <div class="row selects">                                       

                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Novostavba</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Velmi dobrý</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Dobrý</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Špatný</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">K demolici</span>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="select-box">
                                                <span class="sel-input-name">Ve výstavbě</span>
                                            </div>
                                        </div> 
                                    </div>                                    
                                </div>  


                                <div class="row">
                                    <div class="col-sm bigger-label">
                                        <div class="inz-box align-left">

                                            <div class="form-row area-input">
                                                <label>Plocha pozemku</label>
                                                <div class="meters-input"><input type="number" placeholder="100 000"><span class="area">m<sup>2</sup></span></div>
                                            </div>
                                            <div class="form-row area-input">
                                                <label>Plocha objektu</label>
                                                <div class="meters-input"><input type="number" placeholder="100 000"><span class="area">m<sup>2</sup></span></div>
                                            </div>


                                            <div class="form-row checks">
                                                <h3>Vybavení</h3>
                                                <label class="check-wrap"><input type="checkbox" name="vybaveni" value="Patro">Patro</label>
                                                <label class="check-wrap"><input type="checkbox" name="vybaveni" value="Parkovani">Parkování</label>
                                                <label class="check-wrap"><input type="checkbox" name="vybaveni" value="Garaz">Garáž</label>
                                                <label class="check-wrap"><input type="checkbox" name="vybaveni" value="Balkon">Balkon</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm col-spacer">

                                    </div>

                                    <div class="col-sm bigger-label">
                                        <div class="inz-box align-left">

                                            <div class="form-row">
                                                <label>Energetická hodnodta</label>
                                                <select name="">
                                                    <option value="">A</option>
                                                    <option value="">B</option>
                                                    <option value="">C</option>
                                                    <option value="">D</option>
                                                    <option value="">E</option>
                                                    <option value="">F</option>
                                                    <option value="">G - neuvededo</option>                                                    
                                                </select>
                                            </div>
                                            <div class="form-row">
                                                <label>Vlastnictví</label>
                                                <select name="">
                                                    <option value="">Osobní</option>
                                                    <option value="">Družstevní</option>
                                                    <option value="">Státní/obecní</option>                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <div class="buttons-prevnext">
                                    <div class="inz-submit">
                                        <a class="btn buttons-prevnext-a" onclick="openTab(event, 'First')">Zpět</a>
                                    </div>
                                    <div class="inz-submit ">
                                        <a class="btn  buttons-prevnext-a" onclick="openTab(event, 'Third')">Pokračovat</a>
                                    </div>
                                </div>

                            </section>

                            <section id="Third" class="inz-form-sec tabcontent inz-sec-3">   
                            
                            <div class="login-con"> 
                                    <div class="wrapper">
                                        <div class="login-tabs">
                                            <div class="tab-header">
                                                <a href="#" class="login active"><img src="img/header/prihlaseni.png" alt=""/>Přihlášení</a>                            
                                                <a href="#" class="signup"><img src="img/header/registrace.png" alt=""/>Registrace</a>
                                            </div> 

                                            <div class="tab-content " id="signup-tab">

                                                <div class="row">
                                                    <div class="col-sm"> 
                                                        
                                                            <div class="form-cols">
                                                                <div class="form-col">
                                                                    <label>Jméno</label>
                                                                    <input type="text" placeholder="Karel">
                                                                </div>
                                                                <div class="form-col">
                                                                    <label>Příjmení</label>
                                                                    <input type="text" placeholder="Karel">
                                                                </div>
                                                                <div class="form-col">
                                                                    <label>Telefon</label>
                                                                    <input type="tel" placeholder="+420 777 888 999">
                                                                </div>
                                                                <div class="form-col">
                                                                    <label>Email</label>
                                                                    <input type="email" placeholder="novak@email.cz">
                                                                </div>
                                                            </div>
                                                            <div class="jakyUziv radios">
                                                                <h3>Jste:</h3>
                                                                <label class="radio-wrap"><input type="radio" name="uzivatel" value="Uzivatel" checked> Uživatel</label>
                                                                <label class="radio-wrap"><input type="radio" name="uzivatel" value="Pravnicka osoba"> Právnicka osoba</label>
                                                            </div>

                                                            <div class="form-cols">
                                                                <div class="form-col">
                                                                    <label>Heslo</label>
                                                                    <input type="password" placeholder="********">
                                                                </div>
                                                                <div class="form-col">
                                                                    <label>Zopakovat heslo</label>
                                                                    <input type="password" placeholder="********">
                                                                </div>
                                                            </div>

                                                            <div class="form-btns">
                                                                <input type="submit" class="btn submit-btn" value="ZALOŽIT ÚČET">
                                                                <a href="#" class="lost-pass underline-link">POTŘEBUJETE PORADIT?</a>
                                                            </div>
                                                        
                                                    </div>  

                                                    <div class="col-sm registration-info"> 
                                                        <h3>Informace k založení účtu</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel. Aliquam sollicitudin, purus et maximus fermentum, mauris ligula tristique mi, quis accumsan mauris velit ac nunc. Nulla porta enim ligula, quis viverra sapien sagittis id. Fusce malesuada viverra ullamcorper. Cras non orci condimentum, lobortis sapien vel, porta eros. Mauris eleifend cursus lacus, eu lobortis elit laoreet sed. Pellentesque lobortis nunc dictum, pulvinar augue in, pellentesque lectus.</p>
                                                    </div>

                                                </div>
                                            </div>           
                                            <div class="tab-content hidden" id="login-tab">

                                                <div class="row">
                                                    <div class="col-sm"> 
                                                        
                                                            <div class="form-cols">
                                                                <div class="form-col">
                                                                    <label>Přihlašovací jméno</label>
                                                                    <input type="text" placeholder="Karel">
                                                                </div>
                                                            </div>                                            
                                                            <div class="form-cols">
                                                                <div class="form-col">
                                                                    <label>Heslo</label>
                                                                    <input type="password" placeholder="********">
                                                                </div>
                                                            </div>

                                                            <div class="stay-logged">
                                                                <input type="checkbox" id="logged" name="login" checked> Zůstat přihlášen
                                                            </div>

                                                            <div class="form-btns">
                                                                <input type="submit" class="btn submit-btn" value="ZALOŽIT ÚČET">
                                                                <a href="#" class="lost-pass underline-link">ZAPOMENUTÉ HESLO?</a>
                                                            </div>
                                                        
                                                    </div>  

                                                    <div class="col-sm login-info"> 
                                                        <img src="img/slider/okno.png" alt=""/>
                                                        <h3>Vítejte</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.</p>

                                                    </div>

                                                </div>
                                            </div>     
                                        </div>
                                    </div>
                                </div>


                                <div class="inz-box ">        

                                    <div class="this-user-wrapper">                                    
                                        <div class="row top-info">
                                            <div class="col-sm-4">                              
                                                <div class="profile-img" style="background-image: url(img/profile/pic.jpg)">

                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="basic-info">
                                                    <h1 class="profile-name">Karel Novák</h1>
                                                    <div class="info-row">
                                                        <i class="fas fa-phone-alt"></i> <span class="phone">+420 777 888 999</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <i class="fas fa-envelope"></i> <span class="email">novak@email.cz</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <i class="fas fa-bullhorn"></i> <span class="inzeraty"><strong>38</strong> Aktivních inzerátů</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> 

                                    </div>    

                                    <a href="#" class="underline-link">NEJSTE TO VY?</a>
                                </div>     
                                
                                <div class="buttons-prevnext">
                                    <div class="inz-submit">
                                        <a class="btn buttons-prevnext-a" onclick="openTab(event, 'Third')">Zpět</a>
                                    </div>
                                    <div class="inz-submit">
                                        <a class="btn buttons-prevnext-a" onclick="openTab(event, 'Fifth')">Pokračovat</a>
                                    </div>
                                </div>
                            
                            </section>    

                            <section id="Fourth" class="inz-form-sec tabcontent inz-sec-4">   
                               
                               <div class="inz-box align-left inz-show">
                                    
                                    <h2>Náhled přidaného inzerátu</h2>

                                    <div class="row">
                                        <div class="col-sm-4 nemovitost">                                              

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
                                        
                                        <div class="col-sm col-spacer"></div>  

                                        <div class="col-sm">
                                            
                                            <div class="topovani-wrap">
                                                <h3>Chcete aby váš příspěvek měl větší pozornost?</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu sem et elit fringilla auctor sed nec nunc. In urna tellus, malesuada mattis iaculis nec, hendrerit euismod felis. Phasellus vitae lectus velit. Ut feugiat, turpis nec laoreet aliquet, enim nisi mollis urna, in efficitur turpis orci quis odio.</p>

                                                <div class="nemovitost-topovani">
                                                    <h4>Vyzkoušejte topování</h4>
                                                    <a class="btn ico-btn" href="#"><i class="fas fa-star"></i>Topovat</a>
                                                    <a href="#" class="simple-link">Jak to funguje?</a>  
                                                </div>
                                            </div>
                                            
                                        </div>                                      

                                    </div>
                                </div>
                                
                                <div class="buttons-prevnext">
                                    <div class="inz-submit">
                                        <a class="btn buttons-prevnext-a" onclick="openTab(event, 'Second')">Zpět</a>
                                    </div>
                                    <div class="inz-submit">
                                        <a class="btn buttons-prevnext-a" onclick="openTab(event, 'Fourth')">Pokračovat</a>
                                    </div>
                                </div>                       
                                                       
                            </section>    

                            <section id="Fifth" class="inz-form-sec tabcontent inz-sec-5">   

                                <div class="inz-box">                                    
                                    <h2>Fotografie</h2>

                                    <div class="row image-drop-wrap">    
                                        <div class="col-sm image-drop">
                                            <i class="flaticon-photo ico"></i>
                                            <p>Sem přetáhněte fotky</p>
                                        </div>
                                    </div>

                                    <a class="btn" href="#">Přidat fotky</a>                                   

                                </div> 


                                <div class="inz-box">                                    
                                    <h3>Vyberte náhledový obrázek</h3>

                                    <div class="row image-feed">                         
                                        <div class="col-sm-3 image-choose">
                                            <div class="image-choose-inside" style="background-image: url(img/nemovitosti/nem.jpeg)"></div>
                                        </div>
                                        <div class="col-sm-3 image-choose">
                                            <div class="image-choose-inside" style="background-image: url(img/nemovitosti/nem.jpeg)"></div>
                                        </div>
                                        <div class="col-sm-3 image-choose">
                                            <div class="image-choose-inside" style="background-image: url(img/nemovitosti/nem.jpeg)"></div>
                                        </div>
                                        <div class="col-sm-3 image-choose">
                                            <div class="image-choose-inside" style="background-image: url(img/nemovitosti/nem.jpeg)"></div>
                                        </div>
                                        <div class="col-sm-3 image-choose">
                                            <div class="image-choose-inside" style="background-image: url(img/nemovitosti/nem.jpeg)"></div>
                                        </div>
                                        <div class="col-sm-3 image-choose">
                                            <div class="image-choose-inside" style="background-image: url(img/nemovitosti/nem.jpeg)"></div>
                                        </div>
                                        <div class="col-sm-3 image-choose">
                                            <div class="image-choose-inside" style="background-image: url(img/nemovitosti/nem.jpeg)"></div>
                                        </div>
                                    </div>                                    
                                </div>    


                               <div class="buttons-prevnext">
                                    <div class="inz-submit">
                                        <a class="btn buttons-prevnext-a" onclick="openTab(event, 'Fourth')">Zpět</a>
                                    </div>
                                    <div class="inz-submit">
                                        <submit class="btn nav-box-wrap">Dokončit</submit>
                                    </div>
                                </div>
                            </section> 
                            
                        </form>

                    </div>
                </div>
            </section>  


            <footer>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-sm">  
                            <div class="form-row radios">
                                <label>Vybavení</label>
                                <div class="radio-wrap"><input type="radio" name="vybaveni" value="Patro"> Patro</div>
                                <div class="radio-wrap"><input type="radio" name="vybaveni" value="Patro"> Patro</div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
                    
        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
   
    </body>
</html>
