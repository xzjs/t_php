<template>
  <div id="index">
      <!-- <div style="float:left;width:100%;">
        <div style="float:left;width:40%;margin:1rem;">
          
          <div class="faces">
            <div class="face face1">
              <svg id="clock1" class="clock"></svg>
              
            </div>
          </div>
        </div>
        <div style="float:right;width:40%;">
          <div class="whether" id="weather" style="margin-top:4rem;margin-right:1rem;text-align:right;">
            <span>
              <img id="syx" src="http://api.map.baidu.com/images/weather/day/yin.png"	width="24" height="24">
            </span>

            <div id="weath" style="padding-top:.2rem;">
              <span id="weath">{{weath}}</span>
            </div>
            <div style="padding-top:.2rem;">
              <span id="temperature">{{temperature}}</span>
            </div>
            <div style="padding-top:.2rem;">
              <span id="currentDate">{{currentDate}}</span>
            </div>

          </div>
        </div>
      </div>
      <ul>
        <li>
          <span>06:00</span>
          <span>|</span>
          <span>周一周二周三周四周五</span>
        </li>
      </ul> -->
      <!-- <TabItems>
        <div name="显示设置">
          <Content :isContTab="0" />
        </div>
        <div name="闹钟设置">
          <Content :isContTab="1" />
        </div>
        <div name="时间设置">
          <Content :isContTab="2" />
        </div>
        <div name="我的">
          <Content :isContTab="3" />
        </div>
      </TabItems> -->
   
      <screen></screen>
      
      <mt-cell :title="'显示时间'">
        <mt-switch v-model="value1" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示日期'">
        <mt-switch v-model="value2" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示星期'">
        <mt-switch v-model="value3" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示天气地点'">
        <mt-switch v-model="value4" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示当天天气'">
        <mt-switch v-model="value5" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示第二天天气'">
        <mt-switch v-model="value6" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示第二天天气'">
        <mt-switch v-model="value7" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示第三天天气'">
        <mt-switch v-model="value8" @change="handleChange"></mt-switch>
      </mt-cell>
      <mt-cell :title="'显示闹钟组数'">
        <mt-switch v-model="value9" @change="handleChange"></mt-switch>
      </mt-cell>
      
      
  </div>
</template>

<script>

import Screen from "../components/Screen";
import Switch from 'mint-ui'

export default {
  name:"Index",
  data(){
    return {
      weath:"晴",
      temperature:"16℃~20℃",
      currentDate:"5月10日\n周三",
      value1:true,
      value2:true,
      value3:true,
      value4:true,
      value5:true,
      value6:true,
      value7:true,
      value8:true,
      value9:true
    }
  },
  method:{
    handleChange(event){
      console.log(event);
    }
  },
  components:{
    Screen,
    Switch
  },
  mounted(){
    axios.post("/devices",
    {
      params:{
          mac:'34-68-95-AE-50-9D',
          type:'0'
      }
    })
    .then(response=>{
      console.log(response);
    })
    .catch(response=>{
      console.log(response);
    });
    
  }
}
</script>

<style>
/* a{
  text-decoration: none;
  font-size: 10px;
  color: #949494;
}
a:active{
  color: #42bd56;
}
router-link{
  list-style: none;
  text-decoration: none;
}

.m-tabbar-item {
  display: flex;
  flex: 1;
  justify-content: center;
  align-items: center;
}
.m-tabbar-item .m-tabbar-item-icon {
  display: block;
  padding-top: 2px;
}
.m-tabbar-item .m-tabbar-item-icon img {
  width: 28px;
  height: 28px;
}
.m-tabbar-item .m-tabbar-item-text {
  display: block;
  font-size: 10px;
  color: #949494;
}
.m-tabbar-item.is-active .m-tabbar-item-text {
  color: #42bd56;
} */


.faces .face {
  background: transparent url("/images/clock.png") top left no-repeat;
  width: 162px;
  height: 160px;
  padding: 0;
  display: inline-block;
  position: relative;
  margin: 10px;
}

.faces .face:before {
  top: inherit;
  bottom: -35px;
  left: 57px;
}

.faces .face1 {
  background-position: 0 0;
}



.faces .clock {
  width: 160px;
  height: 160px;
  position: absolute;
  top: 0;
  left: 0;
}

ul{
  list-style: none;
  /* text-align: left; */
}
</style>

