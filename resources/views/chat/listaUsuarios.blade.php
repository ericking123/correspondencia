<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <style>
            /* Area de Usuario CSS */
            .users{
                padding: 25px 30px;
            }

            .users header,
            .users-list a{
                display: flex;
                align-items: center;
                padding-bottom: 20px;
                justify-content: space-between;
                border-bottom: 1px solid #e6e6e6;
            }

            .wrapper img{
                object-fit: cover;
                border-radius: 50%;
            }

            :is(.users, .users-list) .content{
                display: flex;
                align-items: center;
            }

            .users header .content img{
                height: 50px;
                width: 50px;
            }

            :is(.users, .users-list) .details{
                color: #000;
                margin-left: 15px;
            }

            :is(.users, .users-list) .details span{
                font-size: 18px;
                font-weight: 500;
            }

            .users header .logout{
                color: #fff;
                font-size: 17px;
                padding: 7px 15px;
                background: #333;
                border-radius: 5px;
            }

            .users .search{
                margin: 20px 0;
                display: flex;
                position: relative;
                align-items: center;
                justify-content: space-between;
            }

            .users .search .text{
                font-size: 18px;
            }

            .users .search input{
                position: absolute;
                height: 42px;
                width: calc(100% - 12%);
                border: 1px solid #ccc;
                padding: 0 13px;
                font-size: 16px;
                border-radius: 5px 0 0 5px;
                outline: none;
                opacity: 0;
                pointer-events: none;
                transition: all 0.2s ease;
            }

            .users .search input.active{
                opacity: 1;
                pointer-events: auto;
            }

            .users .search button{
                width: 47px;
                height: 42px;
                border: none;
                outline: none;
                color: #fff;
                background: #333;
                cursor: pointer;
                font-size: 17px;
                border-radius: 0 5px 5px 0;
                transition: all 0.2s ease;
            }

            .users .search button.active{
                color: #fff;
                background: #333;
            }

            .users .search button.active i::before{
                content: "\f00d";
            }

            .users-list{
                max-height: 350px;
                overflow-y: auto;
            }

            :is(.users-list, .chat-box)::-webkit-scrollbar{
                width: 0px;
            }

            .users-list a{
                padding-right: 15px;
                page-break-after: 10px;
                padding-right: 15px;
                border-bottom-color: #f1f1f1;
            }

            .users-list a:last-child{
                border: none;
                margin-bottom: 0px;
            }

            .users-list a .content img{
                height: 40px;
                width: 40px;
            }

            .users-list a .content p{
                color: #67676a;
            }

            .users-list a .status-dot{
                font-size: 12px;
                color: #468669;
            }

            /* Estados (en linea / fuera de linea) */
            .users-list a .status-dot.offline{
                color: #ccc;
            }

            /* Estilos para el Area del CHAT */
            .chat-area header{
                display: flex;
                align-items: center;
                padding: 18px 30px;
            }

            .chat-area header .back-icon{
                font-size: 18px;
                color: #333;
            }

            .chat-area header img{
                height: 45px;
                width: 45px;
                margin: 0 15px;
            }

            .chat-area header span{
                font-size: 17px;
                font-weight: 500;
            }

            .chat-box{
                height: 500px;
                overflow-y: auto;
                background: #f7f7f7;
                padding: 10px 30px 20px 30px;
                box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                            inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
            }

            .chat-box .chat{
                margin: 15px 0;
            }

            .chat-box .chat p{
                word-wrap: break-word;
                padding: 8px 16px;
                box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                            0 16px 16px -16px rgb(0 0 0 / 10%);
            }

            .chat-box .outgoing{
                display: flex;
            }

            .outgoing .details{
                margin-left: auto;
                max-width: calc(100% - 130px);
            }

            .outgoing .details p{
                background: #333;
                color: #fff;
                border-radius: 18px 18px 0 18px;
            }

            .chat-box .incoming{
                display: flex;
                align-items: flex-end; 
            }

            .chat-box .incoming img{
                height: 35px;
                width: 35px;
            }

            .incoming .details{
                margin-left: 10px;
                margin-right: auto;
                max-width: calc(100% - 130px);
            }

            .incoming .details p{
                color: #333;
                background: #fff;
                border-radius: 18px 18px 18px 0;
            }

            .chat-area .typing-area{
                padding: 18px 30px;
                display: flex;
                justify-content: space-between;
            }

            .typing-area input{
                height: 45px;
                width: calc(100% - 58px);
                font-size: 17px;
                border: 1px solid #ccc;
                padding: 0 13px;
                border-radius: 5px 0 0 5px;
                outline: none;
            }

            .typing-area button{
                width: 55px;
                border: none;
                outline: none;
                background: #333;
                color: #fff;
                font-size: 19px;
                cursor: pointer;
                border-radius: 0 5px 5px 0;
            }
        </style>
        
    </head>
    <body>

            <div class="wrapper">
                    <section class="users">
                        <header>
        
                            <?php 
                                /*include_once 'php/config.php';
                                $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE unique_id = '{$_SESSION['unique_id']}' ");
                                
                                if(mysqli_num_rows($sql) > 0){
                                    $row = $sql->fetch_assoc();
        
                                }*/
                            ?>
        
                            <div class="content">
                                <img src="{{ asset('storage/imagenes_de_perfiles/funcionario_2.jpg') }}" alt="">
                                <div class="details">
                                    <span> <?php //echo $row['nombre'] . "  " . $row['apellido'] ?> Rossmery Chura Flores </span>
                                    <p> <?php //echo $row['estado'] ?>  Activo </p>
                                </div>
                            </div>

                        </header>
                        
                        <div class="search">
                            <span class="text"> Selecciona un CHAT </span>
                            <input type="input" placeholder="Buscar Usuario">
                            <button><i class="fas fa-search"></i></button>
                        </div>
        
                        <div class="users-list">
                            
                        </div>
                    </section>
                </div>

        <script>

            const searchBar = document.querySelector(".users .search input"),
            searchBtn = document.querySelector(".users .search button"),
            listaUsuarios = document.querySelector(".users .users-list");

            searchBtn.onclick = ()=>{
                searchBar.classList.toggle("active");
                searchBar.focus();
                //searchBar.classList.toggle("active");
                searchBar.value = "";
            }

            searchBar.onkeyup = ()=>{
                let searchTerm = searchBar.value;
                if(searchTerm != ""){
                    searchBar.classList.add("active");
                }else{
                    searchBar.classList.remove("active");
                }
                // vamos a empezar con el AJAX
                let xhr = new XMLHttpRequest(); //creando el objeto XML
                xhr.open("POST", "php/search.php", true);
                xhr.onload = ()=>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            listaUsuarios.innerHTML = data;
                            //console.log(data);
                        }
                    }
                }
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("searchTerm=" + searchTerm);
            }

            setInterval( ()=>{
                // vamos a empezar con el AJAX
                let xhr = new XMLHttpRequest(); //creando el objeto XML
                //xhr.open("GET", "php/usuarios.php",  true);  // REVISAR
                xhr.onload = ()=>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            //console.log(data);
                            if(!searchBar.classList.contains("active")){ // si la barra de busqueda no esta activada entonces añadimos esta infomacion 
                                listaUsuarios.innerHTML = data;
                            }
                        }
                    }
                }
                //xhr.send();  // REVISAR
            }, 500 ); //esta funcion correra frecuentemente despues de 500ms (mili-segundos)
        
        </script>


    </body>
</html>






