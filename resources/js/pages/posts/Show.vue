<template>
    <div>
        <site-cover 
            :title="post.title"
            imgUrl="https://placeimg.com/640/480/any/sepia"
        > 
            <template slot="category">
                <router-link :to="{name: 'category.posts', params:{category: post.category.slug}}">
                    <span class="category text-white mb-3" :style="`background-color: #${post.category.color}`">{{ post.category.name }}</span>
                </router-link>
            </template>

            <template slot="author">
                <div class="align-items-center text-center">
                    <figure class="mb-0 mr-3 d-inline">
                        <img src="https://placeimg.com/640/480/people" alt="Image" width="40px" class="rounded shadow float-left mr-2">
                    </figure>
                    <span class="d-inline-block mt-1">Por {{ post.owner.name }}</span>
                    <span> - {{ post.published_date }}</span>
                </div> 
            </template>
        </site-cover>

        <section class="container p-5">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="post-body">
                        <article v-html="post.body"></article>
                        
                        <!-- IFrame -->
                        <div class="row mb-5 mt-5">
                            <div class="col-md-12 mb-4">
                                <div v-if="post.iframe" class="iframe-wrapper">
                                    <iframe v-html="post.iframe" />
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="pl-4 pt-5 row">
                        <ul class="tags">
                            <li v-for="tag in post.tags" :key="tag.id"><router-link :to="{name: 'tag.posts', params:{tag: tag.slug}}">#{{ tag.name }}</router-link></li>
                        </ul>
                    </div>
                
                    <div class="container pt-5">
                        <h3 class="mb-5">6 Comments</h3>
                        
                        <ul class="comment-list">
                            <li class="comment">
                                <div>
                                    <img src="https://placeimg.com/640/480/people" alt="Image placeholder" width="35px" class="rounded shadow float-left mr-2">
                                </div>

                                <div>
                                    <h3>Jean Doe</h3>
                                    <div>January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <form>
                                        <div class="d-flex align-items-center">
                                            <img class="rounded shadow-sm float-left mr-2" width="35px" src="https://placeimg.com/640/480/people">
                                            <div class="input-group">
                                                <textarea 
                                                    class="form-control border-0 shadow-sm" 
                                                    name="comment" 
                                                    rows="1"
                                                    placeholder="Escribe un comentario"
                                                    required    
                                                />
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary">Responder</button> 
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>               
                            </li>                            
                        </ul>
                        <!-- END comment-list --> 

                        <form>
                            <div class="d-flex p-5">
                                <div>
                                    <img class="rounded shadow-sm" width="65px" src="https://placeimg.com/640/480/people">    
                                </div>   
                                <div class="input-group">
                                    <textarea 
                                        class="form-control border-0 shadow-sm" 
                                        name="comment" 
                                        rows="1"
                                        placeholder="Escribe un comentario"
                                        required    
                                    />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">Responder</button> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                <!-- END main-content -->
                
                <!-- sidebar -->
                <div class="col-md-12 col-lg-4 sidebar">
                    <div>
                        <div class="text-center">
                            <img src="https://placeimg.com/640/480/people" alt="Image Placeholder" width="150px" class="rounded shadow-sm mr-2">
                            
                            <div>
                                <h2>Craig David</h2>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                                <p>
                                    <a href="#" class="p-2"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="p-2"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="p-2"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="p-2"><i class="fa fa-youtube-play"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3>Popular Posts</h3>
                        <div>
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="/img/img_1.jpg" alt="Image placeholder" class="mr-4">
                                        <div>
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div>
                                                <span class="mr-2">March 15, 2018 </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/img/img_2.jpg" alt="Image placeholder" class="mr-4">
                                        <div>
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div>
                                                <span class="mr-2">March 15, 2018 </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/img/img_3.jpg" alt="Image placeholder" class="mr-4">
                                        <div>
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div>
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3>Categorias</h3>
                        <ul>
                            <li><a href="#">Categoria None<span>(21)</span></a></li>
                            <li><a href="#">Sports<span>(3)</span></a></li>
                            <li><a href="#">Ambient<span>(4)</span></a></li>
                        </ul>
                    </div>
                    <div>
                        <h3>Etiquetas</h3>
                        <ul class="tags">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->  
            </div>
        </section>
    </div>
</template>


<script>
    export default {
        props: ['slug'],
        data(){
            return {
                post: {
                    owner:{},
                    category:{},
                    tags:{}
                },
            }
        },
        mounted(){
            axios.get(`/api/posts/${this.slug}`)
            .then(res => {
                this.post = res.data;
            }).catch(err => {
                console.log(err);
            });
        }
    }
</script>

<style lang="scss" scoped>
    
    textarea {
        resize: none;
    }
    
    .sidebar {
        padding-left: 5px;
    }
    
    .post-body {
        font-size: 16px;
    }

    .iframe-wrapper {
        //
    }
    
    .comment-list {
        .comment {
            display: flex;
            align-items: flex-start;
            float: left;
            list-style: none;
        }
    }

    .comment-form {
        display: block;

        form {

        }
    }
</style>