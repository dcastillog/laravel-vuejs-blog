<template>
    <div class="site-cover" :style="`background: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url(${imgUrl});`">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="d-flex flex-column align-items-center">
                        <div class="p-5"><slot name="category"/></div>
                        
                        <h1 class="p-5 text-white site-cover-title">{{ title }}</h1>
                        
                        <p class="p-4 text-white">{{ description }}</p>
                        
                        <div class="p-5 text-white site-cover-author"><slot name="author"/></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: String,
            description: String,
            imgUrl: String,
        }
    }
</script>

<style lang="scss" scoped>
    .site-cover {
        background: rgba(0,0,0,0.5);

        .site-cover-title {
            font-size: 40px;
        }

        .site-cover-author {
            font-size: 15px;
        }
    }
</style>