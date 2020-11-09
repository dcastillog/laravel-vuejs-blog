<template>
    <article class="col-md-6 mt-3">
        <div class="card p-2">
            <div class="card-img">
                <img src="https://placeimg.com/380/230/nature" alt="">

                <router-link :to="{name: 'category.posts', params: {slug: post.category.slug}}">
                    <span class="category text-white" :style="`background-color: #${post.category.color}`">
                        <h4>{{ post.category.name }}</h4>
                    </span>
                </router-link>
            </div>

            <div class="card-body">
                <div class="author align-items-center text-left">
                    <img class="rounded shadow-sm float-left mr-2" width="40px" src="https://placeimg.com/640/480/people" alt="">
                    <span class="d-inline-block">
                        Por <a href="">{{ post.owner.name }}</a>
                    </span>
                    <span>{{ post.published_date }}</span>
                </div>
                
                <h3 class="card-title post-title pt-2"><a href="#" v-text="post.title"></a></h3>
                
                <p v-text="post.excerpt"></p>
                                
                <div>
                    <ul class="tags d-flex justify-content-start" >
                        <li v-for="tag in post.tags" :key="tag.id">
                            <router-link :to="{name: 'tag.posts', params: {slug: tag.slug}}" v-text="`#${tag.name}`" />
                        </li>
                    </ul>
                </div>

                <p class="mt-1"><router-link :to="{name: 'posts.show', params: {slug: post.slug}}">Leer más</router-link></p>
            </div>
        </div>
    </article>
</template>

<script>
    export default {
        props: ['post']
    }

</script>

<style lang="scss" scoped>
    .card {
        border-radius: 10px;
    }
    .card-img {
        img {
            height: inherit;
            width: inherit;
        }

        .category {
            display: inline;
            position: absolute;
            top: 2%;
            left: 78%;
        }
    }     
</style>