<template lang='html'>
  <ul class='developers'>
    <li class='developers_item'>
      <!--co-developer></co-developers-->
    </li>
  </ul>
</template>

<script>
import CoDeveloper from '@/components/CoDeveloper'
import bus from '@/busData.js'
export default {
  name: 'CoDevelopers',
  data () {
    return {
      users: []
    }
  },
  mounted () {
    console.log('CoDevelopers mounted')
  },
  created () {
    bus.$on('search', criteria => {
      console.log('CoDevelopers', criteria)
    })
  },
  components: {
    CoDeveloper
  }
}
</script>

<style lang='css'></style>
