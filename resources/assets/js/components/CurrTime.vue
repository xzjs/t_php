<template>
<div class="currTime">
    <div style="width:100%;height:51px;"></div>
    <div class="time">
        <span>{{time}}</span>
    </div>
    
</div>
</template>
<script>
export default {
  data(){
      return {
          time:''
      }
  },
  methods:{
      updateTime:function(){
        var cd = new Date();
        // var week = ['周日', '周一', '周二', '周三', '周四', '周五', '周六'];
        this.time = this.zeroPadding(cd.getHours(), 2) + ':' + this.zeroPadding(cd.getMinutes(), 2) ;
        // this.date = this.zeroPadding(cd.getFullYear(), 4) + '-' + this.zeroPadding(cd.getMonth()+1, 2) + '-' + this.zeroPadding(cd.getDate(), 2) + ' ' + week[cd.getDay()];
      },
      zeroPadding:function(num,digit){
        var zero = '';
        for (var i = 0; i < digit; i++) {
            zero += 0;
        }
        return (zero + num).slice(-digit);
      }
  },
  mounted(){ 
      var timeId = setInterval(this.updateTime,1000);
      this.updateTime();
  }

}
</script>
<style scoped>
.currTime{
    /* height: 10rem; */
    /* background-color: #71f171; */
    /* background:-webkit-gradient(linear, 0 0, 0 bottom, from(#25e070), to(rgba(94, 228, 49, 0.5))); */
    background:-webkit-gradient(linear, 0 0, 0 bottom, from(#319da7), to(rgba(104,226, 201, 1)));
    /* display: flex;
    justify-content: center;
    align-items: center; */
    box-shadow:0px 2px 20px #378c7d;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 99;
}
.time{
    display: flex;
    justify-content: center;
    align-items: center;
    width:100%;
    height: 110px;
}
span{
    color: #ffffff;
    font-size: 2.5rem;
    font-family: 'Share Tech Mono', monospace;
}
</style>
