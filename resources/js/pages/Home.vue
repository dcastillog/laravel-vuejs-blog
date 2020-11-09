<template>
    <container>
        <div class="row mb-5">
            <div class="col-12">
                <h2>Publicaciones</h2>
            </div>
        </div>
            
        <paginator 
            url="/api/posts"
            component-name="posts-list"
        /> 
    </container>
</template>


