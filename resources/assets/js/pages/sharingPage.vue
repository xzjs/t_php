<template>
<div>
    <ul>
        <li>
            <span class="avatar">
                <img src="/images/avatar.jpg" alt="头像">
            </span>
            <span>李叔叔</span>
            <input type="button" value="删除">
        </li>
        <li>
            <span class="avatar">
                <img src="/images/avatar.jpg" alt="头像">
            </span>
            <span>李叔叔</span>
            <input type="button" value="删除">
        </li>
    </ul>
</div>
</template>

<script>
export default {
  data(){
      return {

      }
  }
}
</script>

<style scoped>
ul{
    position: absolute;
    top: 51px;
    width: 100%;
    list-style-type: none;
}
ul li{
    margin: 0;
    padding: 0;
}
.avatar{
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 20px;
}
li{
    display: flex;
    height: 60px;
    justify-content: space-around;
    align-items: center;
    border-bottom: 1px solid rgba(222, 216, 216, 0.24);
}
img{
    width: 100%;
    height: auto;
    border-radius: 50%;
}
</style>
