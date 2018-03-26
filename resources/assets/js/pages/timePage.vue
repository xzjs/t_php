<template>
<div id="timePage">
    <CurrTime></CurrTime>
    <div style="position:relative;margin-top:170px;">
        <h5>日期和时间</h5>
        <ul>
            <mt-cell :title="'自动确定日期和时间'">
                <mt-switch v-model="value1" ></mt-switch>
                <!-- @change="handleChange" -->
            </mt-cell>
            <mt-cell :title="'设置日期'">
                <!-- <mt-button @click.native="open('picker2')" size="large">{{year}}年{{month}}月{{day}}日</mt-button> -->
                <a style="font-size:1rem;" href="javascript:void(0);" @click="open('pickerDate')">{{year}}年{{month}}月{{day}}日 ></a>
            </mt-cell>
            <mt-cell :title="'设置时间'">
                <!-- <mt-button @click.native="open('picker2')" size="large">{{year}}年{{month}}月{{day}}日</mt-button> -->
                <a style="font-size:1rem;" href="javascript:void(0);" @click="open('pickerTime')">{{valueTime}} ></a>
            </mt-cell>
            <mt-cell :title="'使用24小时制'">
                <mt-switch v-model="value2" ></mt-switch>
            </mt-cell>
        </ul>

        <mt-datetime-picker ref="pickerDate" type="date" v-model="valueDate" @confirm="handleChange"></mt-datetime-picker>
        <mt-datetime-picker ref="pickerTime" type="time" v-model="valueTime"></mt-datetime-picker>
    </div>

    <div style="height:10px;background-color:rgba(219, 215, 215, 0.3);"></div>

    <div style="">
        <h5>时区</h5>
        <ul>
            <mt-cell :title="'自动确定时区'">
                <mt-switch v-model="value3" ></mt-switch>
            </mt-cell>
            <mt-cell :title="'选择时区'">
                <a style="font-size:1rem;" href="javascript:void(0);" @click="open('pickerDate')">{{year}}年{{month}}月{{day}}日</a>
            </mt-cell>
        </ul>
    </div>
</div>
</template>

<script>
import Switch from 'mint-ui'
import DatatimePicker from 'mint-ui'
import CurrTime from '../components/CurrTime'
export default {
  data(){
      return {
          time:'',
          value1:true,
          value2:true,
          value3:true,
          valueDate:'',
          year:'2017',
          month:'11',
          day:'28',
          valueTime:''
      }
  },
  components:{
      Switch,
      DatatimePicker,
      CurrTime
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
      },
      open(picker) {
        this.$refs[picker].open();
      },
      handleChange(value) {
        var str = value.toString();
        
        str = str.split(" ");
        this.year = str[3];
        if(str[1] == 'Jan'){
            this.month = '01';
        }
        else if(str[1] == 'Feb'){
            this.month = '02';
        }
        else if(str[1] == 'Mar'){
            this.month = '03';
        }
        else if(str[1] == 'Apr'){
            this.month = '04';
        }
        else if(str[1] == 'May'){
            this.month = '05';
        }
        else if(str[1] == 'Jun'){
            this.month = '06';
        }
        else if(str[1] == 'Jul'){
            this.month = '07';
        }
        else if(str[1] == 'Aug'){
            this.month = '08';
        }
        else if(str[1] == 'Sep'){
            this.month = '09';
        }
        else if(str[1] == 'Oct'){
            this.month = '10';
        }
        else if(str[1] == 'Nov'){
            this.month = '11';
        }
        else if(str[1] == 'Dec'){
            this.month = '12';
        }
        //this.month = str[1];
        this.day = str[2];
        console.log(value);
      }
  },
  mounted(){
      
      var timeId = setInterval(this.updateTime,1000);
      this.updateTime();
  }
}
</script>

<style scoped>
#timePage{
    position: relative;
    /* top:51px+6rem; */
}
h5{
    padding: 0 10px;
    -webkit-margin-before: 0.6rem;
    -webkit-margin-after:0.6rem; 
}
.mint-switch-input:checked .mint-switch-core{
    background-color: #d1eced;
}
.mint-switch-core{
    background-color: #19a0a9;
}
.mint-switch-core::after{
    background-color: #19a0a9;
}
</style>
