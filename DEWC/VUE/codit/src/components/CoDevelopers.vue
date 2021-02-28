<template lang='html'>
    <ul class='developers'>
        <li class='developers_item'>
            <!--co-developer></co-developers-->
        </li>
    </ul>
</template>

<script>
import CoDeveloper from '@components/CoDeveloper'
export default {
    name: 'CoDevelopers',
    data() {
        return {
            users: []
        }
    },
    mounted() {
        console.log('CoDevelopers mounted')
    },
    components: {
        CoDeveloper
    }
}
</script>

<style lang="css">

</style>