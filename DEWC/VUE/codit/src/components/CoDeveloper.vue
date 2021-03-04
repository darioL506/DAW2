<template lang='html'>
  <div class='developer'>
    <img class='developer_avatar' />
    <div class='developer_info'>
      <h2>
        <span class='developer_name'>{{ name }}</span>
        <span class='developer_login'>{{ login }}</span>
      </h2>
      <div class='developer_metadata'>{{ metadata }}</div>
    </div>
    <div class='developer_stats'>
      <div class='developer_stat'>
        <div class='developer_icon'></div>
        <div class='developer_total'>{{ repos }}</div>
      </div>
      <div class='developer_stat'>
        <div class='developer_icon'></div>
        <div class='developer_total'>{{ gist }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CoDeveloper',
  props: {
    avatar: {
      type: String,
      required: true,
      validator (value) {
        return value.startsWith('http')
      }
    },
    name: {
      type: String,
      required: true
    },
    login: {
      type: String,
      required: true
    },
    email: {
      type: String,
      required: true
    },
    company: {
      type: String,
      required: false
    },
    repos: {
      type: Number
    },
    gists: {
      type: Number
    }
  },
  computed: {
    metadata () {
      let meta = ''
      if (this.email) {
        meta = `${meta} ${this.email}`
      }
      if (this.loaction) {
        meta = `${meta} ${this.location}`
      }
      if (this.company) {
        meta = `${meta} ${this.company}`
      }
      return meta
    }
  },
  watch: {
    metadata (newValue) {
      console.log('Metadata:', newValue)
    }
  }
}
</script>

<style lang='css'></style>
