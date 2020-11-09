<template>
    <div class="row">
        <post-list-item 
            v-for="post in items" 
            :key="post.id" 
            :post="post"
        />     
    </div>
</template>

<script>
    export default {
        props: ['items']
    }

</script>