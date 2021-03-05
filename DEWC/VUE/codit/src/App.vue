<template lang='pug' src='./App.pug'>
</template>

<script>
import CoLogo from '@/components/CoLogo'
import CoSearch from '@/components/CoSearch'
import CoBookmarks from '@/components/CoBookmarks'
// import CoDevelopers from '@/components/CoDevelopers'
export default {
  name: 'CoApp',
  components: {
    CoLogo,
    CoSearch,
    CoBookmarks,
    CoDevelopers: () => import('@/components/CoDevelopers')
  }
}
</script>

<style lang='css'>
  @import './assets/css/reset.css';
  @import './assets/css/global.css';
</style>

<style lang='css' scoped src='./App.css'>
</style>
