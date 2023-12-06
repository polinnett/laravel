<template>
    <div v-show="this.msg != null" class="alert alert-primary" role="alert">
        Добавлена новая статья <strong><a href="article/this.id">{{this.msg}}</a></strong>
    </div>
</template>
<script>
    export default {
    data() { return { msg: null } },
        created() {
            window.Echo.channel('my-channel').listen('EventNewArticle', (name) => {
                console.log(name.article.title);
                this.msg=name.article.title;
                // alert('Добавлена новая статья!');
            })
        }
    }
</script>
