<template lang='html'>
  <ul class='developers'>
    <li class='developers__item'>
      <co-developer
        avatar='a'
        name='a'
        login='a'
        email='a'
        location='a'
        company='Apex'>        
      </co-developer>
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

<style lang='css'>
@import '../assets/css/colors.css';
@import '../assets/css/mixins.css';

.userConNombre {
  font-weight: 900;
}
.developers {
    overflow-x: none;
    overflow-y: auto;
    & .developers__item {
      position: relative;
    }
    & .developers__item::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 5%;
      width: 90%;
      height: 1px;
      background-color: var(--color-light-grey);
    }
    & .developer {
      padding: 1rem 2rem;
    }
  }

</style>
