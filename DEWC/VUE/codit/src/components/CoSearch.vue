<template lang='html'>
  <input
    name='search'
    type='text'
    placeholder='Write an user'
    class='search'
    v-focus
    v-on:keyup.enter='onSearch'
  />
</template>

<script>
// import bus from '@/busData.js'
export default {
  name: 'CoSearch',
  data () {
    return {
      criteria: ''
    }
  },
  methods: {
    onSearch () {
      this.$emit('search', this.criteria)
      // bus.$emit('search', this.criteria)
    }
  },
  directives: {
    focus: {
      inserted: function (el) {
        el.focus()
      }
    }
  }
}
</script>

<style langs='css' scoped>
  .search {
    margin: 1rem;
  }
</style>
