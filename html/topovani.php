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
        <link href="kredity-topovani.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    
    <body>
        <div class="body-wrapper">
            <header>
            
            </header>
            
            <section>
                <div class="topovani-con">
                    <div class="wrapper">
                        <div class="section-title">
                            <h1 class="title">Hlídací pes</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.</p>
                        </div>
                        <form class="what-guard">
                            <h3>
                                Vyber co máme pohlídat
                            </h3>
                            <div class="row">
                                <div class="filtr-image">
                                        <img src="ikony/homes.png">
                                </div>
                                <div class="col-sm filtr-blok"> 
                                    <div class="filtr-single">
                                        <label class="label">Typ inzerátu
                                            <select name="">
                                                <option value="">Pronájem</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="filtr-single">
                                        <label class="label">Typ nemovitosti
                                            <select name="">
                                                <option value="">Rodinné domy</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="filtr-single">
                                        <label class="label">Typ stavby
                                            <select name="">
                                                <option value="">1 + KK</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="filtr-single">
                                        <label class="label2">Cena od
                                            <input type="text" value="20 000 Kč">
                                        </label>
                                    </div>

                                    <div class="filtr-single">
                                        <label class="label2">Cena do
                                            <input type="text" value="80 000 Kč">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="filtr-image">
                                        <img src="ikony/homeplace.png">
                                    </div>
                                <div class="col-sm filtr-blok">  
                                    <div class="filtr-single">
                                        <label class="label">Kraj
                                            <select name="">
                                                <option value="">Středočeský</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="filtr-single">
                                        <label class="label">Město
                                            <select name="">
                                                <option value="">Praha</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="filtr-single">
                                        <label class="label">Část
                                            <select name="">
                                                <option value="">Žižkov</option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="filtr-single">
                                        <label>Vzdálenost
                                                <div class="slidecontainer">
                                                    <input type="range" id="rangeInput" name="rangeInput" class="ranger" min="2" max="100" value="70" oninput="amount.value=rangeInput.value">                               <output name="amount" id="amount" for="rangeInput">70</output>
                                                </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row moreInfo-separator">
                                <div class="col-sm-2">                                
                                        <h3> Další informace</h3>                              
                                </div>
                                <div class="col-sm">
                                    <div class="separator"> 
                                        <div class="collapse-icon"><i class="fas fa-sort-down"></i></div> 

                                    </div>
                                </div>
                            </div>
                            <div class="showhide">
                                <div class="row">
                                    <div class="filtr-image">
                                            <img src="ikony/homes.png">
                                    </div>
                                    <div class="col-sm filtr-blok"> 
                                        <div class="filtr-single">
                                            <label class="container label2">Patro
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="filtr-single">
                                            <label class="container label2">Parkování
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="filtr-single">
                                            <label class="container label2">Garáž
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="filtr-single">
                                            <label class="container label2">Balkon
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="filtr-single">
                                            <label class="label2">V popisu je také
                                                <input type="text" value="Bazén">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="filtr-image">
                                            <img src="ikony/homes.png">
                                    </div>
                                    <div class="col-sm filtr-blok"> 
                                         <div class="filtr-single">
                                            <label class="label2">Pozemek od
                                                <input type="text" value="150">
                                            </label>
                                        </div>

                                         <div class="filtr-single">
                                            <label class="label2">Pozemek do
                                                <input type="text" value="300">
                                            </label>
                                        </div>

                                         <div class="filtr-single">
                                            <label class="label2">plocha od
                                                <input type="text" value="78">
                                            </label>
                                        </div>

                                        <div class="filtr-single">
                                            <label class="label2">plocha do
                                                <input type="text" value="130">
                                            </label>
                                        </div>

                                        <div class="filtr-single">
                                            <label>Stav objektu
                                                    <div class="slidecontainer">
                                                        <input type="range" id="statusInput" name="statusInput" class="ranger" min="1" max="10" value="7" oninput="status.value=statusInput.value">                               <output name="status" id="status" for="statusInput">7</output>
                                                    </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </form>
                        
                        <div class="options-box">
                            <form>
                                <div class="section-title">
                                    <h2>Možnosti</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.</p>
                                </div>
                                <div class="filtr-single">
                                    <label>Vyber délku hlídání
                                        <select name="">
                                            <option value="">Týden</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="flex-double">
                                    <div class="col-md-6 first-column">
                                        <img src="ikony/pes.png" class="first-img">
                                        <h3>Hlídač zadarmo</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.</p>
                                        <div class="checklist">
                                            <img src="ikony/pes.png">
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                        <div class="section-btn">
                                            <input type="submit" name="choose-guard" class="btn" value="vybrat">
                                        </div>
                                    </div>
                                    <div class="col-md-6 last-column">
                                        <img src="ikony/pes-white.png" class="first-img">
                                        <h3>Placený hlídač</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.</p>
                                        <div class="checklist">
                                            <img src="ikony/pes.png">
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                        <div class="checklist">
                                            <img src="ikony/pes.png">
                                            <p>Lorem ipsum dolor</p>
                                        </div>
                                        <div class="checklist">
                                            <img src="ikony/pes.png">
                                            <p>Lorem ipsum dolor amet</p>
                                        </div>
                                        <h3 class="price-title">Od 346 Kč</h3>
                                        <div class="section-btn">
                                            <input type="submit" name="choose-guard" class="btn" value="vybrat">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            
            <footer>
                
            </footer>
            <script>
                $(document).ready(function(){
                    var par = $(".showhide");
                    $(par).hide();
                    $(".fa-sort-down").click(function(){
                      $(par).toggle();
                    });
                });   
            </script>
        </div>
    </body>
</html>