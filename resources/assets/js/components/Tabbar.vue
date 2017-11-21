<template>
    <div class="m-tabbar">
       <slot></slot>
    </div>
</template>

<script>
import TabItems from "./TabItems"

export default {
    props:['value']
}
</script>


<style>
.m-tabbar{
    display: flex;
    flex-direction: row;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    overflow: hidden;
    height: 50px;
    background: #fff;
    border-bottom: 1px solid #e4e4e4;
}
</style>