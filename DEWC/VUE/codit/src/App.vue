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
</style>

<style lang='css' scoped>
  @import './assets/css/reset.css';
  @import './assets/css/global.css';
  .codit {
    @apply --flex-col;
    align-items: center;
    justify-content: center;
    width: 100vw;
    height: 100vh;
    padding: 1px;
    word-break: break-word;
    & .container {
      @apply --flex-row;
      background-color: var(--color-lighter-grey);
      width: 100%;
      height: 100%;
      max-width: 80vh;
      min-width: 400px;
      max-height: 90vh;
      min-height: 300px;
    }
    & .menu {
      @apply --flex-col;
      max-width: 15rem;
      background-color: var(--color-blue);
    }
    & .content {
      @apply --flex-col;
      flex: 1;
    }
    & .content__header {
      padding: 1rem;
      text-align: center;
      background-color: var(--color-blue);
    }
  }
</style>
