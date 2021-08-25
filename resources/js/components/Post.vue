
<template>
    <div class="card">
        <div v-for="post in posts" :key="post.id">
        <div class="card-body">
            <h5 class="card-title">{{ encode_htmlEntities(post.title) }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <span v-for="tag in post.tags" :key="tag.id">
                    {{ tag.name }}
                </span>
            </h6>
            <p class="card-text">
                    {{ encode_htmlEntities(post.code) }}
            </p>
            <a href="#" class="card-link">もっと見る</a>
            <p class="card-text">{{ post.user.name }} ｜ updated at {{ formatDate(post.updated_at) }}</p>
        </div>
        </div>
    </div>

</template>

<script>
    import moment from "moment"

    export default {
        props: {
            posts: {
                required: true
            }
        },
        data: function() {
            return{
            }
        },        
        methods: {
            formatDate: function (date) {
                return moment(date).format("YYYY/MM/DD hh:mm:ss")
            },
            //phpのhtml_entity_decode() もどきの処理
            //エンコードされたCharacter references (文字参照) HTMLエンティティをデコードする
            encode_htmlEntities: function (text) {
                var entities = [
                    ['amp', '&'],
                    ['apos', '\''],
                    ['#039', '\''],
                    ['lt', '<'],
                    ['gt', '>'],
                    ['#032', ' '],
                ];
                for (var i=0, max=entities.length; i<max; i++) {
                    text = text.replace('&quot;', '"').replace(new RegExp('&'+entities[i][0]+';', 'g'), entities[i][1]);
                }
                return text;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
