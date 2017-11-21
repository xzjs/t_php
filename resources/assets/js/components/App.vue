<template>
    <div>
        <router-view>
        </router-view>
        <Tabbar v-model="select">
            <TabItems id='tab1' href="#/">显示设置</TabItems>
            <TabItems id='tab2' href="#/clockPage">闹钟设置</TabItems>
            <TabItems id='tab3' href="#/timePage">时间设置</TabItems>
            <TabItems id='tab5' href="#/sharingPage">分享管理</TabItems>
        </Tabbar>
    </div>
</template>

<script>
import TabItems from "./TabItems"
import Tabbar from "./Tabbar"

export default {
    name: 'hello',
    data() {
        return {
            msg: 'Welcome to Your Vue.js App',
            select:'tab1'
        }
    },
    components:{
        TabItems,
        Tabbar
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
a{
  text-decoration: none;
  font-size: 10px;
  color: #949494;
}

ul{
    margin: 0;
    padding: 0;
    /* -webkit-padding-start:0; */
}
</style>
