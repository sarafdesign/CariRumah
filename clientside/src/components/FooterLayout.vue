<template>
    <v-footer
        class="justify-center"
        color="#292929"
        height="40"
    >
        <div class="subtitle-1 font-weight-light grey--text text--lighten-1 text-center">
            &copy; {{ (new Date()).getFullYear() }} — CariRumah
        </div>
    </v-footer>
</template>

<script>
export default {
    name: 'FooterLayout'
}
</script>

<style>

</style>