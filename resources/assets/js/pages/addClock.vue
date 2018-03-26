<template>
<div>
    <mt-header title="仅图标">
        <router-link to="/" slot="left">
            <mt-button icon="back"></mt-button>
        </router-link>
        <mt-button slot="right" icon="more"></mt-button>
    </mt-header>
</div>
</template>

<script>
import Header from 'mint-ui'
export default {
  date(){
      return{

      }
  }
}
</script>

<style scoped>

</style>
