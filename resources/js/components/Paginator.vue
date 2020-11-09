<template>
    <div>
        <component :items="items" :is="componentName"></component>
        <pagination-links :pagination="pagination" />
    </div>
</template>

<script>
    export default {
        props: ['url', 'componentName'],
        data(){
            return {
                pagination: {},
                items: []
            }
        },
        mounted (){
            axios.get(`${this.url}?page=${this.$route.query.page || 1}`)
                .then(res => {
                    console.log(res);
                    this.pagination = res.data;
                    this.items = res.data.data;
                    delete this.pagination.data; // ELimina los datos que posee la paginacion
                })
                .catch(err => {
                    console.log(err);
                });
        },
    }
</script>

<style lang="scss" scoped>
    .pagination{
        a.active{
            background-color: #cacaca;
            color: white;
        }
    }
</style>