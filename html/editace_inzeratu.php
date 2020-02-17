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
        <link href="edit-inz-style.css" rel="stylesheet" type="text/css"/>
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
                            <h2>Editace informací</h2>  
                        </div>   

                        <form> 
                            <section id="First" class="inz-form-sec inz-sec-1">                                
                                <div class="inz-box">                                    
                                    <h3>Typ inzerátu</h3>

                                    <div class="row selects">                                       

                                        <div class="col-sm-3">
                                            <label>
                                                <input type="radio" name="type-inz" value="prodej" checked>
                                                <div class="type-inz-div">
                                                    <div class="type-inz">
                                                       <i class="flaticon-149-hand-gesture ico"></i><span class="sel-input-name">Prodej</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>
                                                <input type="radio" name="type-inz" value="pronajem">
                                                <div class="type-inz-div">
                                                    <div class="type-inz">
                                                        <i class="flaticon-043-closing ico"></i><span class="sel-input-name">Pronájem</span> 
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>
                                                <input type="radio" name="type-inz" value="spolubydleni">
                                                <div class="type-inz-div">
                                                    <div class="type-inz">
                                                        <i class="flaticon-support ico"></i><span class="sel-input-name">Spolubydlení</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>                                    
                                </div>  

                                <div class="inz-box">                                    
                                    <h3>Typ Nemovitosti</h3>

                                    <div class="row selects ico-smaller">                                       

                                        <div class="col-sm">
                                            <label>
                                                <input type="radio" name="type-nem" value="dum" checked>
                                                <div class="type-nem-div">
                                                    <div class="type-nem">
                                                       <i class="flaticon-070-real-estate-4 ico"></i><span class="sel-input-name">Dům</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-sm">
                                            <label>
                                                <input type="radio" name="type-nem" value="byt">
                                                <div class="type-nem-div">
                                                    <div class="type-nem">
                                                       <i class="flaticon-021-sit-down ico"></i><span class="sel-input-name">Byt</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-sm">
                                            <label>
                                                <input type="radio" name="type-nem" value="pozemek">
                                                <div class="type-nem-div">
                                                    <div class="type-nem">
                                                       <i class="flaticon-115-picket ico"></i><span class="sel-input-name">Pozemek</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-sm">
                                            <label>
                                                <input type="radio" name="type-nem" value="neb-prostor">
                                                <div class="type-nem-div">
                                                    <div class="type-nem">
                                                       <i class="flaticon-136-book-bag ico"></i><span class="sel-input-name">Nebytový prostor</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-sm">
                                            <label>
                                                <input type="radio" name="type-nem" value="ostatni">
                                                <div class="type-nem-div">
                                                    <div class="type-nem">
                                                       <i class="flaticon-046-storehouse ico"></i><span class="sel-input-name">Ostatni</span>
                                                    </div>
                                                </div>
                                            </label>
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
                                        <div class="currency-input"><input type="number" placeholder="100 000" step="1000"><span class="currency">Kč</span></div>
                                    </div>
                                </div>                                

                                <div class="col-sm-3 btn-input">
                                    <div class="inz-submit">
                                        <input type="submit" name="submit" value="Upravit" class="btn">
                                    </div>
                                </div>

                            </section>    
                        </form>

                    </div>
                </div>
            </section>  


            <footer>
            
            </footer>
        </div>
    </body>
</html>
