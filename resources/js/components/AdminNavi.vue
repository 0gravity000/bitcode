<template>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a id="navbarDropdown-sub" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                管理者メニュー
            </a>
            
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown-sub">
                <a class="dropdown-item" href="/language">
                    言語の一覧を表示
                </a>
            </div>
        </li>
    </ul>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
