<template>
  <div id="screen">
        <div style="width:100%;height:51px;"></div>
        <div class="screenLeft">
                <!-- <span class="date">{{date}}</span>
                <span class="time">{{time}}</span>

                <div class="clockTimeDiv">
                    <p class="clockItem">
                        <img src="/images/clock_icon.png" alt="">
                        <span>08:00</span>
                    </p>
                    <p class="clockItem">
                        <img src="/images/clock_icon.png" alt="">
                        <span>09:00</span>
                    </p>
                    <p class="clockItem">
                        <img src="/images/clock_icon.png" alt="">
                        <span>10:00</span>
                    </p>
                </div> -->
                <span class="date" v-show="childMsg[1]">{{date}}</span>
                <span class="time" v-show="childMsg[0]">{{time}}</span>

                <div class="clockTimeDiv" v-show="childMsg[6]">
                    <p class="clockItem">
                        <img src="/images/clock_icon.png" alt="">
                        <span>08:00</span>
                    </p>
                    <p class="clockItem">
                        <img src="/images/clock_icon.png" alt="">
                        <span>09:00</span>
                    </p>
                    <p class="clockItem">
                        <img src="/images/clock_icon.png" alt="">
                        <span>10:00</span>
                    </p>
                </div>
        </div>
        <div class="screenRight">
            <div class="todayWeather" v-show="childMsg[3]">
                <div style="float:left;width:40%;height:100%;display:flex;justify-content:flex-end;align-items:center;">
                    <img src="/images/sun.svg" alt="" width="60px" height="60px">
                </div>
                <div class="todayWeatherDetail">   
                    <span >晴</span>
                    <span>11~26℃</span>
                    <span>南风1~2级</span>
                </div>
            </div>
            <div class="nextWeather">
                <div class="tmrWeather"  v-show="childMsg[4]">
                    <img src="/images/sun.svg" alt="" width="24px" height="24px">
                    <div style="position:absolute;bottom:0;">
                        <!-- <span>明天</span> -->
                        <span>晴转多云</span>
                        <span>14~26℃</span>
                    </div>
                </div>
                <div class="afterTmrWeather"  v-show="childMsg[5]">
                    <img src="/images/sun.svg" alt="" width="24px" height="24px">
                    <div style="position:absolute;bottom:0;">
                        <!-- <span>明天</span> -->
                        <span>晴转多云</span>
                        <span>14~26℃</span>
                    </div>
                    
                </div>
            </div>
            
        </div>
  </div>
</template>

<<script>
export default {
  name:'Screen',
  props:{
      childMsg:Array
  },
  data(){
      return{
          time:'',
          date:''
      }
  },
  methods:{
      updateTime:function(){
        var cd = new Date();
        var week = ['周日', '周一', '周二', '周三', '周四', '周五', '周六'];
        this.time = this.zeroPadding(cd.getHours(), 2) + ':' + this.zeroPadding(cd.getMinutes(), 2) + ':' + this.zeroPadding(cd.getSeconds(), 2);
        this.date = this.zeroPadding(cd.getFullYear(), 4) + '-' + this.zeroPadding(cd.getMonth()+1, 2) + '-' + this.zeroPadding(cd.getDate(), 2) + ' ' + week[cd.getDay()];
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
#screen {
  font-family: 'Share Tech Mono', monospace;
  /* background-color: #000; */
  background:-webkit-gradient(linear, 0 0, 0 bottom, from(#319da7), to(rgba(104,226, 201, 1)));
  box-shadow:0px 2px 20px #378c7d;
  color: #ffffff;
  text-align: center;
  position: fixed;
  top: 0;
  left: 0;
  width:100%;
  height: 161px;
  z-index: 99;
  /* margin-top: 51px; */
  /* -webkit-transform: translate(-30%);
          transform: translate(-30%); */
  color: #daf6ff;
  text-shadow: 0 0 20px #0aafe6, 0 0 20px rgba(10, 175, 230, 0);
}

p{
    margin:0;
    padding:0;
}
#screen .time{
    display: inline-block;
    position: absolute;
    /* left: 1px; */
    /* bottom: 2.5rem; */
    letter-spacing: 0.05rem;
    font-size: 2.5rem;
    padding: 5px 0;
    top: 50%;
    /* left: 50%; */
    transform: translateY(-50%);
}
.date{
    margin-left: 6px;
}
.screenLeft{
    position: relative;
    width: 55%;
    height: 110px;
    float: left;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.screenLeft:after{
    content: '';
    display: table;
    clear: both;
}
.screenRight{
    width: 45%;
    height: 110px;
    float: right;
    font-size: .2rem;
}
.todayWeather{
    width: 100%;
    height: 60%;
}
.todayWeatherDetail{
    float:right;
    width:60%;
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:flex-end;
}
.todayWeatherDetail span{
    margin-right: 4px;
    margin-bottom: 2px;
}
.nextWeather{
    width: 100%;
    height: 40%;
}
.tmrWeather{
    float: left;
    width: 50%;
    height: 100%;
}
.tmrWeather span{
    display: inline-block;
}
.afterTmrWeather{
    float: right;
    width: 50%;
    height: 100%;
}
.afterTmrWeather span{
    display: inline-block;
}
.date{
    left: 0;
    display: inline-block;
    position: absolute;
}

span{
    display: block;
   
}
.clockTime{
    position: absolute;
    bottom: 4px;
}

.clockTimeDiv{
    position: absolute;
    bottom: 4px;
}
.clockItem{
    float: left;
    display: flex;
    margin-left: 6px;
    align-items: center;
}
.clockItem span{
    margin-left: 2px;
}
</style>
