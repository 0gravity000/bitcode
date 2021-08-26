
<template>
    <div class="py-3">
            <h2>
                {{ encode_htmlEntities(post.title) }}
            </h2>
            <h6 class="my-3">
                <span v-for="tag in post.tags" :key="tag.id">
                    <button type="button" class="btn btn-outline-success mr-2">
                    {{ tag.name }}
                    </button>
                </span>
            </h6>
            <p>
                <highlightjs lang="html" :code="encode_htmlEntities(post.code)">
                </highlightjs>
            </p>
            <h3>備考</h3>
            <p>
                {{ post.note1 }}
            </p>
            <p>
                {{ post.note2 }}
            </p>
            <p>
                {{ post.note3 }}
            </p>

            <p class="card-text">{{ post.user.name }} ｜ updated at {{ formatDate(post.updated_at) }}</p>
            <button v-if="authuserid === post.user.id" class="btn btn-primary" type="button"
             data-toggle="modal" data-target="#exampleModal">
                編集
            </button>  
            <button v-if="authuserid === post.user.id" class="btn btn-primary" type="button"
             data-toggle="modal" data-target="#exampleModal" @click="store_post(post)">
                削除
            </button>  

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                この投稿を削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                <button type="button" class="btn btn-primary" @click="post_destroy">はい</button>
            </div>
            </div>
        </div>
        </div>
    </div>

</template>

<script>
    import moment from "moment"

    export default {
        props: {
            post: {
                required: true
            },
            authuserid: {
                type: Number,
                required: true
            }
        },
        data: function() {
            return{
                post: '',
                post_title: '',
            }
        },        
        methods: {
            store_post: function(post) {
                this.post = post;
            },
            post_destroy: function() {
                this.post_title = this.encode_htmlEntities(this.post.title);
                location.href= "/post/destroy/"+this.post_title;
            },
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
