<template>
<div class="clockItem mint-cell">
    <div style="display:flex;justify-content:flex-start;font-size:24px;">
        <span>09:00</span>
        <span>|</span>
        <div class="clockDetail">
            <span style="font-size:12px;">哈哈哈哈哈哈</span>
            <span style="font-size:12px;">嘿嘿嘿</span>
        </div>
    </div>
    <mt-switch v-model="value" @change="handleChange"></mt-switch>
</div>
</template>

<script>
import Switch from 'mint-ui'
export default {
    data(){
        return{
            value:true
        }
    },
    components:{
        Switch
    },
    methods:{
        handleChange(event){
            console.log();
        }
    }
}
</script>

<style scoped>
span{
    margin: 2px;
}
.clockItem{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 2px 10px;
}
.clockDetail{
    display: flex;
    flex-direction: column;
    /* font-size: .3rem; */
}
</style>

