<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link class="navbar-brand" :to="{name: 'home'}">LaraBlog</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-5"> 
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'about'}">Nosotros</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'contact'}">Contacto</router-link>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarCategoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarCategoriesDropdown">
                        <a class="dropdown-item" href="#">Categoria1</a>
                        <a class="dropdown-item" href="#">Categoria2</a>
                    </div>
                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <div v-if="isAuthenticated">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>{{ currentUser.name }}</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarUserDropdown">
                            <a class="dropdown-item" href="#">Ver perfil</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Cerrar sesión</a>
                        </div>
                    </div>
                    <div v-else>
                        <a class="nav-link" href="#">
                            <span>Iniciar sesión</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>

    export default {

    }
</script>