<!--<template>
  <div class="tabItems">
    <div class="Tab_tittle_wrap" @click="tabswitch">
      <span v-for="(v,i) in tabTitle" v-bind:style="{width:(100/tabTitle.length)+'%'}" v-bind:class="isShowTab==i?'router-link-active':''">{{v}}</span>
    </div>
    <div class="Tab_item_wrap">
      <slot></slot>
    </div>
  </div>
</template>-->


<!--<script>
  export default {
      name:'TabItems',
    data() {
      return {
        tabTitle: [],
        isShowTab: 0,
      }
    },
    created: function() {
      let is = sessionStorage.getItem("isTabShow");
      if(is) {
        this.isShowTab = is;
      } else {
        let URL = libUtils.GetURLParamObj();
        this.isShowTab = URL.isShowTab ? URL.isShowTab : "0";
      }

      setTimeout(function() {
        this.tabswitch(document.querySelector(".Tab_tittle_wrap").children[this.isShowTab].click());
      }.bind(this), 0);
    },
    mounted() {
      let slot = this.$slots.default;
      for(let i = 0; i < slot.length; i++) {
        if(slot[i].tag == "div") {
          this.tabTitle.push(slot[i].data.attrs.name);
          if(slot[i].elm) {
            slot[i].elm.className = "hide";
            if(this.isShowTab == i) {
              slot[i].elm.className = "";
            }
          };
        }
      }
    },
    methods: {
      tabswitch() {
        if(!event) return;
        let target = event.target;

        if(target.nodeName.toLowerCase() !== 'span') {
          return;
        }

        let len = target.parentNode.children;
        for(let i = 0; i < len.length; i++) {
          len[i].index = i;
          len[i].removeAttribute('class');
        }
        target.setAttribute('class', 'router-link-active');
        this.isShowTab = target.index;

        //tabItems
        let child = this.$el.children[1].children;
        for(let k = 0; k < child.length; k++) {
          child[k].className = "hide";
          if(k == target.index) {
            child[k].className = "showAnminous";
          }
        }
        try {
          sessionStorage.setItem("isTabShow", target.index);
        } catch(err) {
          console.log(err);
        }
      }
    }
  }
</script>

<style>
  /* @import "../less/tabItem.css"; */
  * {
  opacity: 1;
  -webkit-backface-visibility: hidden;
}
.tabItems .Tab_tittle_wrap {
  position: absolute;
  width: 100%;
  top: 0;
  z-index: 2;
  background: #ffffff;
  display: -webkit-box;
  height: 80px;
  line-height: 80px;
  text-align: center;
  color: #222222;
  border-bottom: 1px solid rgba(46, 177, 255, 0.08);
  box-shadow: 0px 0px 25px 6px rgba(46, 177, 255, 0.21);
}
.tabItems .Tab_tittle_wrap span {
  display: block;
  text-align: center;
  width: 26%;
  margin: 0;
  font-size: 0.8rem;
  position: relative;
}
.tabItems .Tab_tittle_wrap span i {
  display: inline-block;
  position: absolute;
  width: 1px;
  height: 50px;
  top: 15px;
  right: -24px;
  background: #dddddd;
}
.tabItems .Tab_tittle_wrap span:last-child i {
  display: none;
}
.tabItems .Tab_tittle_wrap .router-link-active {
  color: #8097f9;
  border-bottom: 1px solid #8097f9;
}
.tabItems .Tab_item_wrap {
  position: absolute;
  top: 82px;
  width: 100%;
  z-index: 0;
  background: #ffffff;
  bottom: 0;
  overflow-x: hidden;
  -webkit-overflow-scrolling: touch;
}
.tabItems .showAnminous {
  opacity: 1;
  -webkit-backface-visibility: hidden;
  -webkit-animation-name: "rightMove";
  /*动画名称，需要跟@keyframes定义的名称一致*/

  -webkit-animation-duration: .3s;
  /*动画持续的时间长*/

  -webkit-animation-iteration-count: 1;
  /*动画循环播放的次数为1 infinite为无限次*/

}
</style>-->

<template>
    <a class="m-tabbar-item" :class="{'is-active':isActive}" @click="$parent.$emit('input',id)">
        <!-- <span class="m-tabbar-item-icon" v-show="!isActive"><slot name="icon-normal"></slot></span>
        <span class="m-tabbar-item-icon" v-show="isActive"><slot name="icon-active"></slot></span> -->
        <span class="m-tabbar-item-text"><slot></slot></span>
    </a>
</template>


<script>
/**
 * m-tab-item
 * @desc 搭配 tabbar使用
 * @param id - 选中后的返回值，任意类型
 * @param isActive - 根据父组件的value和当前组件的id判断是否为选中状态
 * @param $parent.$emit('input',id) - 触发父组件的自定义事件
 * @param {slot} [icon-normal] - icon-默认图标
 * @param {slot} [icon-active] - icon-选中图标
 * @param {slot} - 文字
 *
 * @example
 * <m-tabbar-item id='tab1'>
 *       <img src="../assets/images/ic_tab_home_normal.png" alt="" slot="icon-normal"> 
 *       <img src="../assets/images/ic_tab_home_active.png" alt="" slot="icon-active"> 
 *       首页
 * </m-tabbar-item>
 */
    export default{
        props: ['id'],
        computed: {
           isActive(){
               if(this.$parent.value===this.id){
                   return true;
               }
           }
        }
    }
</script>
<style>
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
  /* display: block; */
  font-size: 10px;
  color:#deeff2;
  font-size: 16px;
}
.m-tabbar-item-text{
  height: 100%;
  display: flex;
  align-items: center;
}
.m-tabbar-item.is-active .m-tabbar-item-text {
  color: #fff;
  /* border-bottom-color: rgb(204,204,204);
  border-bottom-width: 1px;
  border-bottom-style: solid; */
  border-bottom: 4px solid #ffffff;
}
</style>
