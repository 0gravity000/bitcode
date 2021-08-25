
<template>
    <div class="card">
        <div v-for="post in posts" :key="post.id">
        <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <span v-for="tag in post.tags" :key="tag.id">
                    {{ tag.name }}
                </span>
            </h6>
            <p class="card-text">{{ post.code }}</p>
            <a href="#" class="card-link">もっと見る</a>
        </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            posts: {
                required: true
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
