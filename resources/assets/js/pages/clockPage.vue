<template>
<div id="clockPage">
    <CurrTime></CurrTime>
    <div class="clockItemCont">
        <ClockItem></ClockItem>
        <ClockItem></ClockItem>
        <ClockItem></ClockItem>
    </div>
    

    <div class="fuyu">
        <a href="#/addClock">
            <img src="/images/add.png" alt="">
        </a>
    </div>
</div>
</template>

<script>
import CurrTime from '../components/CurrTime'
import ClockItem from '../components/ClockItem'
export default {
  data(){
      return {

      }
  },
  components:{
      CurrTime,
      ClockItem
  }
}
</script>

<style scoped>
#clockPage{
    position: relative;
    /* top:51px; */
}
.fuyu{
    position: fixed;
    bottom: 20px;;
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 99;
    /* background-color: red; */
}
.fuyu a{
    display: inline-block;
    background-color: #56ccbe;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 0 15px #56ccbe;
}
.button{
    -webkit-appearance: button;
    cursor: pointer;
    *overflow: visible;
    font-family: sans-serif;
}
.button-circle{
    border-radius: 100%;
    padding: 0 !important;
    width: 40px;
}
.button-giant {
  font-size: 28px;
  height: 70px;
  line-height: 70px;
  padding: 0 70px; 
}
.clockItemCont{
    position: relative;
    margin-top: 160px;
}
</style>
