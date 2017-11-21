<template>
  <div id="screen">
        <div class="screenLeft">
                <span class="date">{{date}}</span>
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
                </div>
        </div>
        <div class="screenRight">
            <div class="todayWeather">
                <div style="float:left;width:40%;height:100%;display:flex;justify-content:flex-end;align-items:center;">
                    <img src="/images/sun.svg" alt="" width="60px" height="60px">
                </div>
                <div class="todayWeatherDetail">   
                    <span >晴</span>
                    <span>14~26℃</span>
                    <span>南风1~2级</span>
                </div>
            </div>
            <div class="nextWeather">
                <div class="tmrWeather">
                    <img src="/images/sun.svg" alt="" width="24px" height="24px">
                    <div style="position:absolute;bottom:0;">
                        <!-- <span>明天</span> -->
                        <span>晴转多云</span>
                        <span>14~26℃</span>
                    </div>
                </div>
                <div class="afterTmrWeather">
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
  background-color: #000;
  color: #ffffff;
  text-align: center;
  position: relative;
  left: 0;
  width:100%;
  height: 10rem;
  margin-top: 51px;
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
    left: 0.5rem;
    bottom: 2.5rem;
    letter-spacing: 0.05rem;
    font-size: 3rem;
    padding: 5px 0;
}
.date{
    margin-left: 4px;
}
.screenLeft{
    width: 55%;
    height: 100%;
    float: left;
}
.screenLeft:after{
    content: '';
    display: table;
    clear: both;
}
.screenRight{
    width: 45%;
    height: 100%;
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
