<template>
    <div class="row text-center pt-5 border-top" v-if="pagination.last_page > 1">
        <div class="col-md-12">
            <ul class="pagination custom-pagination">
                <li v-for="page in pagination.last_page" :key="page.id">
                    <router-link :class="getActiveClass(page)" :to="{
                        name: $route.name,
                        query: {
                            page: page
                        }
                    }"
                    >{{ page }}</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['pagination'],
        methods: {
            getActiveClass(){
                return [
                    ! this.$route.query.page && page == 1 ? 'active' : ''
                ];
            }
        }
    }
</script>