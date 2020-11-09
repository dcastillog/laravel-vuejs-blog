<template>
    <container>
        <div class="row mb-5">
            <div class="col-12">
                <h2>Publicaciones de {{ slug }}</h2>
            </div>
        </div>
        <paginator 
            :url="`/api/categories/${this.slug}`"
            component-name="posts-list"
        /> 
    </container>  
</template>

<script>
    export default {
        props: ['slug'],
    }
</script>